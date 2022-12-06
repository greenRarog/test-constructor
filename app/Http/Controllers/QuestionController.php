<?php

namespace App\Http\Controllers;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    public function create(Request $request, $test_id){        
        $user = Auth::User();
        if ($request->has('question') and $request->question != '') {
            if ($request->has('pic') and $request->pic != '') {
                $picName = $this->savePic($request->pic);
                $question = $this->saveQuestion($request->question, $request->type, $request->test_id, $picName);
            } else {
                $question = $this->saveQuestion($request->question, $request->type, $request->test_id);
            }
            return redirect('create-new-test/' . $request->test_id . '/' . $question->id . '/' . $request->countAnswer);
        }        
        return view('question.create', [
            'test_id' => $test_id,
        ]);
    }
    
    public function changePic(Request $request, $question_id){        
        if ($request->has('pic')) {            
            $question = Question::find($request->question_id);
            Storage::delete('public/image/' . $question->pic);
            Storage::delete('file.jpg');
            $question->pic = $this->savePic($request->pic);
            $question->save();
            return redirect('/change/' . $question->test->id);
        }
        $question = Question::find($question_id);
        return view('question.changePic', [
            'question' => $question,
        ]);
    }
    
    public function deletePic($question_id) {
        Storage::delete('public/image/' . Question::find($question_id)->pic);
        return redirect('/change/' . Question::find($question_id)->test->id);
    }
    
    public function delete(Request $request, $question_id){
        if ($request->has('delete') and $request->delete === $request->confirm) {
            $question = Question::find($request->question_id);            
            $path = '/change/' . $question->test->id;
            dd($path);
            foreach($question->answers as $answer) {
                Answer::find($answer->id)->delete();
            }
            Question::find($question->id)->delete();
            return redirect($path);
        }
        $question = Question::find($question_id);
        return view('question.delete', [
            'question' => $question,
        ]);
    }
    
    private function savePic($pic) {
        $picName = Str::random(40) . $pic->getClientOriginalName();
        $pic->move(Storage::path('public/image/'), $picName);
        return $picName;
    }
    
    private function saveQuestion($question, $type, $test_id, $pic = null) {
        $newQuestion = new Question;
        $newQuestion->question = $question;
        $newQuestion->type = $type;
        $newQuestion->test_id = $test_id;        
        if (isset($pic)) {
            $newQuestion->pic = $pic;
        } else {
            $newQuestion->pic = '';
        }
        $newQuestion->save();
        return $newQuestion;
    }
}
