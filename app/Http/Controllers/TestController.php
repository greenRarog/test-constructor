<?php

namespace App\Http\Controllers;
use App\Models\Test;
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
