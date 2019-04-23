@extends('layouts.website')

@section('content')
<div class="container-fluid">
    
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="http://wowslider.com/sliders/demo-77/data1/images/field175959_1920.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://forums.oscommerce.com/uploads/monthly_04_2016/post-336856-0-18918000-1459704022.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://ps.w.org/slider-wd/assets/screenshot-1.jpg?rev=1265847" class="d-block w-100" alt="...">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

</div>



<div class="container">
    <h1> Courses </h1>

<div class="row">
    @foreach ($courses as $course)
        <div class="col-md-3">
            <div class="card" style="width: 100%;">
                <img src="{{ asset( $course->image ) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> {{ $course->title }} </h5>
                    <p class="card-text">
                        {!! substr($course->description, 0, 100) !!}
                    </p>
                    <a href="{{ route('course-details', $course->id) }}" class="btn btn-primary">Start Course</a>
                </div>
            </div>
        </div>
    @endforeach
</div>    
    

</div>




@endsection
