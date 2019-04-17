<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [ 'user_id', 'course_id', 'rate', 'message' ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
