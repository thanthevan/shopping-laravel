@extends('admin.auth.master')
@section('title')
<title>Unishop - Đăng nhập hệ thống</title>
@endsection
@section('content')
<body class="login fade-in" data-page="login">
    <!-- BEGIN LOGIN BOX -->
    <div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div class="login-box clearfix animated flipInY">
                    <div class="page-icon animated bounceInDown">
                        <img src="public/source/admin/img/account/user-icon.png" alt="Key icon">
                    </div>
                    <div class="login-logo">
                        <a href="#?login-theme-3">
                            <img src="public/source/admin/img/account/login-logo.png" alt="Company Logo">
                        </a>
                    </div>
                    <hr>
                    <div class="login-form">
                        <!-- BEGIN ERROR BOX -->
                        @if (session('msg'))
                        <div class="alert alert-danger show">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{session('msg')}}
                        </div>
                        @endif
                        <!-- END ERROR BOX -->
                        <form action="{{ route('login-admin') }}" method="post">
                            {{csrf_field()}}
                            <input type="email" name='email' placeholder="Email" class="input-field form-control user" required />
                            @if (count($errors) > 0)
                             <span style="color: #a94442;margin-left: 100px;">{{$errors->first('email')}}</span>
                            @endif
                            <input type="password" name='password' placeholder="Mật khẩu" class="input-field form-control password"  required />
                            @if (count($errors) > 0)
                            <span style="color: #a94442;margin-left: 100px;">{{$errors->first('password')}}</span>
                            @endif
                            <div class="div-login" style="margin:auto;text-align:center">
                                <button  class="btn btn-login ladda-button" type="submit">Đăng nhập</button>
                            </div> 
                        </form>
                        <div class="login-links">
                            <a href="password_forgot.html">Quên mật khẩu?</a>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<!-- END LOCKSCREEN BOX -->
<!-- BEGIN MANDATORY SCRIPTS -->
<script src="public/source/admin/plugins/jquery-1.11.js"></script>
<script src="public/source/admin/plugins/bootstrap/bootstrap.min.js"></script>
<!-- END MANDATORY SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script src="public/source/admin/js/account.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
</body>
@endsection