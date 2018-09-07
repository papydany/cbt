@extends('layouts.admin')
@section('title','Add Search Criterial')
@section('content')
@inject('r','App\General')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Search Criterial</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Search Criterial</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="row">
    	<div class="col-sm-6">
    <form class="form-horizontal" role="form" method="POST" action="{{route('searchcreterial')}}" enctype="multipart/form-data" data-parsley-validate>
                        {{ csrf_field() }}
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create School</h3>
              </div>
              <div class="card-body">
            
                <div class="form-group">
                  <label>State</label>

                  <div class="input-group">
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
                  <label>LGA</label>

                  <div class="input-group">
                 <select id="lga" class="form-control" name="lga" required>
                   	<option value="">Select</option>
                   	
                   </select>
                  </div>
                
                </div>
             
                  <div class="form-group">
                  <label>Status</label>

                  <div class="input-group">
                   
                   <select class="form-control" name="status" required>
                   	<option value="">Select</option>
                   	<option value="1">Full Time</option>
                   	<option value="2">Part Time</option>
                   	<option value="3">Both</option>
                   </select>
                  </div>
                
                </div>
              
              



                <!-- IP mask -->
                <div class="form-group">
                
                  <div class="input-group">
                  
                    <input type="submit" class="btn btn-info" value="Submit">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

              </div>
              <!-- /.card-body -->
            </div>
        </form>
    </div>
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