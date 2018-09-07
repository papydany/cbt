 <div class="pre-header">
        <div class="container">
            <div class="row">
                      @inject('r','App\General')
                   <?php $c= $r->getbasicinfo() ?>

                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span>{{isset($c->phone) ? $c->phone : ''}}</span></li>
                        <li><i class="fa fa-envelope-o"></i><span>{{isset($c->email1) ? $c->email1: '' }}</span></li>
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
                        <li><a href="{{url('login')}}">Log In</a></li>
                        
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>        
    </div>
    <!-- END TOP BAR -->
    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <a class="site-logo" href="{{url('/')}}"><img src="image/{{isset($c->logo) ? $c->logo : ''}}" alt="Attemt.com"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation pull-right font-transform-inherit">
          <ul>
            <li class="dropdown active">
              <a   href="{{url('/')}}">
                Home 
                
              </a>
            </li>
            
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
               Who Are We
                
              </a>
                
              <ul class="dropdown-menu">
                <li><a href="{{url('aboutus')}}">About Us</a></li>
                <li><a href="{{url('service')}}">Services</a></li>
                              
              </ul>
            </li>
           
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Teacher
                
              </a>
                
              <ul class="dropdown-menu">
                <li><a href="{{url('teacher')}}">Register</a></li>
                <li><a href="login">Login</a></li>
             </ul>
            </li>
            <li class="dropdown">
              <a  href="{{url('findteacher')}}">
                Find Teacher
              </a>
                
              
            </li>
              <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Student
              </a>
                
              <ul class="dropdown-menu">
                <li><a href="{{url('student')}}">register</a></li>
                <li><a href="{{url('student_home')}}">Login</a></li>
              </ul>
            </li>
            <li><a href="{{url('getpost')}}">Post</a></li>
            
           <li><a href="{{url('sc_simulation')}}">Simulation</a></li>
            <li><a href="{{url('contact')}}">Contact Us</a></li>
            
          

            <!-- END TOP SEARCH -->
          </ul>
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>