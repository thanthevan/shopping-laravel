@extends('admin.master')
@section('head')
<title>Unishop-Bài viết</title>
<meta content="" name="description" />
<link rel="stylesheet" href="public/source/admin/plugins/dropzone/dropzone.css">
<link rel="stylesheet" href="public/source/admin/plugins/cke-editor/css/samples.css">
<meta content="" name="description" />
<style type="text/css">

   .dropzone {
   border: 2px dashed #0087F7;
   background: white;
   border-radius: 5px;
   min-height: 300px;
   padding: 90px 0;
   vertical-align: baseline;
   text-align: center;
   }
   .js .inputfile {
   width: 0.1px;
   height: 0.1px;
   opacity: 0;
   overflow: hidden;
   position: absolute;
   z-index: -1;
   }
   .inputfile+label {
   max-width: 80%;
   font-size: 1.25rem;
   /* 20px */
   font-weight: 700;
   text-overflow: ellipsis;
   white-space: nowrap;
   cursor: pointer;
   display: inline-block;
   overflow: hidden;
   padding: 0.625rem 1.25rem;
   /* 10px 20px */
   }
   .no-js .inputfile+label {
   display: none;
   }
   .inputfile:focus+label,
   .inputfile.has-focus+label {
   outline: 1px dotted #000;
   outline: -webkit-focus-ring-color auto 5px;
   }
   .inputfile+label * {
   /* pointer-events: none; */
   /* in case of FastClick lib use */
   }
   .inputfile+label svg {
   width: 1em;
   height: 1em;
   vertical-align: middle;
   fill: currentColor;
   margin-top: -0.25em;
   /* 4px */
   margin-right: 0.25em;
   /* 4px */
   }
   /* style 1 */
   .inputfile-1+label {
   color: #f1e5e6;
   background-color: #0489f7;
   }
   .inputfile-1:focus+label,
   .inputfile-1.has-focus+label,
   .inputfile-1+label:hover {
   background-color: #05457a;

   }
   .head_table{
    margin-bottom: 5px;
    border-bottom: 1.5px solid #e7e7e7;
   }
</style>
@endsection
@section('content') 

        <div id="main-content" class="post">
            <div class="page-title">
                <i class="icon-custom-left"></i>
                <h3><strong>Viết bài</strong></h3>
                <a href="{{ route('post.index') }}">
                    <i class="fa fa-angle-left"></i> <span>Trở lại</span>
                </a>
                <br>
            </div>
            <form id="post_form" action="{{ route('post.store') }}" method="post"  enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-md-12">
                    <div class="tabcordion">

                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" id="post_general">
                                <div class="row">
                                    <div class="col-md-8 post-column-left">
                                        <div class="form-group">
                                            <input type="text" class="form-control f-18" name="title" id="title" placeholder="Tiêu đề bài viết...">
                                        </div>
                                        
                                        <div class="form-group">
                                              <div class="dropzone" id="my-dropzone">
                                 <div class="box" id="files1">
                                    <input type="file" name="file" id="file-1" class="inputfile inputfile-1"
                                       multiple />
                                    <label for="file-1">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                          <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                                       </svg>
                                       <span>Chọn ảnh&hellip;</span>
                                    </label>
                                 </div>
                                 <div id="img-show-1">
                                 </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="toolbar-container"></div>
                                          <textarea id="editor" name="post_content">
                                          </textarea>
                                        </div>
                         
                                 </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="post-column-right">
                                            <div class="form-group">
                                                <div>
                                                    <h5 class="pull-left m-t-0">Danh mục bài viết <span class="asterisk">*</span></h5>
                                                </div>
                                                <select class="form-control" name="category_post_id" >
                                                   <option selected disabled>Chọn danh mục</option>
                                                   @foreach ($categorypost as $cp)
                                                      <option value="{{$cp->id}}">{{$cp->name}}</option>
                                                   @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <h5>Trạng thái <span class="asterisk">*</span></h5>
                                                 <div class="row">
                                       <div style="padding: 6px;">
                              
                                          <div class="col-md-3 ">
                                             <input class='rd' type="radio" id="test3" name="radio-group" value="1" checked>
                                             <label class='rd' for="test3">Public</label>
                                          </div> 
                                           <div class="col-md-3 ">
                                             <input type="radio" id="test4" name="radio-group"  value="0">
                                             <label for="test4">Private</label>
                                          </div>
                                       </div>
                                    </div>
                                            </div>
                                            <h3>SEO</h3>
                                            <div class="form-group">
                                                <h5>Meta Description <span class="asterisk">*</span></h5>
                                                <textarea rows="4" class="form-control" name="meta_description" ></textarea>
                                            </div>
                                            <div class="form-group">
                                                <h5>Meta Keywords</h5>
                                                <textarea rows="6" class="form-control" name="meta_keyword"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 m-t-20 m-b-40 align-center">
                    <button class="btn btn-success m-t-10 bsm"><i class="fa fa-check"></i> Lưu lại</button>
                </div>
            </div>
          </form>
        </div>


@endsection
@section('select')
  <script src="public/source/admin/plugins/cke-editor/js/ckeditor.js"></script>
  <script src="public/source/admin/plugins/cke-editor/js/sample.js"></script>
  <script type="text/javascript">
    initSample();

    
  </script>
@endsection
@section('script-upload')
<script>
   var selDiv = "";

   document.addEventListener("DOMContentLoaded", init('#file-1',"#img-show-1"), false);
   //document.addEventListener("DOMContentLoaded", init('#file-2',"#img-show-2"), false);

   function init(id1,id2) {
   document.querySelector(id1).addEventListener('change', handleFileSelect, false);
   selDiv = document.querySelector(id2);
   }

   function handleFileSelect(e) {

   if(!e.target.files || !window.FileReader) return;

   selDiv.innerHTML = "";

       var files = e.target.files;

   var filesArr = Array.prototype.slice.call(files);
   filesArr.forEach(function(f) {
   if(!f.type.match("image.*")) {
   return;
   }

   var reader = new FileReader();
   reader.onload = function (e) {
               var html = '<div class="dz-preview dz-processing dz-error dz-complete dz-image-preview"><div class="dz-image"><img data-dz-thumbnail="" alt="'+f.name+'" src="'+e.target.result+'"></div><div class="dz-details"><div class="dz-size"><span data-dz-size=""><strong>'+f.size+'</strong> bytes</span></div><div class="dz-filename"><span data-dz-name="">'+f.name+'</span></div></div></div></div>';

   selDiv.innerHTML += html;
   }
   reader.readAsDataURL(f);

   });


   }
</script>
<script>
   ( function ( document, window, index )
       {
           var inputs = document.querySelectorAll( '.inputfile' );

           Array.prototype.forEach.call( inputs, function( input )
           {
               var label     = input.nextElementSibling,
                   labelVal = label.innerHTML;

               input.addEventListener( 'change', function( e )
               {

                   var fileName = '';
                   if( this.files && this.files.length > 1 )
                       fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
                   else
                       fileName = e.target.value.split( '\\' ).pop();

                   if( fileName )
                       label.querySelector( 'span' ).innerHTML = fileName;
                   else
                       label.innerHTML = labelVal;
               });

               // Firefox bug fix
               input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
               input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
           });
       }( document, window, 0 ));
</script>

@endsection