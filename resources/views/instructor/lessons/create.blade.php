@extends('layouts.users')


@section('content')


<div class="row clearfix">
    <div class="col-md-10 offset-md-1">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> Create New lesson </h6>
                </div>
                <div class="card-body">
                    @if($mode == 'edit')
                        {!! Form::model($lesson, array('url' => 'users/lessons/' . $lesson->id, 'method' => 'PUT', 'files'=>true)) !!}
                    @else
                        {!! Form::open(array('url' => 'users/lessons', 'method' => 'POST', 'files'=>true)) !!}
                    @endif    
                        <div class="form-group ">
                            <label for="course_id"> Course : </label>
                            {{ $course->title }}
                            {!! Form::hidden('course_id', $course->id) !!}
                        </div>

                        <div class="form-group ">
                            <label for="section_id"> section : </label>
                            {!! Form::select('section_id', $sections, NULL, ['class' => 'form-control', 'placeholder' => '-- Select section --']) !!}
                            @if($errors->has('section_id')) 
                                <small class="text-danger"> {{ $errors->first('section_id') }} </small>
                            @endif
                        </div>

                        <div class="form-group ">
                            <label for="title">Lesson Title : </label>
                            {!! Form::text('title', NULL, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                            @if($errors->has('title')) 
                                <small class="text-danger"> {{ $errors->first('title') }} </small>
                            @endif
                        </div>


                        <div class="form-group ">
                            <label for="description">lesson Description : </label>
                            {!! Form::textarea('description', NULL, ['class' => 'form-control', 'id'=> 'editor', 'placeholder' => 'Description']) !!}
                            @if($errors->has('description')) 
                                <small class="text-danger"> {{ $errors->first('description') }} </small>
                            @endif
                        </div>


                        <div class="form-group ">
                            <label for="video_url">Lesson video url : </label>
                            {!! Form::text('video_url', NULL, ['class' => 'form-control', 'placeholder' => 'Video url']) !!}
                            @if($errors->has('video_url')) 
                                <small class="text-danger"> {{ $errors->first('video_url') }} </small>
                            @endif
                        </div>


                        <div class="form-group ">
                            <label for="source_code_url">Lesson source code url : </label>
                            {!! Form::text('source_code_url', NULL, ['class' => 'form-control', 'placeholder' => 'Source code url']) !!}
                            @if($errors->has('source_code_url')) 
                                <small class="text-danger"> {{ $errors->first('source_code_url') }} </small>
                            @endif
                        </div>


                       
                        
                
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    

                    {!! Form::close() !!}    

                </div>
            </div>
    </div>
</div>


@endsection

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/12.1.0/classic/ckeditor.js"></script>    
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection