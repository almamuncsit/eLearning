@extends('layouts.admin')


@section('css')
  <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection


@section('content')


<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"> courses </h1>



<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> courses </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Category</th>
            <th>Title</th>
            <th>Approve</th>
            <th class="text-right">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td> {{ $course->category->title }} </td>
                    <td> {{ $course->title }} </td>
                    <td> 
                        @if($course->is_approved == 1)
                            <span class="badge badge-success"> Approved </span>
                        @else
                        <span class="badge badge-warning"> Pending </span>
                        @endif
                    </td>
                    <td class="text-right"> 
                        
                        <form method="post" action="{{ url('admin/courses/' . $course->id ) }}">
                            @if($course->is_approved != 1)
                                <a href="{{ url('admin/courses/' . $course->id . '/approve') }}" class="btn btn-info"> Approve </a>
                            @endif
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