@extends('layouts.admin')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=93jtvhrubx336zv93jbgryvtpggfm3f05ewjhmc63mumhsq4"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>

@section('title',' Edit Post')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Post</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="row">
      
                 <div class="col-sm-2"> </div>      
      
          <div class="col-sm-8">
            <form  method="POST" action="{{ url('update_post') }}" data-parsley-validate>

 {{ csrf_field() }}
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Post</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                  <div class="form-group">
                  <label>Title</label>

                  <div class="input-group">
                    <input type="text" name="title" class="form-control" value="{{$p->title}}">
                   
                  <input type="hidden" name="id"  value="{{$p->id}}">   
                  </div>
                  <!-- /.input group -->
                </div>
                
              

                   <div class="col-sm-12">
                    <div class="form-group">
                  <label>BodyMessage</label>

                  <div class="input-group">
                   <textarea name="message" class="form-control my-editor">{{$p->message}}</textarea>
                             
                  </div>
                </div>
              </div>
            <div class="col-sm-12">
                <div class="form-group">
                
                  <div class="input-group">
                  
                    <input type="submit" class="btn btn-info" value="Updat">
                  </div>
                  <!-- /.input group -->
                </div>

            </div>
        </div>
 </form>
    </div>
</div>
  
  @endsection  