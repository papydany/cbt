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
 <form class="form-horizontal" role="form" method="POST" action="{{url('post_school')}}" enctype="multipart/form-data" data-parsley-validate>
                        {{ csrf_field() }}
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create School</h3>
              </div>
              <div class="card-body">
            
                <div class="form-group">
                  <label>School Name</label>

                  <div class="input-group">
                   
                    <input type="text" class="form-control" name="name" value="" required>
                  </div>
                
                </div>
                  <div class="form-group">
                  <label>Email</label>

                  <div class="input-group">
                   
                    <input type="text" class="form-control" name="email" value="" required>
                  </div>
                
                </div>
                  <div class="form-group">
                  <label>Phone</label>

                  <div class="input-group">
                   
                    <input type="text" class="form-control" name="phone" value="">
                  </div>
                
                </div>
                  <div class="form-group">
                  <label>Address</label>

                  <div class="input-group">
                   
                    <input type="text" class="form-control" name="address" value="">
                  </div>
                
                </div>
                  <div class="form-group">
                  <label>Password</label>

                  <div class="input-group">
                   
                    <input type="text" class="form-control" name="password" value="" required>
                  </div>
                
                </div>
                  <div class="form-group">
                  <label>Image</label>

                  <div class="input-group">
                   
                    <input type="file" class="form-control" name="img_url" value="">
                  </div>
                  <label class='text-danger'>logo Size  118 by 32</label>
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