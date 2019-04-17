<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [ 'title' ];


    public function courses()
    {
        return $this->hasMany(Course::class);
    }


    public static function list()
    {
        $categories = Category::all();
        $arr = array();

        foreach ($categories as $category) {
            $arr[$category->id] = $category->title;
        }

        return $arr;
    }
    
}
