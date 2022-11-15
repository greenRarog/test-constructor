<?php

namespace App\Models;
use App\Models\Answer;
use App\Models\Test;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    
    protected $with = ['answers'];


    public function answers(){
        return $this->hasMany(Answer::class);
    }
    
    public function test(){
        return $this->belongsTo(Test::class);
    }
}
