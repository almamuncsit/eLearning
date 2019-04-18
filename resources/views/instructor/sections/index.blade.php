@extends('layouts.users')


@section('css')
  <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection


@section('content')


<a href="{{ url('users/sections/create') }}" class="btn btn-primary float-right"> Add section </a>
<br><br>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> sections </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>SL</th>
            <th>Title</th>
            <th>Course</th>
            <th class="text-right">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($sections as $section)
                <tr>
                    <td> {{ $section->id }} </td>
                    <td> {{ $section->title }} </td>
                    <td> {{ $section->course->title }} </td>
                    <td class="text-right"> 
                        
                        <form method="post" action="{{ url('users/sections/' . $section->id ) }}">
                            <a href="{{ url('users/sections/' . $section->id . '/edit') }}" class="btn btn-primary"> Edit </a>
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