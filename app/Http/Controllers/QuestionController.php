<?php

namespace App\Http\Controllers;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function create(Request $request, $test_id){
        
        $user = Auth::User();
        if ($request->has('question') and $request->question != '') {
            if ($request->has('$pic') and $request->pic != '') {
                $question = $this->saveQuestion($request->question, $request->type, $request->test_id, $request->pic);
            } else {
                $question = $this->saveQuestion($request->question, $request->type, $request->test_id);
            }
            return redirect('create-new-test/' . $request->test_id . '/' . $question->id . '/' . $request->countAnswer);
        }
        
        return view('question.create', [
            'test_id' => $test_id,
        ]);
    }
    
    private function saveQuestion($question, $type, $test_id, $pic = null) {
        $newQuestion = new Question;
        $newQuestion->question = $question;
        $newQuestion->type = $type;
        $newQuestion->test_id = $test_id;
        $newQuestion->pic = 'test';
        $newQuestion->save();
        return $newQuestion;
    }
}
