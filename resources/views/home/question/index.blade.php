@extends('layouts.admin')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=93jtvhrubx336zv93jbgryvtpggfm3f05ewjhmc63mumhsq4"></script>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="https://www.wiris.net/demo/plugins/tiny_mce/plugin.js"></script>

<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    external_plugins: { tiny_mce_wiris: 'https://www.wiris.net/demo/plugins/tiny_mce/plugin.js' },
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern",
     "contextmenu"
    ],
    
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter |alignright alignjustify | bullist numlist outdent indent | link image media  |  tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry",
    contextmenu: "paste | link image inserttable | cell row column deletetable",
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

@section('title','Question')

@section('content')
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
    <div class="row">
      
                        
      
          <div class="col-sm-12">
            <form  method="POST" action="{{ url('post_question') }}" data-parsley-validate>

 {{ csrf_field() }}
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create Question</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                  <div class="form-group">
                  <label>Subject</label>

                  <div class="input-group">
                   
                 <select class="form-control" name="subject_id">
                  <option value=""> Select subject</option>
                  @if(isset($s))
                  @foreach($s as $v)
                  <option value="{{$v->id}}"> {{$v->name}}</option>
                  @endforeach
                  @endif
                   
                 </select>              
                  </div>
                  <!-- /.input group -->
                </div>
                
                  @for ($i = 1; $i < 10; $i++)

                   <div class="col-sm-6 float-left">
                    <div class="form-group">
                  <label>Question</label>

                  <div class="input-group">
                   <textarea name="question[{{$i}}]" class="form-control my-editor"></textarea>
                             
                  </div>
                </div>
              </div>
    <div class="col-sm-6 float-right">
           
               
                <table class="table">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Options And Check the Right Option</th>
                    
                  </tr>
                 @for ($c = 1; $c < 7; $c++)
                 
                  <tr>
                    <td>{{$c}}</td>
                    <td> 
                      <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><input type="radio" name="answer[{{$i}}]" value="{{$i.$c}}"></span>
                      </div>
                      <input type="hidden" class="form-control" name="check[{{$i.$c}}]" value="{{$i}}">
                      <textarea name="option[{{$i.$c}}]" class="form-control my-editor"></textarea>
                      
                    </div></td>
                   
                   
                   
                  </tr>
                  @endfor
                  
                  
                </table>
              </div>
              <div class="clearfix"></div>
             

               @endfor
              
            <div class="col-sm-6">
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