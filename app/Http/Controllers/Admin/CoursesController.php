<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;

class CoursesController extends Controller
{
    
    public function index()
    {
        $this->data['courses'] = Course::all();

        return view('admin.courses.index', $this->data);
    }


    public function approve( $id )
    {
        $course = Course::find( $id );
        $course->is_approved = 1;
        $course->save();
        flash('Approved Successfully')->success();

        return redirect()->to('admin/courses');
    }

}
