@extends('layouts.front')
@section('title','Registration')
@section('content')
<div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
          
            <li class="active">Create new account</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-3">
            <ul class="list-group margin-bottom-25 sidebar-menu">
              <li class="list-group-item clearfix"><a href="{{url('student_login')}}"><i class="fa fa-angle-right"></i> Login</a></li>
            <!--  <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Restore Password</a></li>-->
           
              
            </ul>
          </div>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9">
            <h1>Create an account</h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-7 col-sm-7">
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('student_reg') }}" enctype="multipart/form-data" data-parsley-validate>
                        {{ csrf_field() }}
                    <fieldset>
                      <legend>Your personal details</legend>
                      <div class="form-group">
                        <label for="firstname" class="col-lg-4 control-label">Name <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="hidden" class="form-control"  name="pin_id" value="{{$c->id}}">
                          <input type="hidden" class="form-control"  name="user_id" value="{{$c->user_id}}">
                          <input type="hidden" class="form-control"  name="pin" value="{{$c->pin}}">
                          <input type="text" class="form-control" id="name" name="name" autocomplete="off">
                        </div>
                      </div>

                       <div class="form-group">
                        <label for="password" class="col-lg-4 control-label">Phone Number<span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="phone" autocomplete="off">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="email" class="col-lg-4 control-label">Email <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" id="email" name="email" autocomplete="off">
                        </div>
                      </div>
                         <div class="form-group">
                        <label for="email" class="col-lg-4 control-label">Password <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control"  name="password" autocomplete="off">
                        </div>
                      </div>
                        <div class="form-group">
                        <label for="password" class="col-lg-4 control-label">Address <span class="require">*</span></label>
                        <div class="col-lg-8">
                         <textarea class="form-control" name="address" autocomplete="off"></textarea>
                        </div>
                      </div>

                        <div class="form-group">
                        <label for="email" class="col-lg-4 control-label">passport <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="file" class="form-control"  name="img_url">
                        </div>

                      </div>

                    </fieldset>
                    <fieldset>
                       <div class="form-group">
                        <label for="email" class="col-lg-4 control-label">Select Subject<span class="require">*</span></label>
                   
                      <div class="col-lg-8">
                      @foreach($s as $v)
                    <p><input type="checkbox" name="subject_id[{{$v->id}}]" value="{{$v->id}}">
                      {{$v->name}}  

                    </p>

                      @endforeach
                    </div>
                  </div>
                    </fieldset>
                   
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                        <button type="submit" class="btn btn-primary">Create an account</button>
                      
                      </div>
                    </div>
                  </form>
                </div>
              
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
@endsection 