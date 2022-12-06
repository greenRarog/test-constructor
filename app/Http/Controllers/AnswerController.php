<?php

namespace App\Http\Controllers;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function create(Request $request, $test_id, $question_id, $countAnswer){        
        $countAnswer = (int)$countAnswer;
        if ($request->has('countAnser')) {
            $count = $request->countAnswer;
            $aliasValue = 'value#';
            $aliasContent = 'content#';
            for ($i = 1; $i <= $count; $i++) {            
                $aliasValue .= $i;
                $aliasContent .= $i;
                $this->saveAnswer($request->$aliasContent, $request->$aliasValue, $request->question_id);
                $aliasValue = 'value#';
                $aliasContent = 'content#';
            }                    
            return redirect('/create-new-test/' . $request->test_id);
                        
        }        
        $question = Question::find($question_id);
        return view('answer.create', [
            'countAnswer' => $countAnswer,
            'question' => $question,
            'test_id' => $test_id,
        ]);
    }
    
    public function delete(Request $request, $answer_id){
        if ($request->has('delete') and $request->has('confirm') 
                and $request->delete === $request->confirm) {
            $path = '/change/' . Answer::find($request->answer_id)->question->test->id;
            dd($path);
            Answer::find($request->answer_id)->delete();
            return redirect($path);
        }
        $answer = Answer::find($answer_id);
        return view('answer.delete', [
            'answer' => $answer,
        ]);        
    }
    
    private function saveAnswer($content, $value, $question_id) {
        $answer = New Answer;
        $answer->content = $content;
        $answer->value = $value;
        $answer->question_id = $question_id;
        $answer->save();
        return $answer;
    }
}