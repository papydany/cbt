@extends('layouts.admin') 
@section('title','Simulation')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Simulation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Simulation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="row">
      
                 <div class="col-sm-2"> </div>      
      
          <div class="col-sm-8">
            <form  method="POST" action="{{ url('simulation2') }}" data-parsley-validate>

 {{ csrf_field() }}
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create Simulation</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                  <div class="form-group">
                <select name="subject_id" class="form-control">
                  <option value="">Select Subject </option>
                  @if(isset($s))
                  @foreach($s as $v)
                  <option value="{{$v->id}}">{{$v->name}} </option>

                  @endforeach
                  @endif
                  
                </select>
                  <!-- /.input group -->
                </div>

                  <div class="form-group">
                <label>Topic</label>
                  <div class="input-group">
            <input type="text" name="topic" class="form-control" value="">
                 
                  </div>                </div>
                
              

                   <div class="col-sm-12">
                    <div class="form-group">
                  <label>Simulation Link</label>

                  <div class="input-group">
                   <textarea name="link" class="form-control"></textarea>
                 
                  </div>
                </div>
              </div>
            <div class="col-sm-12">
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
</div>

  @endsection  