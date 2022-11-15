<?php

namespace App\Models;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    
    protected $with = ['user', 'questions'];


    public function questions(){
        return $this->hasMany(Question::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
