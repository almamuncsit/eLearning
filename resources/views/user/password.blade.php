@extends('layouts.users')


@section('content')


<div class="row clearfix">
    <div class="col-md-10 offset-md-1">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> Update Password </h6>
                </div>
                <div class="card-body">

                    {!! Form::open( array('url' => 'users/password', 'method' => 'PUT', 'files'=>true)) !!}

                       
                        <div class="form-group ">
                            <label for="old_password"> Old Password : </label>
                            {!! Form::password('old_password', ['class' => 'form-control', 'placeholder' => 'old password']) !!}
                            @if($errors->has('old_password')) 
                                <small class="text-danger"> {{ $errors->first('old_password') }} </small>
                            @endif
                        </div>
                       
                        <div class="form-group ">
                            <label for="password"> New Password : </label>
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'New password']) !!}
                            @if($errors->has('password')) 
                                <small class="text-danger"> {{ $errors->first('password') }} </small>
                            @endif
                        </div>
                       
                        <div class="form-group ">
                            <label for="password-confirm"> Cnonfirm New Password : </label>
                            {!! Form::password('password-confirm', ['class' => 'form-control', 'placeholder' => 'Cnonfirm New password']) !!}
                            @if($errors->has('password-confirm')) 
                                <small class="text-danger"> {{ $errors->first('password-confirm') }} </small>
                            @endif
                        </div>  
                        
                
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    

                    {!! Form::close() !!}    

                </div>
            </div>
    </div>
</div>


@endsection