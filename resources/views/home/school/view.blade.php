@extends('layouts.admin')
@section('title','School')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">School</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">School</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
     <section class="content">
    <div class="row">
         <div class="col-sm-12 card">

              <div class="card-header">
                <h3 class="card-title">School</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              	@if(isset($ns))
              	@if(count($ns) > 0)
                <table class="table table-bordered">
                  <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>address</th>
                    <th>Action</th>
       
                  </tr>
                </thead>
                 <tbody>
                  {{!!$c = 0}}
                  @foreach($ns as $v)
                  <tr>
                    <td>{{++ $c}}.</td>
                    <td>{{$v->name}}</td>
                    <td>{{$v->email}}</td>
                    <td>{{$v->phone}}</td>
                    <td>{{$v->address}}</td>
                    <td>
                     <div class="btn-group">
                    <button type="button" class="btn btn-info">Action</button>
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a class="dropdown-item" href="{{url('edit_school',$v->id)}}">Edit</a>
                     <a class="dropdown-item" href="{{url('deactivate_school',$v->id)}}">Deactivate</a>
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
  </div>

                @endif
                  <div class="col-sm-12">

                 {{ $ns->links() }}
             
  </div>
                @endif
              </div>
         
           
        </div>
    </div>
  </section>
</div>

  @endsection  