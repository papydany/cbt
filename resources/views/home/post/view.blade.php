@extends('layouts.admin')
@section('title','View Post')
@section('content')
@inject('R','App\General')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">View Post</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
     <section class="content">
    <div class="row">
         <div class="col-sm-12 card">

              <div class="card-header">
                <h3 class="card-title">View Post</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                        


              	@if(isset($p))
              	@if(count($p) > 0)
                <table class="table table-bordered">
                  <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th>body</th>
                    <th>Action</th>
                  </tr>
                </thead>
                 <tbody>
                  <?php $c = 0; ?>
                  @foreach($p as $v)
                
                  <tr>
                    <td>{{++ $c}}.</td>
                    <td>{{$v->title}}</td>
                    <td>{!! substr($v->message,0,100)!!}</td>
                    <td>
                     <div class="btn-group">
                    
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                      <span class="caret">Action</span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a class="dropdown-item" href="{{url('edit_post',$v->id)}}" target="_blank">Edit</a>
                      <a class="dropdown-item" href="{{url('delete_post',$v->id)}}">Remove</a>
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

                 {{ $p->links() }}
             
  </div>
                @endif
                </div>
              </div>
          </div>
    </div>
  </section>
</div>

  @endsection  