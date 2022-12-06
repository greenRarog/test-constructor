<?php

namespace App\Http\Controllers;
use App\Models\Test;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class TestController extends Controller
{
    public function create(Request $request)
    {
        $user = Auth::User();
        if($request->has('name') and $request->has('text')) {
            $test = $this->saveTest($request->name, $request->text, $user->id, $request->private, $request->low_mark, $request->midle_mark, $request->high_mark, null);
            return redirect('/create-new-test/' . $test->id);
        }        
        return view('test.create');
    }
     
    public function show(Request $request, $test_id){        
        $test = Test::find($test_id);                               
        
        if ($request->has('check') and $request->check == 'push') {
            $valueTest = 0;
            foreach($request->request as $key => $value){                
                if (substr($key, 0, 11) == 'questionBox') {
                    $valueTest += $value;
                } else if (substr($key, 0, 13) == 'questionInput') {
                    $lenId = strlen($key) - 13;
                    $question_id = substr($key, 13, $lenId);
                    $answers = Answer::where('question_id', $question_id)->get();                    
                    foreach ($answers as $answer) {
                        if ($answer->content == $value) {
                            $valueTest += (int)$answer->value;
                            break;
                        }
                    }
                }
            }
            $testFinal = Test::find($request->test_id);
            return view ('test.end', [
                'score' => $valueTest,
                'test' => $testFinal,
            ]);
        }        
        if (Auth::check()) {
            $user = Auth::User();
        } else {
            $user = '';
        }
        $user = Auth::User();
        return view('test.show', [
            'test' => $test,
            'user' => $user,
        ]);
    }
    
    public function showAll() {        
        $authorized = false;
        if (Auth::check()) {
            $authorized = true;
        }
        if ($authorized) {
            $tests = Test::all();
        } else {
            $tests = Test::where('private', '0')->get();
        }        
        return view('test.showAll', [
           'tests' => $tests, 
           'authorized' => $authorized,
        ]);
    }
    
    public function change(Request $request, $test_id) {
        if ($request->has('name') and $request->has('text')) {
            $test = Test::find($request->test_id);
            $test_id = $request->test_id;
            $user_id = Test::find($request->test_id)->user->id;            
            if (!$request->has('private')) {
                $private = Test::find($request->test_id)->private;
            } else {
                $private = (int)$request->private;
            }
            $this->saveTest($request->name, $request->text, $user_id, $private, $request->low_mark, $request->midle_mark, $request->high_mark, $test_id);            
            return redirect('/show/all');
        } 
        if (Auth::check()){
            $test = Test::find($test_id);
            $user = Auth::User();
            if($test->user->id == $user->id) {
                return view('test.change', [
                    'test' => $test,
                ]);
            } else {
                return redirect('/show/all');
            }
        } else {
            return redirect('/login');
        }
    }    
    public function delete(Request $request, $test_id) {
        if ($request->has('delete') and $request->delete === $request->confirm) {
            $this->deleteTest($request->test_id);
            return redirect('/show/all');
        }
        if (Auth::check()){
            $test = Test::find($test_id);
            $user = Auth::User();            
            if($test->user->id == $user->id) {
                return view('test.delete', [
                    'test' => $test,
                ]);
            } else {
                return redirect('/show/all');
            }
        } else {
            return redirect('/login');
        }
    }
    
    private function saveTest($name, $text, $user_id, $private, $low_mark, $midle_mark, $high_mark, $test_id){                
        if (!isset($low_mark)) {
            $low_mark = 0;
        }
        if (!isset($middle_mark)) {
            $middle_mark = 0;
        }                
        if (!isset($high_mark)) {
            $high_mark = 0;
        }                               
        if (isset($test_id)) {
            $test = Test::find($test_id);
        } else {
            $test = new Test;
        }
        $test->name = $name;
        $test->text = $text;
        $test->user_id = $user_id;
        $test->private = $private;
        if ($high_mark != 0) {
            if ($low_mark != 0 and $midle_mark != 0) {
                $test->low_mark = $low_mark;
                $test->midle_mark = $midle_mark;
                $test->high_mark = $high_mark;                
            } else {
                $test->high_mark = $high_mark;
            }
        }        
        $test->save();
        return $test;
    }
  
    private function deleteTest($test_id){
        $questions = Question::where('test_id', $test_id)->get();
        $questionsId = [];
        foreach ($questions as $question) {
            $questionsId[] = $question->id;
        }
        foreach ($questionsId as $questionId) {
            Answer::where('question_id', $questionId)->delete();
        }
        Question::where('test_id', $test_id)->delete();
        Test::where('id', $test_id)->delete();        
    }
}
