@extends('layouts.front')
@section('title','Service')
@section('content')
<style type="text/css">
	.d{color: #fff;
    background: #e45000 !important;
   height: 30em !important;
}
</style>
  <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
       
            <li class="active">Services</li>
        </ul>

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>OUR SERVICE</h1>
            <div class="content-page">
              <div class="row">
                <!-- BEGIN SERVICE BLOCKS -->               
                <div class="col-md-12">
                  <div class="row margin-bottom-20">
                    <div class="col-sm-4 ">
                      <div class="service-box-v1 d">
                        <div><i class="fa fa-thumbs-up color-grey"></i></div>
                        <h2>Scholarship Test creation and administration</h2>
                        <ul>
                        <li>ATTEMPT I test</li>
                        <li>ATTEMPT II </li>
                        <li>ATTEMPT SCIENCE test</li>
                        <li>ATTEMPT mathematics competition</li>
                        <li>ATTEMPT Use of English competition</li>
                    </ul>
                      </div>
                    </div>
                    <div class="col-sm-4 ">
                      <div class="service-box-v1 d">
                        <div><i class="fa fa-cloud-download color-grey"></i></div>
                        <p>We organise and execute online and physical one on one tutoring specially tailored to meet your peculiar and relevant educational requirements in subjects like Mathematics, Use of English, Chemistry, Physics, Accounting, Biology to mention but few. We have wide range, well accepted curriculum and top notch methodology in imparting knowledge with high quality classroom delivery.</p>
                      </div>
                    </div>
                      <div class="col-sm-4 d">
                      <div class="service-box-v1 d">
                        <div><i class="fa fa-dropbox color-grey"></i></div>
                        <h2>Education Consultancy Services</h2>
                     </div>
                    </div>
                  </div>
                  <div class="row margin-bottom-20">
                  
                    <div class="col-sm-4 ">
                      <div class="service-box-v1 d">
                        <div><i class="fa fa-gift color-grey"></i></div>
                        <h2>Meet reliable tutors as we bring your school to your home</h2>
                       
                      </div>
                    </div>
              
                    <div class="col-sm-4">
                      <div class="service-box-v1 d">
                        <div><i class="fa fa-comments color-grey"></i></div>
                        <h2> Educational Science Simulations and dowloadable softwares</h2>
                       
                      </div>
                    </div>
                                    </div>
                </div>
               
              </div>

             
              

            </div>
          </div>
        </oiv>
      </div>
    </div>
 @endsection 