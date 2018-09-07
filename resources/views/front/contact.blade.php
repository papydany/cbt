@extends('layouts.front')
@section('title','contact us')
@section('content')
   <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            
            <li class="active">Contacts</li>
        </ul>
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12">
         
            <div class="content-page">
              <div class="row">
               
                <div class="col-md-9 col-sm-9">
                  <h2>Contact Form</h2>
                 
                  
                  <!-- BEGIN FORM-->
                   <form class="form-horizontal" role="form" method="POST" action="{{ url('contact') }}" data-parsley-validate>
                        {{ csrf_field() }}
                    <div class="form-group">
                      <label for="contacts-name">Name</label>
                      <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                      <label for="contacts-email">Email</label>
                      <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                      <label for="contacts-message">Message</label>
                      <textarea class="form-control" rows="5" name="message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Send</button>
                 
                  </form>
                  <!-- END FORM-->
                </div>

                <div class="col-md-3 col-sm-3 sidebar2">
                  <h2>Our Contacts</h2>
                  <address>
                    <strong>{{isset($c->address) ?  $c->address : ''}}</strong><br>
                    
                    <abbr title="Phone">P:</abbr>{{isset($c->phone) ? $c->phone : ''}}
                  </address>
                  <address>
                    <strong>Email</strong><br>
                    <a href="#">{{isset($c->email1) ?  $c->email1 : ''}}</a><br>
                    <a href="#">{{isset($c->email2) ? $c->email2 : ''}}</a>
                  </address>
                  <ul class="social-icons margin-bottom-40">
                    <li><a href="javascript:;" data-original-title="facebook" class="facebook"></a></li>
                    <li><a href="javascript:;" data-original-title="github" class="github"></a></li>
                    <li><a href="javascript:;" data-original-title="Goole Plus" class="googleplus"></a></li>
                    <li><a href="javascript:;" data-original-title="linkedin" class="linkedin"></a></li>
                    <li><a href="javascript:;" data-original-title="rss" class="rss"></a></li>
                  </ul>        
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
      </div>
    </div>

  @endsection 
