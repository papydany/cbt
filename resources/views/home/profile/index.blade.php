@extends('layouts.admin')
@section('title','Profile')
@section('content')
@inject('r','App\General')
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
      <?php $result= $r->getrolename(Auth::user()->id) ?> 
         @if(isset($p))
                @if($p!= null)
        <div class="col-sm-7 card card-info">

              <div class="card-header ">
                <h3 class="card-title">Profile</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              	
                <table class="table table-bordered">
                  <tr>
                    <th>Username</th>
                    <td>{{$p->email}}</td>
                  </tr>
                  <tr>
                    <th>Name</th>
                    <td>{{$p->name}}</td>
                  </tr>
                  <tr>
                    <th>Phone</th>
                    <td>{{$p->phone}}</td>
                  </tr>
                  <tr>
                    <th>Address</th>
                    <td>{{$p->address}}</td>
                  </tr>
                  @if($result =="teacher") 
<tr>
                    <th>Price Per Hour</th>
                    <td>{{$p->price}}</td>
                  </tr>
                  @endif
                  <tr>
                   
                    <td colspan="2"><a href="{{url('edit_profile')}}" class="btn btn-info">Edit Profile</a></td>
                  </tr>
                </table>
  
              
              </div>
         
           
        </div>
        @if($result =="teacher") 
        <div class="col-sm-5 card card-info">
              <div class="card-header ">
                <h3 class="card-title">More Information</h3>
              </div>
              <div class="card-body">
               <p>
                <img src="image/teachers/{{$p->img_url}}">
              </p> 
               <p>
                <a href="{{url('edit_profile_pic')}}" class="btn btn-info">Edit Profile picture</a>
              </p> 
              @if($p->cv != null)
                <p><a href="{{url('view_cv')}}" target="_blank" class="btn btn-info">View cv</a></p>
                @else
                 <p><a href="{{url('update_cv')}}" target="_blank" class="btn btn-info">Update cv</a></p>

                @endif
              
              
              </div>
             </div>
        @else 
             <div class="col-sm-5 card card-info">
              <div class="card-header ">
                <h3 class="card-title">Logo</h3>
              </div>
              <div class="card-body">
              <p>
                <img src="image/school/{{$p->img_url}}">
              </p>
                <p>
                <a href="{{url('edit_logo')}}" class="btn btn-info">Edit Logo</a>
              </p>
              </div>
             </div>
             @endif
               @endif
                @endif
    </div>
</div>
  @endsection  