@extends('layouts.admin')
@section('title','Edit Subject')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Subject</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Subject</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="row">
          <div class="col-sm-4">
 <form class="form-horizontal" role="form" method="POST" action="{{ url('update_subject') }}" data-parsley-validate>
                        {{ csrf_field() }}
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Edit Subject</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label>Subject</label>

                  <div class="input-group">
                   <input type="hidden" class="form-control" name="id" value="{{$s->id}}">
                    <input type="text" class="form-control" name="name" value="{{$s->name}}" required>
                  </div>
                  <!-- /.input group -->
                </div>
              



                <!-- IP mask -->
                <div class="form-group">
                
                  <div class="input-group">
                  
                    <input type="submit" class="btn btn-danger" value="Submit">
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