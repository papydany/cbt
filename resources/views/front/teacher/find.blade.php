@extends('layouts.front')
@section('title','Home')
@section('content')
@inject('r','App\General')
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
     
            <li class="active">Teachers Profile </li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row" style="min-height: 420px;">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h3>Find Teachers</h3>
            <div class="content-page">
              <div class="row blog-posts">
                <!-- BEGIN LEFT SIDEBAR -->
                <div class="col-md-12 margin-bottom-40"> 

                  <form class="form-horizontal" role="form" method="GET" action="{{ url('findteacher2') }}" enctype="multipart/form-data" data-parsley-validate>
                        {{ csrf_field() }}
                    <div class="form-group">
                  

                   <div class="col-sm-2">

                  <label>State Located</label>
                   <select id="state" class="form-control" name="state" required>
                    <option value="">Select State</option>
                    @if(isset($s))
                    @foreach($s as $v)
           <option value="{{$v->id}}">{{$v->state_name}}</option>
                    @endforeach

                    @endif
                    
                   </select>
                  </div>
                
               
                 
                   <div class="col-sm-2">
                     <label>LGA</label>

                 <select id="lga" class="form-control" name="lga" required>
                    <option value="">Select</option>
                    
                   </select>
                  </div>
                
             
                 
                   <div class="col-sm-2">
                    <label >Status</label>

                   <select class="form-control" name="status" required>
                    <option value="">Select</option>
                    <option value="1">Full Time</option>
                    <option value="2">Part Time</option>
                    <option value="3">Both</option>
                   </select>
                  </div>
                     <div class="col-sm-2">
                    <label >Amount Per Hour(naira)</label>

                   <select class="form-control" name="fess" required>
                    <option value="">Select</option>
                    <option value="1000">1000</option>
                    <option value="1500">1500</option>
                    <option value="2000">2000</option>
                    <option value="2500">2500</option>
                    <option value="3000">3000</option>
                    <option value="3500">3500</option>
                    <option value="4000">4000</option>
                    <option value="4500">4500</option>
                    <option value="5000">5000</option>
                    <option value="5500">5500</option>
                    <option value="6000">6000</option>
                    <option value="6500">6500</option>
                    <option value="7000">7000</option>
                    <option value="7500">7500</option>
                    <option value="8000">8000</option>
                    <option value="8500">8500</option>
                    <option value="9000">9000</option>
                   </select>
                  </div>
                
                    <div class="col-sm-2">
                    <label >Subject</label>

                   <select class="form-control" name="subject">
                    <option value="">Select</option>

                   @if(isset($sub))
                    @foreach($sub as $v)
           <option value="{{$v->id}}">{{$v->name}}</option>
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
                <div class="col-md-12 col-sm-12 blog-posts">
               @if(isset($t))
               @if(!empty($t))
                  @foreach($t as $v)
                  <div class="row">
                    <div class="col-md-2 col-sm-2">
                      <img class="img-responsive" alt="" src="image/teachers/{{$v->img_url}}">
                    </div>
                    <div class="col-md-7 col-sm-7">
                      <h2><a href="{{url('teacher_cv',$v->user_id)}}" target="_black">{{$v->name}}</a></h2>
                      <ul class="blog-info">
                        <li><i class="fa fa-calendar"></i> {{$v->updated_at}}</li>
                   
                      </ul>
                      <p><strong>Price per Hour</strong> {{$v->price}}<br/>
                      <strong>Phone Number</strong> {{$v->phone}}<br/>
                      <strong>Email</strong> {{$v->email}}<br/>
                    <strong>Contact Address</strong> {{$v->address}}</p>
                      <a href="{{url('teacher_cv',$v->user_id)}}" target="_black" class="more">View CV <i class="icon-angle-right"></i></a>
                    </div>
                    <div class="col-md-2 col-sm-2">
                      <h2>Subject</h2>
                      @if(isset($v->subject_id))
                      
<?php $subject =$r->subject($v->subject_id) ?>
<p>{{$subject->name}}</p>
                      @else
                  <?php  $ts =$r->getTeacherSubject($v->user_id); 

                  if(count($ts) > 0)
                    {
                      foreach ($ts as $key => $value) {
                        $subject =$r->subject($value->subject_id);
                      echo $subject->name."</br>";
                      }
                    }

                    ?>
                     @endif
                    </div>
                  </div>
                  <hr class="blog-post-sep">
                  @endforeach
            
                 @else
<div class="alert alert-danger" role="alert">
      No records available
    </div>
@endif     
                @endif  
                </div>           
                </div>         
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
     

        <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
       
        <div class="modal-body text-danger text-center">
          <p>... processing ...</p>
        </div>
       
      </div>
      
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
$("#state").change( function() {
 
  $("#myModal").modal();  
var id =$(this).val();

   $.getJSON("/getlga/"+id, function(data, status){
    var $lga = $("#lga");
    $lga.empty();
    $lga.append('<option value="">Select LGA</option>');
   $.each(data, function(index, value) {
   $lga.append('<option value="' +value.id +'">' + value.lga_name + '</option>');
  });
  $("#myModal").modal("hide");
    });


});
</script>
@endsection