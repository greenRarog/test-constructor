<?php

namespace App\Models;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    
    protected $with = ['question', 'user'];


    public function questions(){
        return $this->belognsToMany(Question::class);
    }
    
    public function user(){
        return $this->belongTo(User::class);
    }
}
