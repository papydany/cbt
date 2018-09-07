@extends('layouts.front')
@section('title','Home')
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
              <li class="list-group-item clearfix"><a href="{{url('login')}}"><i class="fa fa-angle-right"></i> Login</a></li>
              <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Restore Password</a></li>
           
              
            </ul>
          </div>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9">
            <h1>Create an account</h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-7 col-sm-7">
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('teacher') }}" enctype="multipart/form-data" data-parsley-validate>
                        {{ csrf_field() }}
                    <fieldset>
                      <legend>Your personal details</legend>
                      <div class="form-group">
                        <label for="firstname" class="col-lg-4 control-label">Name <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" id="name" name="name">
                        </div>
                      </div>

                       <div class="form-group">
                        <label for="password" class="col-lg-4 control-label">Phone Number<span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="phone">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="email" class="col-lg-4 control-label">Email <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" id="email" name="email">
                        </div>
                      </div>
                        <div class="form-group">
                        <label for="password" class="col-lg-4 control-label">Password <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" id="password" name="password">
                        </div>
                      </div>
                         <div class="form-group">
                        <label for="email" class="col-lg-4 control-label">Contact Address </label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" id="email" name="address">
                        </div>
                      </div>
                        <div class="form-group">
                        <label for="password" class="col-lg-4 control-label">Enter price Per Hour in Naira<span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="pph" placeholder="12000" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="password" class="col-lg-4 control-label">Upload passport</label>
                        <div class="col-lg-8">
                          <input type="file" class="form-control" name="img_url" >
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="password" class="col-lg-4 control-label">Upload Cv</label>
                        <div class="col-lg-8">
                          <input type="file" class="form-control" name="cv" >
                        </div>
                      </div>

                <div class="form-group">
                  <label class="col-lg-4 control-label">State Located</label>

                   <div class="col-lg-8">
                    <select id="state" class="form-control" name="state" required>
                    <option value="">Select State</option>
                    @if(isset($s))
                    @foreach($s as $v)
           <option value="{{$v->id}}">{{$v->state_name}}</option>
                    @endforeach

                    @endif
                    
                   </select>
                  </div>
                
                </div>
                  <div class="form-group">
                  <label class="col-lg-4 control-label">LGA</label>

                   <div class="col-lg-8">
                 <select id="lga" class="form-control" name="lga" required>
                    <option value="">Select</option>
                    
                   </select>
                  </div>
                
                </div>
             
                  <div class="form-group">
                  <label class="col-lg-4 control-label">Status</label>

                   <div class="col-lg-8">
                   
                   <select class="form-control" name="status" required>
                    <option value="">Select</option>
                    <option value="1">Full Time</option>
                    <option value="2">Part Time</option>
                    <option value="3">Both</option>
                   </select>
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