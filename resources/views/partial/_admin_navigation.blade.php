   @inject('r','App\General')
   <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
   
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/home')}}" class="brand-link">
      HOME
      <span class="brand-text font-weight-light"></span>
    </a>
<?php $result= $r->getrolename(Auth::user()->id) ?>
    <!-- Sidebar -->
    <div class="sidebar">
    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
   @if($result =="superadmin") 
   <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-table"></i>
              <p>
                CBT Setup
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('startbutton')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Start Button</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('no_of_question')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Number Of Question</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('time_per_question')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Time per Subject</p>
                </a>
              </li>
                   <li class="nav-item">
                <a href="{{url('subject_setup')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Subject Setup</p>
                </a>
              </li>

            </ul>
          </li>   

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
             Set Basic Info
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('basicinfo')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Create </p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('view_basicinfo')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View </p>
                </a>
              </li>
            </ul>

          </li>            
       <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
             School
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('school')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Create School</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('view_school')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View School</p>
                </a>
              </li>
            </ul>

          </li>
               <li class="nav-item has-treeview menu-open">
            <a href="{{url('subject')}}" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
              Subject
              
              </p>
            </a>
         
          </li>

       
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Question
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('question')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('view_question')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
            </ul>
          </li>
               <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
             Post
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('post')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Create Post</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('view_post')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View Post</p>
                </a>
              </li>
            </ul>

          </li>

               <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
             Simulation
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('simulation')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('view_simulation')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
            </ul>

          </li>



          @endif           
   @if($result =="admin" || $result =="superadmin" || $result =="teacher") 
   <li class="nav-item has-treeview menu-open">
     <a href="{{url('profile')}}" class="nav-link active">
       <i class="nav-icon fa fa-th"></i>
       <p>Profile</p>
      </a>
  </li>
  @endif
  @if($result =="admin" || $result =="superadmin")  
         
     

           <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-table"></i>
              <p>
             Pin Management
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if($result =="superadmin")
              <li class="nav-item">
                <a href="{{url('pin')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('unusedpin')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View Unused</p>
                </a>
              </li>
              @endif
              <li class="nav-item">
                <a href="{{url('usedpin')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View Used</p>
                </a>
              </li>
            </ul>
          </li>
          @elseif($result =="teacher")
         <li class="nav-item has-treeview menu-open">
                <a href="{{route('subjectteacher')}}" class="nav-link active">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Subject</p>
                </a>
              </li>
          @endif
              <li class="nav-item has-treeview menu-open">
    <a href="{{ route('change_password') }}" class="nav-link active"

    <i class="nav-icon fa fa-dashboard"></i>
    <p>Change Password</p>
    </a>
   
  </li>
          <li class="nav-item has-treeview menu-open">
    <a href="{{ route('logout') }}" class="nav-link active"
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
    <i class="nav-icon fa fa-dashboard"></i>
    <p>Logout</p>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
     {{ csrf_field() }}
    </form>
  </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>