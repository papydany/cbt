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
                <h3 class="card-title">Basic Info <span class="float-sm-right"><a href="{{url('edit_basicinfo',$ns->id)}}"  class="btn btn-primary">Edit</a></span></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              	
                <table class="table table-bordered">
                  
                  <tr>
                    <th>logo</th>
                    <td><img src="image/{{$ns->logo}}"></td>
                  </tr>
                  <tr>
                    <th>email</th>
                    <th>{{$ns->email1}}</th>
                  </tr>
                  <tr>
                    <th>phone</th>
                    <th>{{$ns->phone}}</th>
                  </tr>
                  <tr>
                    <th>second Email</th>
                    <th>{{$ns->email2}}</th>
                  </tr>
                   <tr>
                    <th>second phone</th>
                    <th>{{$ns->phone2}}</th>
                  </tr>
                    </tr>
                   <tr>
                    <th>Address</th>
                    <th>{{$ns->address}}</th>
                  </tr>

                </table>

  
  </div>

              
              </div>
         
           
        </div>
    </div>
  </section>
</div>

  @endsection  