<!DOCTYPE html>
<html>
<head>
@include('partial.header')
</head>
<body class="corporate">
<!-- Navigation -->
@include('partial.navigation')
@include('partial._message')
@yield('content')
@include('partial.foot')
@yield('script')
</body>
</html>