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
        
            <div class="content-page">
              <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->            
                <div class="col-md-9 col-sm-9 blog-posts" style="min-height: 340px;">
                  @if(isset($p))
                  @foreach($p as $v)
                 
                  <div class="row">
                   
                    <div class="col-sm-12">
                      <h2><a href="{{url('getpost_detail',$v->id)}}">{{$v->title}}</a></h2>
                      <ul class="blog-info">
                        <li><i class="fa fa-calendar"></i>{{date("M j,Y h:i:sa",strtotime($v->created_at))}}</li>
                    
                       
                      </ul>
                      
                      {!! substr($v->message,0,200)!!}
                   
                  @if(strlen($v->message) > 200)
                  <a href="{{url('getpost_detail',$v->id)}}" class="more">Read more <i class="icon-angle-right"></i></a>
                  @endif
                    </div>
                  </div>
                  <hr class="blog-post-sep">
                  @endforeach

                 
                  <ul class="pagination">
             
                    <li><a href="javascript:;">{{ $p->links() }}</a></li>
                    
                   
                  </ul> 
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