@extends('layouts.users')


@section('css')
  <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection


@section('content')


<a href="{{ url('users/lessons/create') }}" class="btn btn-primary float-right"> Add Lesson </a>
<br><br>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> lessons </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>SL</th>
            <th>Title</th>
            <th>Course</th>
            <th>Section</th>
            <th class="text-right">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($lessons as $course)
                <tr>
                    <td> {{ $course->id }} </td>
                    <td> {{ $course->title }} </td>
                    <td> {{ $course->course->title }} </td>
                    <td> {{ $course->section->title }} </td>
                    <td class="text-right"> 
                        
                        <form method="post" action="{{ url('users/lessons/' . $course->id ) }}">
                            <a href="{{ url('users/lessons/' . $course->id) }}" class="btn btn-info"> View </a>
                            <a href="{{ url('users/lessons/' . $course->id . '/edit') }}" class="btn btn-primary"> Edit </a>
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('Are You Sure?')" class="btn btn-danger">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>



@endsection



@section('js')
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection