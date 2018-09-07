@extends('layouts.admin')
@section('title','setup')
@section('content')
@inject('r','App\General')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Start Exam Setup</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Start Exam Setup</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="row">
          <div class="col-sm-4">
 <form class="form-horizontal" role="form" method="POST" action="{{ url('startbutton') }}" data-parsley-validate>
                        {{ csrf_field() }}
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Start Exam Setup</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <div class="input-group">
                  	<select class="form-control" name="status" required>
                  		<option value="">Select </option>
                  		<option value="1">Start Exams</option>
                  		<option value="0">End Exams</option>
                  	</select>
                  
                  </div>
                  <!-- /.input group -->
                </div>

                    <div class="form-group">
                  <div class="input-group">
                    <select class="form-control" name="user_id" required>
                      <option value="">Select </option>
                      <option value="{{Auth::user()->id}}">my own students</option>
                      @foreach($s as $v)
                      <option value="{{$v->user_id}}">{{$v->name}}</option>
                      @endforeach
              
                    </select>
                  
                  </div>
                  <!-- /.input group -->
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
        <div class="col-sm-offset-1 col-sm-7 card card-info">

              <div class="card-header ">
                <h3 class="card-title">Exam Status</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              	@if(isset($sb))
              	@if(!empty($sb))
                <table class="table table-bordered">
                  <tr>
                    <th>#</th>
                    <th>Examination Status</th>
                   
       
                  </tr>
                @foreach($sb as $v)
                <?php $u =$r->GetUser($v->user_id)?>
                  <tr>
                    <td>{{$u->name}}</td>
                    <td>@if($v->status == 1)
                    <span class="text-success">Start Examination</span>

                    @else
   <span class="text-danger">Examination Not ready</span>
                @endif</td>
              
                 
                  </tr>
                  @endforeach
               
                 
                </table>
                @else

    <div class=" col-sm-9 col-sm-offset-3 alert alert-success" role="alert">
 NO Records is available 
    </div>
                @endif
                @endif
              </div>
         
           
        </div>
    </div>
</div>
@endsection