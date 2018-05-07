 <!-- BEGIN TOP MENU -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('dashboard') }}"><span style="color:#0090D9">Uni</span><span style=" font-size: 20px">shop</span></a> 
            </div>
            <div class="navbar-center">Trang quản trị</div>
            <div class="navbar-collapse collapse">
                <!-- BEGIN TOP NAVIGATION MENU -->
                <ul class="nav navbar-nav pull-right header-menu">
                    <!-- BEGIN USER DROPDOWN -->
                    @if (Auth::guard('admin')->check())
                    <li class="dropdown" id="user-header">
                        <a href="#" class="dropdown-toggle c-white" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                          
                             <span class="username">{{Auth::guard('admin')->user()->name}}</span>
                        
                            
                            <i class="fa fa-angle-down p-r-10"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#" id="detailemployee" data-id="{{Auth::guard('admin')->user()->id}}">
                                    <i class="glyph-icon flaticon-account"></i> Thông tin
                                </a>
                            </li>
                           
                            
                            <li class="dropdown-footer clearfix" style="text-align:center;">
                                <a href="{{ route('logout-admin') }}" title="Đăng xuất">
                                    <i class="fa fa-power-off"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER DROPDOWN -->
                    @endif
                </ul>
                <!-- END TOP NAVIGATION MENU -->
            </div>
        </div>
    </nav>
