@extends('layouts.student')
@section('title','CBT')
@section('content')
@inject('r','App\General')
 <div class="main" style="min-height: 460px">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
          
            <li class="active">CBT</li>
            <li> {{auth::guard('std')->user()->name}}</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
        	     <div class="col-md-12 col-sm-12">
         
                <div class="col-md-4 col-sm-4 pull-right">
                  <div class="form-info">
                   
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
@endsection

