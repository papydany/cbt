@extends('layouts.admin')
@section('title','setup')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Time per Subject</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Time per Subject</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="row">
          <div class="col-sm-4">
 <form class="form-horizontal" role="form" method="POST" action="{{ url('time_per_question') }}" data-parsley-validate>
                        {{ csrf_field() }}
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Time per Subject</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label>NB : Enter time in minutes and the time is going to be per  subject</label>

                  <div class="input-group">
                   
                    <input type="text" class="form-control" name="time" value="" required>
                  </div>
                  <!-- /.input group -->
                </div>
              



                <!-- IP mask -->
                <div class="form-group">
                
                  <div class="input-group">
                  
                    <input type="submit" class="btn btn-info" value="Submit">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

              </div>
              <!-- /.card-body -->
            </div>
        </form>
        </div>
        <div class="col-sm-offset-1 col-sm-7 card card-info">

              <div class="card-header ">
                <h3 class="card-title">Time per Subject</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              	@if(isset($tpq))
              	@if(!empty($tpq))
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Time In Minute</th>
               
       
                  </tr>
                 
                  <tr>
                    <td>1.</td>
                    <td>{{$tpq->time}} minute</td>
                 
                 
                  </tr>
               
                </table>
                @else

    <div class=" col-sm-9 col-sm-offset-3 alert alert-success" role="alert">
 NO Records is available 
    </div>
                @endif
                @endif
              </div>
         
           
        </div>
    </div>
</div>

@endsection