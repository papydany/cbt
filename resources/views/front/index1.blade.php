@extends('layouts.front')
@section('title','Home')
@section('content')
    <div class="page-slider margin-bottom-40">
        <div id="carousel-example-generic" class="carousel slide carousel-slider">
            <!-- Indicators -->
            <ol class="carousel-indicators carousel-indicators-frontend">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <!-- First slide -->
                <div class="item carousel-item-eight active">
                    <div class="container">
                 
                    </div>
                </div>
                
                <!-- Second slide -->
                <div class="item carousel-item-nine">
                    <div class="container">
                      
                    </div>
                </div>

                <!-- Third slide -->
                <div class="item carousel-item-ten">
                    <div class="container">
                        <div class="carousel-position-six">
                       
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control carousel-control-shop carousel-control-frontend" href="#carousel-example-generic" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </a>
            <a class="right carousel-control carousel-control-shop carousel-control-frontend" href="#carousel-example-generic" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <!-- END SLIDER -->

    <div class="main">
      <div class="container">
        <!-- BEGIN SERVICE BOX -->   
        <div class="row service-box margin-bottom-40">
          <div class="col-md-4 col-sm-4">
            <div class="service-box-heading">
              <em><i class="fa fa-location-arrow blue"></i></em>
              <span>About Us</span>
            </div>
            <p>PentaEdge Educational Tests Services (PETS) is a body of professionally acclaimed trainers, educationists and experienced education system managers. Ours is a world where we encourage, evaluate and measure test-takers knowledge, skills, and aptitude thereby bringing to fore and documenting the academic readiness, &nbsp; <a href="{{url('aboutus')}}"> More </a></p>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="service-box-heading">
              <em><i class="fa fa-check red"></i></em>
              <span>OUR MISSION</span>
            </div>
            <p>Our mission is to challenge candidate's potentials to the fullest and to nourish their problem-solving capabilities to the highest by creating fair and valid educational test and assessments services. Our products and services measure knowledge and skills, promote learning and help to raise the bar of performance.</p>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="service-box-heading">
              <em><i class="fa fa-compress green"></i></em>
              <span>Our Service</span>
            </div>
            <p>Scholarship Test creation and administration <br/>
                Education Consultancy Services<br/>

                    Educational Science Simulations and dowloadable softwares<br/>
                        Educational Science Simulations and dowloadable softwares &nbsp;
                <a href="{{url('service')}}"> More </a>

            </p>
          </div>
        </div>
      </div>
    </div>
  @endsection 


 