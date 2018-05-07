@php
    $active = isset(Request::segments(3)[1])?Request::segments(3)[1]:'';
     // print_r(Request::segments(3));
@endphp

<nav id="sidebar">
            <div id="main-menu">
                <ul class="sidebar-nav">
                    <li class="{{  $active===''?'current':''}}">
                        <a href="{{ route('dashboard') }}">
                            <i class="fa fa-dashboard"></i>
                            <span class="sidebar-text">Trang chủ</span>
                        </a>
                    </li>
                    <li class="{{  ($active==='product' || $active==='category')?'current active':''}}">
                        <a href="#">
                            <i class="glyph-icon flaticon-shopping80"></i>
                            <span class="sidebar-text">Sản phẩm</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="submenu collapse ">
                            <li>
                                <a href="{{ route('category.index') }}">
                                    <span class="sidebar-text">Danh mục sản phẩm</span>
                                </a>
                            </li>
                            <li  >
                                <a href="{{ route('product.index') }}">
                                    <span class="sidebar-text">Sản phẩm</span>
                                </a>
                        </ul>
                        </li>
                        <li class="{{  $active==='order'?'current':''}}">
                            <a href="{{ route('order.index') }}">
                                <i class="fa fa-pencil-square"></i>
                                <span class="sidebar-text">Đơn hàng</span>
                            </a>
                        </li>
                        <li class="{{  ($active==='post' || $active==='categorypost')?'current active':''}}" >
                            <a href="#">
                                <i class="fa fa-edit"></i>
                                <span class="sidebar-text">Tin tức</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="submenu collapse">
                                <li>
                                    <a href="{{ route('categorypost.index')}}">
                                        <span class="sidebar-text">Danh mục bài viết</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('post.index')}}">
                                        <span class="sidebar-text">Bài viết</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="{{  $active==='feedback'?'current':''}}">
                            <a href="{{ route('feedback.index') }}">
                                <i class="glyph-icon flaticon-email"></i>
                                <span class="sidebar-text">Phản hồi</span>
                            </a>
                        </li>
                      
                          <li class="{{  ($active==='user'||$active==='employee')?'current active':''}}">
                            <a href="#">
                                <i class="glyph-icon flaticon-account"></i>
                                <span class="sidebar-text">Người dùng</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="submenu collapse">

                               @if (Auth::guard('admin')->user()->access(Auth::guard('admin')->user()->role_id)==1)
                                   
                                <li>
                                    <a href="{{ route('employee') }}">
                                        <span class="sidebar-text">Nhân viên</span>
                                    </a>
                                </li>
                              @endif
                                <li>
                                    <a href="{{ route('user.index') }}">
                                        <span class="sidebar-text">Khách hàng</span>
                                    </a>
                                </li>
                            </ul>
                        </li>  
                       
                        
                        <li class="{{  ($active==='thong-ke' ||$active ==='revenueView')?'current active':''}}">
                            <a href="#">
                                <i class="glyph-icon flaticon-charts2"></i>
                                <span class="sidebar-text">Thống kê</span>
                                <span class="fa arrow"></span>
                            </a>
                             <ul class="submenu collapse">

                             
                                   
                                <li>
                                    <a href="{{ route('statistical') }}">
                                <span class="sidebar-text">Thống kê chung</span>
                                    </a>
                                </li>
                            
                                 <li>
                                    <a href="{{ route('revenueView') }}">
                                <span class="sidebar-text">Doanh thu</span>
                                    </a>
                                </li>
                            </ul>
                            
                        </li>
                       
                </ul>
            </div>

        </nav>