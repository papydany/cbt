@extends('layouts.front')
@section('title','Home')
@section('content')
 <div class="main" style="min-height: 460px">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
          
            <li class="active">Login</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9">
            <h1>Student Login </h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-7 col-sm-7">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('student_login') }}" data-parsley-validate>
                        {{ csrf_field() }}

                    <div class="form-group">
                      <label  class="col-lg-4 control-label">Email <span class="require">*</span></label>
                      <div class="col-lg-8">
                        <input type="text" class="form-control" name="email" autocomplete="off">
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-lg-4 control-label">Password <span class="require">*</span></label>
                      <div class="col-lg-8">
                        <input type="password" class="form-control" name="password">
                      </div>
                    </div>
                   
                   
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                        <button type="submit" class="btn btn-primary">Login</button>
                      </div>
                    </div>
                    
                  </form>
                </div>
                <div class="col-md-4 col-sm-4 pull-right">
                  <div class="form-info">
                    <h2><em>Important</em> Information</h2>
                    <p>Duis autem vel eum iriure at dolor vulputate velit esse vel molestie at dolore.</p>

                    <button type="button" class="btn btn-default">More details</button>
                  </div>
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