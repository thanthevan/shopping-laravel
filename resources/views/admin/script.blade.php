
    <script src="public/source/admin/plugins/jquery-1.11.1.min.js"></script>
  
     @yield('select')
    <script src="public/source/admin/plugins/jquery-migrate-1.2.1.min.js"></script>
    <script src="public/source/admin/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="public/source/admin/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script>
    <script src="public/source/admin/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="public/source/admin/plugins/mmenu/js/jquery.mmenu.min.all.js"></script>
    <script src="public/source/admin/plugins/numerator/jquery-numerator.js"></script>
    <!-- END  PAGE LEVEL SCRIPTS -->
    
     
    <script src="public/source/admin/js/application.js"></script>
    <script src="public/source/admin/plugins/jnotify/jNotify.jquery.min.js"></script>

    <script src="public/source/admin/libjs/mylib.js"></script>
     
     @if (Session::has('notify'))
    <script type="text/javascript">
        $(function(){
               mylib.notification("{{ Session::get('notify') }}","{{ Session::get('mss') }}" );
            })
    </script>

    @endif 