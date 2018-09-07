@extends('layouts.admin')
@section('title','view basic info')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">basic Info</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">basic info</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
     <section class="content">
    <div class="row">
         <div class="col-sm-12 card">

              <div class="card-header">
                <h3 class="card-title">Basic Info</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              	 <form class="form-horizontal" role="form" method="POST" action="{{url('update_basicinfo')}}" data-parsley-validate>
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$ns->id}}">
                <table class="table table-bordered">
                  <tr>
                    <th>email</th>
                    <th><input type="email" class="form-control" name="email1" value="{{$ns->email1}}"></th>
                  </tr>
                  <tr>
                    <th>phone</th>
                    <th><input type="text" class="form-control" name="phone" value="{{$ns->phone}}"></th>
                  </tr>
                  <tr>
                    <th>second Email</th>
                    <th><input type="email" class="form-control" name="email2" value="{{$ns->email12}}"></th>
                  </tr>
                   <tr>
                    <th>second phone</th>
                    <th><input type="text" class="form-control" name="phone1" value="{{$ns->phone1}}"></th>
                  </tr>
                    </tr>
                   <tr>
                    <th>Address</th>
                    <th><input type="text" class="form-control" class="form" name="address" value="{{$ns->address}}"></th>
                  </tr>

                </table>
                <input type="submit" class="btn btn-primary" name="submit" value="Update">
</form>
  
  </div>

              
              </div>
         
           
        </div>
    </div>
  </section>
</div>

  @endsection  