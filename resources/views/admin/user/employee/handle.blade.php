  

  <form id="form2" class="form-horizontal" method="post" action="{{ route('updateemployee') }}">
                     <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
                     <input type="hidden"  name="id" value="{{$admin->id}}">
                    <div class="modal-body">
                      
                             <div class="form-group">
                                    <label class="col-sm-3 control-label">Tên nhân viên<span class="asterisk">*</span></label>
                                     <div class="col-sm-9">

                                     <input type="text" name="name" class="form-control" disabled required value="{{$admin->name}}">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label">Email<span class="asterisk">*</span></label>
                                     <div class="col-sm-9">
                                     <input type="email" name="email" class="form-control" disabled required value="{{$admin->email}}">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label">Số điện thoại<span class="asterisk">*</span></label>
                                     <div class="col-sm-9">
                                     <input type="text" name="phone" class="form-control" disabled required value="{{$admin->phone}}">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label">Quyền</label>
                                     <div class="col-sm-9">
                                     <select name="role" id="inputRole" class="form-control" required="required">
                                        @foreach ( $roles as $r)
                                        @if ($admin->role_id==$r->id)
                                           <option value="{{$r->id}}" selected>{{$r->name}}</option>
                                        @else
                                           <option value="{{$r->id}}" >{{$r->name}}</option> 
                                           @endif   
                                        @endforeach
                                     </select>
                                    </div>
                            </div>
                           {{--  <div class="form-group">
                                    <label class="col-sm-3 control-label">Mật khẩu</label>
                                     <div class="col-sm-9">
                                     <input type="password" name="password" class="form-control" disabled  value="">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label">Nhập lại</label>
                                     <div class="col-sm-9">
                                     <input type="password" name="repassword" class="form-control" disabled  value="">
                                    </div>
                            </div> --}}

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-success">Sửa</button>
                    </div>
                    </form>