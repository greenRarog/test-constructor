<?php

namespace App\Models;
use App\Models\Answer;
use App\Models\Test;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    
    protected $with = ['answer'];


    public function answers(){
        return $this->belongToMany(Answer::class);
    }
    
    public function test(){
        return $this->belongTo(Test::class);
    }
}
