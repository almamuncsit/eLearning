@extends('layouts.users')


@section('content')


<div class="row clearfix">
    <div class="col-md-10 offset-md-1">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> Create New Course </h6>
                </div>
                <div class="card-body">

                    @if($mode == 'create')
                        {!! Form::open(array('url' => 'users/sections', 'method' => 'POST', 'files'=>true)) !!}
                    @elseif($mode == 'edit')
                        {!! Form::model($section, array('url' => 'users/sections/' . $section->id, 'method' => 'PUT', 'files'=>true)) !!}
                    @endif
                        <div class="form-group ">
                            <label for="course_id"> Course : </label>
                            {!! Form::select('course_id', $courses, NULL, ['class' => 'form-control', 'placeholder' => '-- Select Course --']) !!}
                            @if($errors->has('course_id')) 
                                <small class="text-danger"> {{ $errors->first('course_id') }} </small>
                            @endif
                        </div>

                        <div class="form-group ">
                            <label for="title">Section Title : </label>
                            {!! Form::text('title', NULL, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                            @if($errors->has('title')) 
                                <small class="text-danger"> {{ $errors->first('title') }} </small>
                            @endif
                        </div>
                        
                
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    

                    {!! Form::close() !!}    

                </div>
            </div>
    </div>
</div>


@endsection