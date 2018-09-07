 @inject('r','App\General')
 <?php $user =$r->GetUser(auth::guard('std')->user()->user_id); ?>
 <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span>{{isset($user->phone) ?$user->phone:''}} </span></li>
                        <li><i class="fa fa-envelope-o"></i><span>{{isset($user->email) ?$user->email:''}}</span></li>
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
                              <li>
    <a href="{{ route('logout') }}" 
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
   
    <p>Logout</p>
    </a>
    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
     {{ csrf_field() }}
    </form>
  </li>
         
                       
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
        <a class="site-logo" href="#"><img src="image/school/{{$user->img_url}}" alt="{{$user->img_url}}" width="118" height="32"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
        <div class="site-logo">{{isset($user->name) ?$user->name:''}}</div>

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation pull-right font-transform-inherit">

          <ul>
            <li class="dropdown active">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="{{url('/')}}">
                Home 
                
              </a>
            </li>
            <!-- END TOP SEARCH -->
          </ul>
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>