@extends('layouts.admin')
@section('title','Change password')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Change password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Change password</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="row">
         
        <div class="col-sm-offset-1 col-sm-7 card card-info">

              <div class="card-header ">
                <h3 class="card-title">Change password</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              	
<form  method="POST" action="{{ url('change_password') }}" data-parsley-validate>

 {{ csrf_field() }}
                <table class="table table-bordered">
                 
                  <tr>
                    <th>New Password</th>
                    <td><input type="text" name="password" value="" class="form-control"></td>
                  </tr>
                  <tr>
                    <th>Confirm Password</th>
                    <td><input type="text" name="password_confirmation" value="" class="form-control"></td>
                  </tr>
                 
                  <tr>
                   
                    <td colspan="2"><input type="submit" name="submit" value="Updates" class="btn btn-warning"></td>
                  </tr>

                </table>
              </form>
  
               
              </div>
         
           
        </div>
    </div>
</div>
  @endsection  