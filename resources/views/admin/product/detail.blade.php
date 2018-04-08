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
  <div class="row p-20 sp" style="display: none">
                                    <div class="col-md-4">
                                        <h3 class="m-t-0 m-b-20">{{$pd->product_name}}</h3>
                                        <form class="form-horizontal p-20">
                                            <div class="form-group">
                                                <div class=" col-sm-4">Tên sản phẩm:
                                                </div>
                                                <div class="col-sm-7">
                                                    <strong>{{$pd->product_name}}</strong>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class=" col-sm-4">Ngày thêm:
                                                </div>
                                                <div class="col-sm-7">
                                                    <strong>{{$pd->created}}</strong>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class=" col-sm-4">Lượt xem:
                                                </div>
                                                <div class="col-sm-7">
                                                    <strong>{{$pd->view_count}}</strong>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class=" col-sm-4">Meta keyword:
                                                </div>
                                                <div class="col-sm-7">
                                                    <strong>{{$pd->meta_keyword}}</strong>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class=" col-sm-4">Meta description:
                                                </div>
                                                <div class="col-sm-7">
                                                    <strong>{{$pd->meta_describe}}</strong>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class=" col-sm-4">Trạng thái:
                                                </div>
                                                <div class="col-sm-7">
                                                    <strong >{{$pd->status==1?'online':'offline'}}</strong>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="m-t-0 m-b-20">Thuộc tính</h3>
                                        <form class="form-horizontal p-20">
                                            <div class="form-group">
                                                <div class=" col-sm-3">
                                                    Màu sắc:
                                                </div>
                                                <div class="col-sm-8" >
                                                    @foreach ($color as $cl)
                                                        <span style="display: inline-block;margin-right:20px;"><div style="display: inline-block;width:22px;height: 22px; background-color:{{$cl->color}};border: 1px solid black"></div> <div style="display: inline-block;width:22px;height: 22px; line-height: 22px;" >{{$cl->color}}</div></span>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class=" col-sm-3">
                                                    Kích cỡ:
                                                </div>
                                                <div class="col-sm-8" >
                                                    @foreach ($size as $sz)
                                                        <div style="margin-bottom:5px; margin-right:20px;text-align:center;display: inline-block;width:26px;height: 26px; border: 1px solid black">{{$sz->size}}</div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class=" col-sm-3">
                                                    Số lượng:
                                                </div>
                                                <div class="col-sm-8">
                                                    <strong>{{$pd->amount}}</strong>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class=" col-sm-3">
                                                    Xuất xứ:
                                                </div>
                                                <div class="col-sm-8 c-red">
                                                    <strong>{{$pd->producer}}</strong>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class=" col-sm-3">
                                                    Đơn giá:
                                                </div>
                                                <div class="col-sm-8">
                                                    <strong>{{number_format($pd->unit_price)}} VNĐ</strong>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class=" col-sm-3">
                                                    Giảm giá:
                                                </div>
                                                <div class="col-sm-8">
                                                    <strong>{{empty($pd->promo_price)?'-':number_format($pd->promo_price)." VNĐ"}} </strong>
                                                </div>
                                            </div>
                                              <div class="form-group">
                                                <div class=" col-sm-3">Vote:
                                                </div>
                                                <div class="col-sm-8">
                                                    <strong>{{$pd->vote}} Sao</strong>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class=" col-sm-3">Mô tả:
                                                </div>
                                                <div class="col-sm-8">
                                                    <strong>{{$pd->describe}}</strong>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-2">
                                        <h3 class="m-t-0 m-b-20">Hình ảnh</h3>
                                        <form class="form-horizontal p-20">
                                            <div class="form-group">
                                                @foreach ($image as $img)

                                                        <div style="display: inline-block;border:2px dashed #0087F7; margin-right: 10px;">
                                                           <img width=150 height=180 src="public/uploads/product/{{ $img->image}}" alt="{{ $img->image}}">
                                                        </div>


                                                 @endforeach
                                            </div>
                                        </form>
                                    </div>
</div>
@endforeach
<script type="text/javascript">
    setTimeout(function() {
        $('.loading').fadeOut(200,function(){

            $('.sp').fadeIn(200);
        });

    },1000);
</script>
@endisset

