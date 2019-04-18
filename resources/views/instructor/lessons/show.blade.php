@extends('layouts.users')



@section('content')


<a href="{{ url('users/lessons') }}" class="btn btn-info"> Back </a>
<br>
<br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> lesson Information </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
       
        <tbody>
            <tr>
                <td> Title </td>
                <td> {{ $lesson->title }} </td>
            </tr>
            <tr>
                <td> Course </td>
                <td> {{ $lesson->course->title }} </td>
            </tr>
            <tr>
                <td> Section </td>
                <td> {{ $lesson->section->title }} </td>
            </tr>
            <tr>
                <td> Description </td>
                <td> {!! $lesson->description !!} </td>
            </tr>
            <tr>
                <td> Video URL </td>
                <td> {!! $lesson->video_url !!} </td>
            </tr>
            <tr>
                <td> Source Code URL </td>
                <td> {!! $lesson->source_code_url !!} </td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>


@endsection
