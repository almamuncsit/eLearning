@extends('layouts.master')


@section('menubar')

<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <div class="container">
        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link manu-link" href="#"> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link manu-link" href="#"> Courses </a>
            </li>
            <li class="nav-item">
                <a class="nav-link manu-link" href="#"> About </a>
            </li>
            <li class="nav-item">
                <a class="nav-link manu-link" href="#"> Contact </a>
            </li>
        </ul>

        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
            </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                        </div>
                    </div>
                    </form>
                </div>
            </li>

        

            

            @if(Auth::check())
               @include('includes.user-menu')
            @else 

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link manu-link" href="{{ route('login') }}"> Login </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link manu-link" href="{{ route('register') }}"> Registration </a>
                </li>
                </ul>

            @endif

        </ul>

    </div>    

</nav>
<!-- End of Topbar -->    

@endsection


@section('main-content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="container">

        @yield('content')

    </div>
</div>
<!-- /.container-fluid -->

@endsection