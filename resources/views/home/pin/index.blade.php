@extends('layouts.admin')
@section('title','Pin')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Pin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="row">
          <div class="col-sm-6">
 <form class="form-horizontal" role="form" method="POST" action="{{ url('pin') }}" data-parsley-validate>
                        {{ csrf_field() }}
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create Pin</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label>Pin</label>

                  <div class="input-group">
                   
                    <input type="number" class="form-control" name="number" value="" required>
                  </div>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label>Pin Length</label>

                  <div class="input-group">
                   <select class="form-control" name="pin_lenght" required>
                     <option value="">Select </option>
                     <option value="8">8</option>
                     <option value="10">10</option>
                     <option value="12">12</option>
                   </select>
                  </div>
                  <!-- /.input group -->
                </div>
                 <div class="form-group">
                  <label>Select School</label>

                  <div class="input-group">
                   <select class="form-control" name="user_id" required>
                     <option value="">Select </option>
                     <option value="{{Auth::user()->id}}">My Self</option>
                     @foreach($ns as $v)
                     <option value="{{$v->user_id}}">{{$v->name}}</option>
                     @endforeach
                    
                   </select>
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
    
    </div>
</div>
  @endsection  