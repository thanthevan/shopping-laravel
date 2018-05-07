@extends('admin.master')
@section('head')
<title>Unishop-Bài viết</title>
<meta content="" name="description" />
<link rel="stylesheet" href="public/source/admin/plugins/dropzone/dropzone.css">
<link rel="stylesheet" href="public/source/admin/plugins/cke-editor/css/samples.css">
<meta content="" name="description" />

@endsection
@section('content') 
        <div id="main-content" class="post" style="padding-top: 30px">
            <div class="page-title">
                <i class="icon-custom-left"></i>
                <h3><strong>{{$post->title}}</strong></h3>
                <a href="{{ route('post.index') }}">
                    <i class="fa fa-angle-left"></i> <span>Trở lại</span>
                </a>
                <br>
            </div>
            <div class="row">
               <div class="col-md-12">

         <div class="panel panel-default">
<div class="panel-body">
               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
          @php
           echo html_entity_decode($post->decribe,ENT_QUOTES);
              
            @endphp 
         </div></div></div></div></div>
            </div>
        </div>


@endsection
