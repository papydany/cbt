@extends('layouts.admin')
@section('title','Question')
@section('content')
@inject('R','App\General')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Question</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Question</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
     <section class="content">
    <div class="row">
         <div class="col-sm-12 card">

              <div class="card-header">
                <h3 class="card-title">Question</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-sm-6">
                <form  method="POST" action="{{ url('view_question') }}" data-parsley-validate>

 {{ csrf_field() }}      
 <div class="form-group">
                  <label>Subject</label>

                  <div class="input-group input-group-sm">
                   
                 <select class="form-control" name="subject_id">
                  <option value=""> Select subject</option>
                  @if(isset($s))
                  @foreach($s as $v)
                  <option value="{{$v->id}}"> {{$v->name}}</option>
                  @endforeach
                  @endif
                   
                 </select>              
              
                   <span class="input-group-append">
                    <button type="submit" class="btn btn-info btn-flat">Go!</button>
                  </span>
                  <!-- /.input group -->
                </div>
              </form>
            </div>
          </div>
            <div class="col-sm-6"></div> 
            <div class="clearfix"></div> 
            <div class="col-sm-12"> 


              	@if(isset($q))
              	@if(count($q) > 0)
                <table class="table table-bordered">
                  <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Question</th>
                    <th>Option</th>
                    <th>Action</th>
                  </tr>
                </thead>
                 <tbody>
                  <?php $c = 0; ?>
                  @foreach($q as $v)
                  <?php $option =$R->Getoption($v->id) ;

                  ?>
                  <tr>
                    <td>{{++ $c}}.</td>
                    <td>{!! $v->body !!}</td>
                    <td>
                      @if(count($option) > 0)
                    @foreach($option as $vp)
                  
                     <p> {!!$vp->option!!}
                      <span class="text-success">  
@if($vp->answer == 1) 
                       answer 
                       @endif

                      </span>
                       </p>
                      @endforeach
                    @endif
                      
                    </td>
                  
                  
                    <td>
                     <div class="btn-group">
                    
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a class="dropdown-item" href="{{url('edit_question',$v->id)}}">Edit</a>
                      <a class="dropdown-item" href="{{url('remove_question',$v->id)}}">Remove</a>
                    </div>
                  </div>	
                  </td>
                 
                  </tr>
                  @endforeach
                </tbody>
                 
                </table>

                @else

    <div class=" col-sm-9 col-sm-offset-3 alert alert-success" role="alert">
 NO Records is available 
    </div>
  

                @endif
                  <div class="col-sm-12">

                 {{ $q->links() }}
             
  </div>
                @endif
                </div>
              </div>
         
           
        </div>
    </div>
  </section>
</div>

  @endsection  