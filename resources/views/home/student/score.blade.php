@extends('layouts.admin')
@section('title','Students')
@section('content')
@inject('r','App\General')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Students</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Students</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
     <section class="content">
    <div class="row">
         <div class="col-sm-12 card">

              <div class="card-header">
                <h3 class="card-title">Students</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('students_score') }}" data-parsley-validate>
                        {{ csrf_field() }}
                <div class="form-group">
                  <div class="col-sm-5">
                    <select class="form-control" name="user_id" required>
                      <option value="">Select Schools </option>
                      <option value="{{Auth::user()->id}}">my own students</option>
                      @foreach($s as $v)
                      <option value="{{$v->user_id}}">{{$v->name}}</option>
                      @endforeach
              
                    </select>
                  
                  </div>
                  <br/>
                  <div class="col-sm-5">
                    <input type="submit" class="btn btn-info" value="Submit">
                  </div>
                  <!-- /.input group -->
                </div>
              </form>

                @if(isset($ss))
                @if(count($ss) > 0)
                 <h3>{{$sn->name}}</h3>
                <table class="table table-bordered">
                  <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                   <th>phone</th>
                  <th>Subject & Score</th>
       
                  </tr>
                </thead>
                 <tbody>
                  {{!!$c = 0}}
                  @foreach($ss as $v)
                  <?php $gss =$r->getScore($v->id); ?>
                  <tr>
                    <td>{{++ $c}}.</td>
                    <td>{{$v->name}}</td>
                   <td>{{$v->phone}}</td>
                   
                    <td>
                      @if(count($gss))
                      @foreach($gss as $vs)
                      <?php $sub =$r->subject($vs->subject_id) ?>
                      {{isset($sub->name) ?$sub->name:''}} &nbsp;&nbsp;<span class="text-justify">{{$vs->score}} %</span> <br/>

                      @endforeach
                  @endif
                  </td>
                 
                  </tr>
                  @endforeach
                </tbody>
                 
                </table>

                @else

    <div class=" col-sm-9 col-sm-offset-3 alert alert-success" role="alert">
 NO Records is available 
    </div>
  </div>

                @endif
                  <div class="col-sm-12">

                 {{ $s->links() }}
             
  </div>
                @endif

              	
              </div>
         
           
        </div>
    </div>
  </section>
</div>

  @endsection  