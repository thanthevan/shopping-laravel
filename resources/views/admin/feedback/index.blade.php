@extends('admin.master')
@section('head')
<title>Unishop-Phản hồi</title>
<meta content="" name="description" />
<link rel="stylesheet" href="public/source/admin/plugins/dropzone/dropzone.css">
<meta content="" name="description" />
@endsection
@section('content')
 <div id="main-content" class="page-mailbox">
            <div class="row" data-equal-height="true">
                <div class="col-md-4 list-messages">
                    <div class="panel panel-default">
                        <div class="panel-body messages">
                            @php
                                   $ac =0;
                               @endphp
                           @isset ($feedback)
                               @php
                                   $ac = $feedback->id;
                               @endphp
                           @endisset
                            <div id="messages-list" class="panel panel-default withScroll" data-height="window" data-padding="90">
                              @foreach ($feedbacks as $fb)
                                  
                              <a href="{{ route('feedback.show',['id'=>$fb->id]) }}">
                                <div class="message-item media {{$fb->id===$ac?'message-active':''}}">
                                    
                                    <div class="message-item-right">
                                        <div class="media">
                                            <img src="public/source/admin/img/avatars/avatar4_big.png" alt="avatar 4" width="50" class="pull-left">
                                            <div class="media-body">
                                                <small class="pull-right">{{$fb->created}}</small>
                                                <h5><strong>{{$fb->name}}</strong></h5>
                                                <h4>{{$fb->content}}</h4>
                                            </div>
                                        </div>
                                        <p class="f-14">{{$fb->title}} <small class="pull-right">{{$fb->status===1?'Đã xem':''}}</small></p>

                                    </div>
                                </div>
                            </a>
                               @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                  @isset ($feedback)
                <div class="col-lg-8 col-md-8 email-hidden-sm detail-message">
                    <div id="message-detail" class="panel panel-default withScroll" data-height="window" data-padding="40">
                        <div class="panel-heading messages message-result">
                            <div class="message-action-btn clearfix p-t-20">
                                <div class="pull-left">
                                    
                                    <div data-rel="tooltip" title="Reply" id="reply" data-id="{{$feedback->id}}" class="icon-rounded m-r-10"><i class="fa fa-reply"></i>
                                    </div>
                                    
                                </div>
                              
                            </div>
                            
                        </div>
                        <div class="panel-body messages message-result">
                       
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="p-20">
                                        <h3 class="message-title">{{$feedback->title}}</h3>
                                        <div class="message-item media">
                                            <div class="message-item-right">
                                                <div class="media">
                                                    <img src="public/source/admin/img/avatars/avatar4_big.png" alt="avatar 7" width="50" class="pull-left">
                                                    <div class="media-body">
                                                        <small class="pull-right">{{$feedback->created}}</small>
                                                        <h5 class="c-dark"><strong>{{$feedback->name}}</strong></h5>
                                                        <p class="c-gray">{{$feedback->email}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="message-body">
                                        <p>{{$feedback->content}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                     @endisset
            </div>
        </div>

        <div class="modal fade" id="sendmailfb">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Phản hồi</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" action="{{ route('send') }}">
                            {{csrf_field()}}
                            <div class="form-group">
                                    <label class="col-sm-3 control-label">Tới<span class="asterisk">*</span></label>
                                     <div class="col-sm-9">
                                     <input type="text" id="emailto" name="to" class="form-control" required value="">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label">Tiêu đề<span class="asterisk">*</span></label>
                                     <div class="col-sm-9">
                                     <input type="text" id="" name="title" class="form-control" required value="Thư cảm ơn">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label">Nội dung<span class="asterisk">*</span></label>
                                     <div class="col-sm-9">
                                     <textarea name="content" rows="6" class="form-control" required value="">Xin chân thành cảm ơn quý khách đã gửi thư phản hồi!
Mọi đóng góp của quý khách giúp Unishop hoàn thiện hơn.
Xin trân trọng cảm ơn !
                                     </textarea> 
                                    </div>
                            </div>
                             <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                       </div>
                        </form>  
                    </div>
                   
                </div>
            </div>
        </div>
@endsection