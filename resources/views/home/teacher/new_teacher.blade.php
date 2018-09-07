@extends('layouts.admin')
@section('title','Teacher')
@section('content')
@inject('r','App\General')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">New Teacher</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">New Teacher</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="row">
    	<div class="col-sm-12">
    		@if(isset($t))
    		@if(count($t) > 0)
    		<table class="table table-bordered table-striped">
    			<tr>
    				<th>Name</th>
    				<th>Phone</th>
    				<th>Price</th>
    				<th>address</th>
    				<th>passport</th>
    				<th>Action</th>
    			</tr>
    			@foreach($t as $v)
    			<tr>
    				<td>{{$v->name}}</td>
    				<td>{{$v->phone}}</td>
    				<td>{{number_format($v->price)}}</td>
    				<td>{{$v->address}}</td>
    				<td><img src="image/teachers/{{$v->img_url}}" width="50px"></td>
    				<td>  <div class="btn-group">
                    
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                      <span class="caret">Action</span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                    	@if($v->cv != null)
                      <a class="dropdown-item" href="{{url('teacher_cv',$v->user_id)}}" target="_blank">View CV</a>
                      @endif
                      <a class="dropdown-item" href="{{url('approved_teacher',$v->user_id)}}">Approved</a>
                    </div>
                  </div></td>
    			</tr>
    			@endforeach
    			
    		</table>
    		@endif
    		@endif
    	</div>
    
    </div>
       
</div>
@endsection


25929