 @extends('layouts.front')
@section('title','Home')
@section('content')
 <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
           
            <li class="active">Post Page</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Post Page</h1>
            <div class="content-page">
              <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->            
                <div class="col-md-9 col-sm-9 blog-posts" style="min-height: 310px;">
                  @if(isset($p))
                 
                 
                  <div class="row">
                   
                    <div class="col-sm-12">
                      <h2>{{$p->title}}</h2>
                      <ul class="blog-info">
                        <li><i class="fa fa-calendar"></i> {{$p->created_at}}</li>
                    
                       
                      </ul>
                      {!! $p->message !!}
                  
                    </div>
                  </div>
              
                 

                 
               
                  @endif              
                </div>
                <!-- END LEFT SIDEBAR -->
          
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
    @endsection