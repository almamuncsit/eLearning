<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

    protected $fillable = [ 'course_id', 'instructor_id', 'section_id', 'title', 'description', 'video_url', 'source_code_url', 'view_count', 'like_count' ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }


    public function instructor()
    {
        return $this->belongsTo(User::class);
    }
    

    public function section()
    {
        return $this->belongsTo(Section::class);
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}
