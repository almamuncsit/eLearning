@extends('layouts.admin')


@section('css')
  <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection


@section('content')


<a href="{{ url('admin/users') }}" class="btn btn-info"> Back </a>
<br>
<br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> User Information </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
       
        <tbody>
            <tr>
                <td> Name </td>
                <td> {{ $user->name }} </td>
            </tr>
            <tr>
                <td> Email </td>
                <td> {{ $user->email }} </td>
            </tr>
            <tr>
                <td> Role </td>
                <td> {{ $user->role }} </td>
            </tr>
            <tr>
                <td> Date of Birth </td>
                <td> {{ optional($user->profile)->dob }} </td>
            </tr>
            <tr>
                <td> phone </td>
                <td> {{ optional($user->profile)->phone }} </td>
            </tr>
            <tr>
                <td> Address </td>
                <td> {{ optional($user->profile)->address }} </td>
            </tr>
            <tr>
                <td> Institute </td>
                <td> {{ optional($user->profile)->institute }} </td>
            </tr>
            <tr>
                <td> Subject </td>
                <td> {{ optional($user->profile)->subject }} </td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>


@endsection
