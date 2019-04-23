@extends('layouts.website')

@section('content')



<div class="container">
    <h1> {{ $course->title }} </h1>

    <div class="mb-5">
    <img src="{{ asset($course->image) }}" class="img-fluid">
    </div>

    <div>
        {!! $course->description !!}
    </div>

    @foreach ($course->sections as $section)
        <div class="mb-5">
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
