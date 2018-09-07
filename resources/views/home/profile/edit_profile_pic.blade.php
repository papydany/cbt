@extends('layouts.admin')
@section('title','Update Logo')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Profile Pic</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Update Profile Pic</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="row">
         
        <div class="col-sm-offset-1 col-sm-7 card card-info">

              <div class="card-header ">
                <h3 class="card-title">Update Profile Pic</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              
<form  method="POST" action="{{ url('update_profile_pic') }}" enctype="multipart/form-data" data-parsley-validate>

 {{ csrf_field() }}

   <div class="form-group">
                  <label>Image</label>

                  <div class="input-group">
                   
                    <input type="file" class="form-control" name="img_url" value="">
                  </div>
                
                </div>

                  <div class="form-group">
                
                  <div class="input-group">
                  
                    <input type="submit" class="btn btn-warning" value="Update">
                  </div>
                  <!-- /.input group -->
                </div>

              </form>
  
               
              </div>
         
           
        </div>
    </div>
</div>
  @endsection  