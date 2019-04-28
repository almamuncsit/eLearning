@extends('layouts.users')



@section('content')


<a href="{{ url('users/courses') }}" class="btn btn-info"> Back </a>
<br><br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Course Information </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
       
        <tbody>
            <tr>
                <td> Title </td>
                <td> {{ $course->title }} </td>
            </tr>
            <tr>
                <td> Category </td>
                <td> {{ $course->category->title }} </td>
            </tr>
            <tr>
                <td> Description </td>
                <td> {!! $course->description !!} </td>
            </tr>
            <tr>
                <td> Image </td>
                <td>
                <img src="{{ asset($course->image) }}" width="200"> 
                </td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="row clearfix mb-4 mt-4">
    <a href="{{ url('users/lessons/' . $course->id . '/create') }}" class="btn btn-primary float-right"> Add Lesson </a>
</div>

<div class="row clearfix">
@foreach ($course->sections as $section)
    <div class="mb-5 col-md-12">
        <ul class="list-group">
            <li class="list-group-item active"> {{ $section->title }} </li>
            @foreach ($section->lessons as $lesson)
                <li class="list-group-item"> 
                    <a href="{{ route('lesson-details', [$lesson->id, str_slug($lesson->title)] ) }}">
                        {{ $lesson->title }}  <br>
                        By: <small> {{ $lesson->instructor->name }} </small> 
                    </a>
                </li>
            @endforeach  
        </ul>
    </div>
@endforeach
</div>

@endsection
