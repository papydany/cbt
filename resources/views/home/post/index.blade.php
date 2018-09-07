@extends('layouts.admin') 
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script> 




@section('title','Post')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Post</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="row">
      
                 <div class="col-sm-2"> </div>      
      
          <div class="col-sm-8">
            <form  method="POST" action="{{ url('post2') }}" data-parsley-validate>

 {{ csrf_field() }}
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create Post</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                  <div class="form-group">
                  <label>Title</label>

                  <div class="input-group">
                    <input type="text" name="title" class="form-control" value="">
                   
                           
                  </div>
                  <!-- /.input group -->
                </div>
                
              

                   <div class="col-sm-12">
                    <div class="form-group">
                  <label>Body Message</label>

                  <div class="input-group">
                   <textarea name="message" id="editor"></textarea>
                 
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
<!-- <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>-->
<script>
    ClassicEditor
    .create( document.querySelector( '#editor') ) 
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    </script>

  @endsection  