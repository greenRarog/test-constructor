<?php

namespace App\Http\Controllers;
use App\Models\Test;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class TestController extends Controller
{
    public function create(Request $request)
    {
        $user = Auth::User();
        if($request->has('name') and $request->has('text')) {
            $test = $this->newTest($request->name, $request->text, $user->id);            
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
                    $lenId = strlen($key) - 8;
                    $question_id = substr($key, 8, $lenId);
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
        return view('test.show', [
            'test' => $test,
        ]);
    }
    
    private function newTest($name, $text, $user_id){
        $test = new Test;
        $test->name = $name;
        $test->text = $text;
        $test->user_id = $user_id;
        $test->save();
        return $test;
    }
}
