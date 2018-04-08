@isset ($product)
@foreach ($product as $pd)
<style type="text/css">
    .orbit-spinner, .orbit-spinner * {
      box-sizing: border-box;
    }

    .orbit-spinner {
      height: 55px;
      width: 55px;
      border-radius: 50%;
      perspective: 800px;
    }

    .orbit-spinner .orbit {
      position: absolute;
      box-sizing: border-box;
      width: 100%;
      height: 100%;
      border-radius: 50%;
    }

    .orbit-spinner .orbit:nth-child(1) {
      left: 0%;
      top: 0%;
      animation: orbit-spinner-orbit-one-animation 1200ms linear infinite;
      border-bottom: 3px solid #5dade2;
    }

    .orbit-spinner .orbit:nth-child(2) {
      right: 0%;
      top: 0%;
      animation: orbit-spinner-orbit-two-animation 1200ms linear infinite;
      border-right: 3px solid #5dade2;
    }

    .orbit-spinner .orbit:nth-child(3) {
      right: 0%;
      bottom: 0%;
      animation: orbit-spinner-orbit-three-animation 1200ms linear infinite;
      border-top: 3px solid #5dade2;
    }

    @keyframes orbit-spinner-orbit-one-animation {
      0% {
        transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
      }
      100% {
        transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
      }
    }

    @keyframes orbit-spinner-orbit-two-animation {
      0% {
        transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
      }
      100% {
        transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
      }
    }

    @keyframes orbit-spinner-orbit-three-animation {
      0% {
        transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
      }
      100% {
        transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
      }
    }
    .loading{
        width: 60px;
       margin: 0 auto;
        padding: 100px;
    }
</style>
  <div class="loading">
      <div class="orbit-spinner">
      <div class="orbit"></div>
      <div class="orbit"></div>
      <div class="orbit"></div>
 </div>
  </div>
<form style="display: none" id="form1"  method="post" action="{{ route('product.update',['id'=>$pd->id]) }}" class="form-horizontal" enctype="multipart/form-data" >
            {{csrf_field()}}
            {{ method_field('PUT') }}
            <div class="modal-body">
               <div class="col-md-12">
                  <div class="tabcordion">
                     <ul id="myTab" class="nav nav-tabs">
                        <li class="active"><a href="#product_general1" data-toggle="tab">Chi tiết</a></li>
                        <li><a href="#product_meta1" data-toggle="tab">SEO</a></li>
                        <li><a href="#product_images1" data-toggle="tab" onclick="return false;">Hình ảnh</a></li>
                     </ul>
                     <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="product_general1">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group ">
                                    <input type="hidden" name="product_id1" value="">
                                    <label class="  col-sm-2  ">Tên sản phẩm <span class="asterisk">*</span>
                                    </label>
                                    <div class=" col-sm-10">
                                       <input type="text" class="form-control" name="product_name" value="{{$pd->product_name}}" required>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="  col-sm-2  ">Danh mục<span class="asterisk">*</span></label>
                                    <div class=" col-sm-10">
                                       <select class="form-control" title="Chọn danh mục" name="category_product" required>
                                          <option selected disabled>Chọn danh mục</option>
                                          @php
                                          category($category,0,null,$pd->category_id);
                                          @endphp 
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="  col-sm-2  ">Màu sắc<span class="asterisk">*</span></label>
                                    <div class=" col-sm-10">
                                       <select id= "color" class="form-control" multiple title="Chọn màu" id="color" name="color[]" required>
                                          @foreach (colorlib() as $cl)
                                          <option value="{{$cl}}" style="background: {{$cl}};">{{$cl}}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="  col-sm-2  ">Kích cỡ<span class="asterisk">*</span></label>
                                    <div class=" col-sm-10">
                                       <select  id= "size" class="form-control" multiple title="Chọn kích cỡ" name="size[]" required>
                                          @foreach(size_lib() as $key =>$sz)
                                          <optgroup label="{{$key}}" class="{{$key}}">
                                             @foreach ($sz as $s)
                                             <option value="{{$s}}">{{$s}}</option>
                                             @endforeach
                                          </optgroup>
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="  col-sm-2  ">Số lượng <span class="asterisk">*</span>
                                    </label>
                                    <div class=" col-sm-10">
                                       <input type="text" class="form-control" name="amount"  value="{{$pd->amount}}" required>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="  col-sm-2  ">Đơn giá <span class="asterisk">*</span>
                                    </label>
                                    <div class=" col-sm-10">
                                       <input type="text" class="form-control" placeholder=".VNĐ" name="unit_price" value="{{$pd->unit_price}}" required>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="  col-sm-2  ">Giảm giá <span class="asterisk">*</span>
                                    </label>
                                    <div class=" col-sm-10">
                                       <input type="text" class="form-control" placeholder=".VNĐ"  value="{{$pd->promo_price}}" name="promo_price">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="  col-sm-2  ">Xuất xứ<span class="asterisk">*</span>
                                    </label>
                                    <div class=" col-sm-10">
                                       <input type="text" class="form-control" value="{{$pd->producer}}"  name="producer" required>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="  col-sm-2   m-t-10">Status <span class="asterisk">*</span>
                                    </label>
                                    <div class=" col-sm-10">
                                       <div class="row">
                                        <div style="padding: 6px;">
                                           <div class="col-md-3 ">
                                             <input type="radio" id="test1" name="radio-group" value="1" {{$pd->status==1?'checked':''}}>
                                             <label for="test1">Online</label>
                                          </div>
                                           <div class="col-md-3 ">
                                             <input type="radio" id="test2" name="radio-group"  value="0" {{$pd->status==0?'checked':''}}>
                                             <label for="test2">Offline</label>
                                          </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="product_meta1">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label class="  col-sm-2  ">Mô tả <span class="asterisk">*</span>
                                    </label>
                                    <div class=" col-sm-10">
                                       <textarea rows="6" class="form-control" name="content" placeholder="Mô tả" required>{{$pd->describe}}</textarea>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="  col-sm-2  ">Meta Description <span class="asterisk">*</span>
                                    </label>
                                    <div class=" col-sm-10">
                                       <textarea rows="4" class="form-control" name="metades" required>{{$pd->meta_describe}}</textarea>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="  col-sm-2  ">Meta Keywords
                                    </label>
                                    <div class=" col-sm-10">
                                       <textarea rows="6" class="form-control" name="metakey" required>{{$pd->meta_keyword}}</textarea>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="product_images1">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="dropzone" id="my-dropzone">
                                    <div class="box" id="files2">
                                       <input type="file" name="file[]" id="file-2" class="inputfile inputfile-1"
                                          multiple />
                                       <label for="file-2">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                             <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                                          </svg>
                                          <span>Chọn ảnh&hellip;</span>
                                       </label>
                                    </div>
                                    <div id="img-show-2">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer" style="border:none;">
               <div class="form-group">
                  <div class="col-md-12 m-t-10 m-b-10 align-center" >
                     <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Cập nhật sản phẩm</button>
                  </div>
               </div>
</form>
@endforeach

<script type="text/javascript">
    setTimeout(function() {
        $('.loading').fadeOut(200,function(){

            $('.form-horizontal').fadeIn(200);
        });
       
    },1000);
</script>
<script type="text/javascript">
   $(function() {

      var color = "{{arraytostring($color,'color')}}";
      var size = "{{arraytostring($size,'size')}}";
      color =color.split(',');
      size = size.split(',');
      $('select').selectpicker();
      $('#color').selectpicker('val',color);
      $('#size').selectpicker('val',size);
   
   });
  
</script>
@endisset