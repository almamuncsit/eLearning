<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Section extends Model
{
    protected $fillable = [ 'instructor_id', 'course_id', 'title' ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public static function list( $course_id )
    {
        $sections = Course::find($course_id)->sections;
        $arr = array();

        foreach ($sections as $section) {
            $arr[$section->id] = $section->title;
        }

        return $arr;
    }

}
