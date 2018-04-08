<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    
    <base href="{{ asset('') }}">
    <!-- SEO Meta Tags-->
       @yield('headmeta') 
    <!-- Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon and Apple Icons-->
    <link rel="icon" href="public/source/page/img/favicon.png">
    <link rel="stylesheet" media="screen" href="public/source/page/css/vendor.min.css">
    <!-- Main Template Styles-->
    <link id="mainStyles" rel="stylesheet" media="screen" href="public/source/page/css/styles.min.css">
    <!-- Modernizr-->
    <script src="public/source/page/js/modernizr.min.js"></script>
  </head>
  <!-- Body-->
  <body>
    <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.12';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <!-- Template Customizer-->
    @include('page.leftmenu')
    <!-- Topbar-->
    @include('page.topbar')
     <!-- endTopbar-->
    @include('page.header')
      
    @yield('content') 

    @include('page.footer')
  @if (session('status'))
    <div class="modal fade" id="dat-hang-thanh-cong" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Thông báo</h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <p>Bạn đã đặt hàng thành công, hàng sẽ được gửi trong vòng 3-5 hôm từ ngày đặt.</p>
            <p>Truy cập email để xem chi tiết hóa đơn.</p>
          </div>
          
        </div>
      </div>
    </div>
   @endif
      <!-- Back To Top Button-->
      <a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="public/source/page/js/vendor.min.js"></script>
    <script src="public/source/page/js/numeral.min.js"></script>
    <script src="public/source/page/js/mylib.js"></script>
    <script src="public/source/page/js/scripts.min.js"></script>
   
    @yield('script')
    @yield('script-lr')
    <script type="text/javascript">
      $(function() {
      mylib.quickview();
      mylib.carthover();
      mylib.addtocartajax();
      mylib.updatecartajax();
      mylib.removecart();
      mylib.account();
       @if (session('status'))
       $('#dat-hang-thanh-cong').modal('show');
       @endif



//fill product
   mylib.fill();
   mylib.paginateajax();
   });
    </script>


  </body>
  
<!-- Mirrored from themes.rokaux.com/unishop/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Aug 2017 07:18:16 GMT -->
</html>