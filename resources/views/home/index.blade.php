@extends('layouts.admin')
@section('title','Home')
@section('content')
@inject('r','App\General')
<?php $result= $r->getrolename(Auth::user()->id) ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">

           @if($result =="superadmin") 
          <div class="col-12 col-sm-6 col-md-3">
               <a href="{{url('view_school')}}">
            <div class="info-box">
           
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-gear"></i></span>
           

              <div class="info-box-content">
                <span class="info-box-text">School</span>
                <span class="info-box-number">
                  {{$ns}}
                 
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
             </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
             <a href="{{url('view_students')}}">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Students</span>
                <span class="info-box-number">{{$nst}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <a href="{{url('students_score')}}">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Students Scores</span>
            
              </div>
              <!-- /.info-box-content -->
            </div>
         </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <a href="{{url('new_teacher')}}">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Teacher</span>
                <span class="info-box-number">{{$teacher}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </a>
            <!-- /.info-box -->
          </div>
          @elseif($result =="admin")
     <div class="col-12 col-sm-6 col-md-3">
             <a href="{{url('view_students')}}">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Students</span>
                <span class="info-box-number">{{$nst}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <a href="{{url('students_score')}}">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Students Scores</span>
            
              </div>
              <!-- /.info-box-content -->
            </div>
         </a>
            <!-- /.info-box -->
          </div>

          @elseif($result =="teacher")
          @if($sc == null)
    <div class="col-12 col-sm-6 col-md-3">
             <a href="{{url('searchcreterial')}}">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Add Search Criterial</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </a>
            <!-- /.info-box -->
          </div>
          @else
        <div class="col-sm-7 card card-info">

              <div class="card-header ">
                <h3 class="card-title">Search Creterial</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php $lga =$r->getlga($sc->lga_id);
$state =$r->getState($sc->state_id)

                ?>
                <table class="table table-bordered">
                  <tr>
                    <th>State</th>
                    <td>{{$state->state_name}}</td>
                  </tr>
                  <tr>
                    <th>LGA</th>
                    <td>{{$lga->lga_name}}</td>
                  </tr>
                  <tr>
                    <th>Status</th>
                    <td>@if($sc->status == 1)
                      Full Time

                    @elseif($sc->status == 2)
                    Part Time

                    @elseif($sc->status == 3)
                    Both 

                  @endif</td>
                  </tr>
                  <tr>
                    <th>Likes</th>
                    <td>{{$sc->likes}}</td>
                  </tr>
                 
                  <tr>
                   
                    <td colspan="2"><a href="{{url('searchcreterial')}}" class="btn btn-info">Edit Search Creterial</a></td>
                  </tr>
                </table>
              </div>
            </div>
             <div class="col-sm-5 card card-info">

              <div class="card-header ">
                <h3 class="card-title">Subject you teach</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @foreach($st as $vt)
                <?php $subject =$r->subject($vt->subject_id) ?> 
                <p>{{$subject->name}}</p>

                @endforeach
              </div>
            </div>
  
          @endif



          @endif
          <!-- /.col -->
        </div>
        <!-- /.row -->

       

      

          
          </div>
     
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection  