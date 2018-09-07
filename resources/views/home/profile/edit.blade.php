@extends('layouts.admin')
@section('title','Profile')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="row">
        
        <div class="col-sm-offset-1 col-sm-7 card card-info">

              <div class="card-header ">
                <h3 class="card-title">Profile</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              	@if(isset($p))
              	@if($p != null )
<form  method="POST" action="{{ url('update_profile') }}" data-parsley-validate>

 {{ csrf_field() }}
                <table class="table table-bordered">
                  <tr>
                    <th>Username</th>
                    <td>{{$p->email}}</td>
                  </tr>
                  <tr>
                    <th>Name</th>
                    <td><input type="text" name="name" value="{{$p->name}}" class="form-control"></td>
                  </tr>
                  <tr>
                    <th>Phone</th>
                    <td><input type="text" name="phone" value="{{$p->phone}}" class="form-control"></td>
                  </tr>
                  <tr>
                    <th>Address</th>
                    <td><input type="text" name="address" value="{{$p->address}}" class="form-control"></td>
                  </tr>
                  <tr>
                   
                    <td colspan="2"><input type="submit" name="submit" value="Updates" class="btn btn-warning"></td>
                  </tr>

                </table>
              </form>
  
                @endif
                @endif
              </div>
         
           
        </div>
    </div>
</div>
  @endsection  