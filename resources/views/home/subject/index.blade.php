@extends('layouts.admin')
@section('title','Subject')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Subject</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Subject</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="row">
          <div class="col-sm-4">
 <form class="form-horizontal" role="form" method="POST" action="{{ url('post_subject') }}" data-parsley-validate>
                        {{ csrf_field() }}
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create Subject</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label>Subject</label>

                  <div class="input-group">
                   
                    <input type="text" class="form-control" name="name" value="" required>
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
        <div class="col-sm-offset-1 col-sm-7 card card-info">

              <div class="card-header ">
                <h3 class="card-title">Subject</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              	@if(isset($s))
              	@if(count($s) > 0)
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Action</th>
       
                  </tr>
                  {{!!$c = 0}}
                  @foreach($s as $v)
                  <tr>
                    <td>{{++ $c}}.</td>
                    <td>{{$v->name}}</td>
                    <td>
                     <div class="btn-group">
                    <button type="button" class="btn btn-info">Action</button>
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a class="dropdown-item" href="{{url('edit_subject',$v->id)}}">Edit</a>
                     
                    </div>
                  </div>	
                  </td>
                 
                  </tr>
                  @endforeach
                 
                </table>
                @else

    <div class=" col-sm-9 col-sm-offset-3 alert alert-success" role="alert">
 NO Records is available 
    </div>
                @endif
                @endif
              </div>
         
           
        </div>
    </div>
</div>
  @endsection  