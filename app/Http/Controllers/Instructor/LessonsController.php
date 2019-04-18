<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Course;
use App\Section;
use App\Lesson;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['lessons'] = Auth::user()->lessons;

        return view('instructor.lessons.lessons', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['title'] = 'Create New Lesson';
        $this->data['courses'] = Course::list();
        $this->data['sections'] = Section::list();
        $this->data['mode'] = 'create';

        return view('instructor.lessons.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->all(); 
        $formData['instructor_id'] = Auth::id();
        Lesson::create($formData);
        flash('Lesson Created Successfully')->success();

        return redirect()->to('users/lessons');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['lesson'] = Auth::user()->lessons()->findOrFail($id);

        return view('instructor.lessons.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['title'] = 'Create New Lesson';
        $this->data['courses'] = Course::list();
        $this->data['sections'] = Section::list();
        $this->data['lesson'] = Auth::user()->lessons()->findOrFail($id);
        $this->data['mode'] = 'edit';

        return view('instructor.lessons.create', $this->data);
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
        $formData = $request->all(); 
        $lesson = Auth::user()->lessons()->findOrFail($id);

        $lesson->update($formData);
        flash('Lesson Updated Successfully')->success();

        return redirect()->to('users/lessons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = Auth::user()->lessons()->findOrFail($id);
        $lesson->delete();
        flash('Lesson Deleted Successfully')->success();

        return redirect()->to('users/lessons');
    }
}
