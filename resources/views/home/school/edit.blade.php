@extends('layouts.admin')
@section('title','School')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">School</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">School</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="row">
      <div class="col-sm-3"></div>
          <div class="col-sm-6">
 <form class="form-horizontal" role="form" method="POST" action="{{url('update_school')}}" data-parsley-validate>
                        {{ csrf_field() }}
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit School</h3>
              </div>
              <div class="card-body">
            <input type="hidden" name="id" value="{{$u->id}}">
                <div class="form-group">
                  <label>School Name</label>

                  <div class="input-group">
                   
                    <input type="text" class="form-control" name="name" value="{{$u->name}}" required>
                  </div>
                
                </div>
                
                  <div class="form-group">
                  <label>Phone</label>

                  <div class="input-group">
                   
                    <input type="text" class="form-control" name="phone" value="{{$u->phone}}">
                  </div>
                
                </div>
                  <div class="form-group">
                  <label>Address</label>

                  <div class="input-group">
                   
                    <input type="text" class="form-control" name="address" value="{{$u->address}}">
                  </div>
                
                </div>
              
                <!-- IP mask -->
                <div class="form-group">
                
                  <div class="input-group">
                  
                    <input type="submit" class="btn btn-info" value="Update">
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