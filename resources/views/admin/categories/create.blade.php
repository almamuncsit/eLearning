@extends('layouts.admin')

@section('content')



<div class="row clearfix">
    <div class="col-md-6 offset-md-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> Create New Category </h6>
                </div>
                <div class="card-body">

                    <form action="{{ url('admin/categories') }}" method="POST">
                        @csrf
                        <div class="form-group ">
                            <label for="title">Category Title : </label>
                            <input type="text" name="title" class="form-control" placeholder="Title">
                            @if($errors->has('title')) 
                                <small class="text-danger"> {{ $errors->first('title') }} </small>
                            @endif
                        </div>
                
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>

                </div>
            </div>
    </div>
</div>


@endsection