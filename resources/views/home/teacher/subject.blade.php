@extends('layouts.admin')
@section('title','Select your Subject')
@section('content')
@inject('r','App\General')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Subject You Teach</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Subject You Teach</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="row">
    	<div class="col-sm-6">
         <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add Subject You Teach</h3>
              </div>
              <div class="card-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('subjectteacher') }}" enctype="multipart/form-data" data-parsley-validate>
                        {{ csrf_field() }}
        <table class="table table-bordered table-striped">
          <tr>
            <th>#</th>
            <th>Subject</th>
          </tr>
          @foreach($s as $v)
          <tr>
            <td><input type="checkbox" class="form-control" name="check[{{$v->id}}]" value="{{$v->id}}"></td>
              <td>{{$v->name}}</td>
            
          </tr>
          @endforeach
          
        </table>
            <!-- IP mask -->
                <div class="form-group">
                
                  <div class="input-group">
                  
                    <input type="submit" class="btn btn-info" value="Submit">
                  </div>
                  <!-- /.input group -->
                </div>
      </form>
    </div>
  </div>
</div>
  
    </div>
    </div>
       
</div>
@endsection

