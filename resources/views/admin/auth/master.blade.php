<!DOCTYPE html>
 <html class="no-js sidebar-large"> 
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <!-- BEGIN META SECTION -->
    <meta charset="utf-8">
    @yield('title')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="public/source/admin/img/favicon.png">
    <base href="{{ asset('') }}">
    <!-- END META SECTION -->
    <!-- BEGIN MANDATORY STYLE -->
    <link href="public/source/admin/css/icons/icons.min.css" rel="stylesheet">
    <link href="public/source/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/source/admin/css/plugins.min.css" rel="stylesheet">
    <link href="public/source/admin/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
    <link href="public/source/admin/css/style.min.css" rel="stylesheet">
    <link href="#" rel="stylesheet" id="theme-color">
    <!-- END  MANDATORY STYLE -->
    <!-- BEGIN PAGE LEVEL STYLE -->
    <link href="public/source/admin/css/animate-custom.css" rel="stylesheet">
    <!-- END PAGE LEVEL STYLE -->
    <script src="public/source/admin/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
@yield('content')
@yield('script')
   
</html>

