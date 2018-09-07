 @extends('layouts.front')
@section('title','Home')
@section('content')
@inject('r','App\General')
 <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
          
            <li class="active">Simulation</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
        
            <div class="content-page">
              <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->            
                <div class="col-md-9 col-sm-9 blog-posts" style="min-height: 340px;">

                 
                  <div class="row">
                   
                    <div class="col-sm-12">
                
                                       <form class="form-horizontal" role="form" method="POST" action="{{ url('sc_simulation2') }}" enctype="multipart/form-data" data-parsley-validate>
                        {{ csrf_field() }}
                    <div class="form-group">

                  <div class="col-sm-4">
                    <label >Subject</label>

                   <select class="form-control" name="subject">
                    <option value="">Select</option>

                   @if(isset($s))
                    @foreach($s as $v)
                    <?php $subject =$r->subject($v->subject_id) ?>
           <option value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach

                    @endif
                   </select>
                  </div>
                   <div class="col-sm-2">
                  <label>&nbsp;</label>  
                   <br/>                      
                        <button type="submit" class="btn btn-primary">Continue</button>
                      
                      </div>
                </div> </form>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    @if(isset($s2))
                    @foreach($s2 as $v)
                    <div class="col-sm-12">
                    <h3><b>Topic </b> {{$v->topic}}</h3>
                    <br/>
                    {!!$v->link!!}
                    <hr>
                  </div>

                    @endforeach

                    @endif

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