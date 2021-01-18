@extends('layouts.dashboard_app')

@section('page_title')
    Dashboard
@endsection

@section('dashboard_content')
  <!-- Start Content-->
  <div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Dashboard</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Page</a></li>
                    </ol>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end page title -->
   </div>
   <!-- end container-fluid -->

   <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Hello World</h1>
        </div>
    </div>
   </div>



   
@endsection