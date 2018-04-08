<div class="topbar">
      <div class="topbar-column">
      <a class="hidden-md-down" href="mailto:support@unishop.com"><i class="icon-mail"></i>&nbsp; supportuni@gmail.com</a><a class="hidden-md-down" href="tel:00331697720"><i class="icon-bell"></i>&nbsp; 0869249714</a><a class="social-button sb-facebook shape-none sb-dark" href="https://www.facebook.com/Unishop-957109281123183/" target="_blank"><i class="socicon-facebook"></i></a><a class="social-button sb-twitter shape-none sb-dark" href="#" target="_blank"><i class="socicon-twitter"></i></a><a class="social-button sb-instagram shape-none sb-dark" href="#" target="_blank"><i class="socicon-instagram"></i></a><a class="social-button sb-pinterest shape-none sb-dark" href="#" target="_blank"><i class="socicon-pinterest"></i></a>
      </div>
      <div class="topbar-column">
       @if (Auth::guard('web')->check()===false)
        <a class="hidden-md-down"   href="{{ route('login-user') }}"> <i class="icon-head"></i>&nbsp; Đăng nhập</a>
        <a class="hidden-md-down" href="{{ route('register-user') }}"> <i class="icon-unlock"></i>&nbsp; Đăng ký</a>
       @endif
        <div class="lang-currency-switcher-wrap">
          <div class="lang-currency-switcher dropdown-toggle"><span class="language"><img alt="English" src="public/source/page/img/flags/GB.png"></span><span class="currency">Tiếng việt</span></div>
          <div class="dropdown-menu">
            <div class="currency-select">
            </div><a class="dropdown-item" href="#"><img src="public/source/page/img/flags/FR.png" alt="Français">Tiếng việt</a><a class="dropdown-item" href="#"><img src="public/source/page/img/flags/DE.png" alt="Deutsch">Tiếng anh</a>
          </div>
        </div>
      </div>
    </div>