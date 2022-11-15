<?php

namespace App\Http\Controllers;
use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function create(Request $request, $test_id, $question_id, $countAnswer){
        
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
            if ($request->endtest === '1'){
                return redirect('/show/' . $request->test_id);
            }
            return redirect('/create-new-test/' . $request->test_id);
                        
        }
        
        return view('answer.create', [
            'countAnswer' => $countAnswer,
            'question_id' => $question_id,
            'test_id' => $test_id,
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
