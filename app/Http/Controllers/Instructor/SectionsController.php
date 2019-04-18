<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Section;
use Illuminate\Support\Facades\Auth;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['sections'] = Auth::user()->sections;

        return view('instructor.sections.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['title'] = 'Create New Course';
        $this->data['courses'] = Course::list();
        $this->data['mode'] = 'create';

        return view('instructor.sections.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputData = $request->all();
        $inputData['instructor_id'] = Auth::id();
        Section::create($inputData);
        flash('Section Created Successfully')->success();

        return redirect()->to('users/sections');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['title'] = 'Create New Course';
        $this->data['courses'] = Course::list();
        $this->data['section'] = Section::find($id);
        $this->data['mode'] = 'edit';

        return view('instructor.sections.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputData = $request->only(['course_id', 'title']);
        Section::find($id)->update($inputData);
        flash('Section Updated Successfully')->success();

        return redirect()->to('users/sections');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Section::find($id)->delete();
        flash('Section Deleted Successfully')->success();

        return redirect()->to('users/sections'); 
    }
}
