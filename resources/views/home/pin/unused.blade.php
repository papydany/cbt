@extends('layouts.admin')
@section('title','Pin')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Pin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="row">
              <div class="col-sm-4">
 <form class="form-horizontal" role="form" method="POST" action="{{ url('unusedpin') }}" data-parsley-validate>
                        {{ csrf_field() }}
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">View Pin</h3>
              </div>
              <div class="card-body">
         <div class="form-group">
                  <label>Select School</label>

                  <div class="input-group">
                   <select class="form-control" name="user_id" required>
                     <option value="">Select </option>
                     <option value="{{Auth::user()->id}}">My Self</option>
                     @foreach($ns as $v)
                     <option value="{{$v->user_id}}">{{$v->name}}</option>
                     @endforeach
                    
                   </select>
                  </div>
                  <!-- /.input group -->
                </div>

                    <div class="form-group">
                
                  <div class="input-group">
                  
                    <input type="submit" class="btn btn-info" value="Submit">
                  </div>
                  <!-- /.input group -->
                </div>
              </div>
            </div>
          </form>
        </div>
        @if(isset($p))
        <div class="col-sm-8 card card-info">

              <div class="card-header ">
                <h3 class="card-title">Pin<a href="{{url('export_pin',$id)}}" class="btn btn-success pull-right">Export</a></h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                @if(count($p) > 0)
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Pin</th>
                    <th>Serial Number</th>
                    <th>Center Number</th>
                  
       
                  </tr>
                  {{!!$c = 0}}
                  @foreach($p as $v)
                  <tr>
                    <td>{{++ $c}}.</td>
                    <td>{{$v->pin}}</td>
                    <td>{{$v->id}}</td>
                    <td>{{$v->user_id}}</td>
                   
                 
                  </tr>
                  @endforeach
                   
                </table>
                  <div class="card-footer clearfix">
                
                  {{ $p->links() }}
              </div>
                @else

    <div class=" col-sm-9 col-sm-offset-3 alert alert-success" role="alert">
 NO Records is available 
    </div>
                @endif
                
              </div>
         
           
        </div>
        @endif
    </div>
</div>
  @endsection  