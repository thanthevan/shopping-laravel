<!DOCTYPE html>
<html class="no-js sidebar-large">
<head>
   @include('admin.header')
    <link rel="icon" href="public/source/page/img/favicon.png">
   <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
 
<body >
    <!-- BEGIN TOP MENU -->
     @include('admin.modules.top_bar')
    <!-- END TOP MENU -->
    <!-- BEGIN WRAPPER -->
    <div id="wrapper">
        <!-- BEGIN MAIN SIDEBAR -->
        @include('admin.modules.left_menu')
        <!-- END MAIN SIDEBAR -->
         
        <!-- BEGIN MAIN CONTENT -->
         @yield('content')
        <!-- END MAIN CONTENT -->

    </div>
    <!-- END WRAPPER -->

   
    <!-- BEGIN MANDATORY SCRIPTS -->
    @include('admin.script')
    @yield('script-upload')
</body>

</html>