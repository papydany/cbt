<!DOCTYPE html>
<html>
<head>
@include('partial._admin_header')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navigation -->

    @include('partial._admin_navigation')


<section class="content">
        <div class="container-fluid">
            @include('partial._message')
            @yield('content')

        </div>
    </section>
        <!-- /.container-fluid -->


<footer class="main-footer">
    <strong>Copyright &copy; {{date('Y')}} 
   
    
  </footer>
</div>
<!-- /#wrapper -->
@include('partial._admin_script')
@yield('script')
</body>
</html>