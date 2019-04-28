<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    
    protected $fillable = [ 'category_id', 'instructor_id', 'title', 'description', 'image', 'view_count' ];

    public function instructor()
    {
        return $this->belongsTo(User::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }


    public function sections()
    {
        return $this->hasMany(Section::class);
    }


    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }


    public static function list()
    {
        $courses = Auth::user()->courses;
        $arr = array();

        foreach ($courses as $course) {
            $arr[$course->id] = $course->title;
        }

        return $arr;
    }



    public function scopeApproved($query)
    {
        return $query->where('is_approved', 1);
    }

}
