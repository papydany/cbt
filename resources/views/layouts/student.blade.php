<!DOCTYPE html>
<html>
<head>
@include('partial.header')
<style type="text/css">
	
.btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    user-select: none;
    border: 1px solid transparent;
    padding: .375rem 1rem;
    font-size: 2rem;
    line-height: 1.5;
    border-radius: .25rem !important;
    color: white !important;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.tab-content {background: #fff !important;}
</style>
</head>
<body class="corporate">
<!-- Navigation -->
@include('partial._student_navigation')
@include('partial._message')
@yield('content')
@include('partial.foot')
@yield('script')
</body>
</html>