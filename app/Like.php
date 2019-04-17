<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    protected $fillable = [ 'user_id', 'lesson_id' ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
