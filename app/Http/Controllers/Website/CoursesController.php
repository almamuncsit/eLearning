<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;

class CoursesController extends Controller
{
    
    public function show( $id )
    {
        $this->data['course'] = Course::find( $id );

        return view('website.course.details', $this->data);
    }

}
