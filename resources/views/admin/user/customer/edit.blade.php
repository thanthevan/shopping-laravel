
@isset ($user)

<form id="form2" class="form-horizontal" method="post" action="{{ route('user.update',['id'=>$user->id]) }}">
     <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
                                                    <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tên khách hàng<span class="asterisk">*</span></label>
                                     <div class="col-sm-9">
                                     <input type="text" id="" name="name" class="form-control"  value="{{$user->name}}">
                                    </div>
                                </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label">Email<span class="asterisk">*</span></label>
                                    
                                     <div class="col-sm-9">
                                     <input type="email" id="" name="email" class="form-control"  value="{{$user->email}}">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label">Số điện thoại<span class="asterisk">*</span></label>
                                     <div class="col-sm-9">
                                     <input type="text" id="" name="phone" class="form-control"  value="{{$user->phone}}">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label">Địa chỉ<span class="asterisk">*</span></label>
                                     <div class="col-sm-9">
                                     <input type="text" id="" name="address" class="form-control"  value="{{$user->address}}">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label">Mật khẩu <span class="asterisk">*</span></label>
                                     <div class="col-sm-9">
                                     <input type="text" id="" name="password" class="form-control"  value="">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label">Nhập lại<span class="asterisk">*</span></label>
                                     <div class="col-sm-9">
                                     <input type="text" id="" name="repassword" class="form-control"  value="">
                                    </div>
                            </div>
                            <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        <button   type="submit" class="btn btn-success">Sửa </button>
                    </div>

</form>
@endisset