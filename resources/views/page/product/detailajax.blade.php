<div class="container padding-bottom-3x mb-1">
        <div class="row">
          <!-- Poduct Gallery-->
      @php
        $detail =$detail->toArray();
         // print_r( $detail->toArray() );
      @endphp
          @foreach ($detail as $dt)
              
          
          <div class="col-md-6">
            <div class="product-gallery"><span class="product-badge text-danger">30% Off</span>
              <div>
                <div><img id="showimg" src="public/uploads/product/{{$dt['image_product'][0]['image']}}" width="280px" style="margin-left:90px;"></div>
              </div>
              <div class="owl-carousel owl-theme">
                @foreach ($dt['image_product'] as $img)
                   <div class="item img-item {{$img['id']===1?'active-view':''}}" hash="public/uploads/product/{{$img['image']}}"><img src="public/uploads/product/{{$img['image']}}" alt="{{$img['title']}}"></div>
                @endforeach
              </div>
            </div>
          </div>
          <!-- Product Info-->
          <div class="col-md-6">
            <div class="padding-top-2x mt-2 hidden-md-up"></div>
              <div class="rating-stars">
                @for ($i = 0; $i <$dt['vote'] ; $i++)
                 <i class="icon-star filled"></i> 
                @endfor
              </div><span class="text-muted align-middle">&nbsp;&nbsp;| lượt xem({{$dt['view_count']}})</span>
            <h2 class="padding-top-1x text-normal">{{$dt['product_name']}}</h2><span class="h2 d-block">
              {{ $dt['promo_price']!=0?"<del class='text-muted text-normal'>".number_format($dt['unit_price'])." VNĐ</del>".number_format($dt['promo_price'])." VNĐ": number_format($dt['unit_price'])." VNĐ" }}</span>
            <p>{{$dt['describe']}}</p>
            <div class="row margin-top-1x">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="size">Size</label>
                  <select class="form-control" id="size">
                   @foreach ($dt['size'] as $size)
                      <option>{{$size['size']}}</option>
                   @endforeach
                  </select>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-group">
                  <label for="color">Màu sắc</label>
                  <select class="form-control" id="color">
                    @foreach ($dt['color'] as $color)
                     <option >{{$color['color']}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="quantity">Số lượng</label>
                  <select class="form-control" id="quantity">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="padding-bottom-1x mb-2"><span class="text-medium">Danh mục:&nbsp;</span><a class="navi-link" href="#">Men’s shoes,</a><a class="navi-link" href="#"> Snickers,</a><a class="navi-link" href="#"> Sport shoes</a></div>
            <hr class="mb-3">
            <div class="d-flex flex-wrap justify-content-between">
              <div class="entry-share mt-2 mb-2"><span class="text-muted">Share:</span>
                <div class="share-links"><a class="social-button shape-circle sb-facebook" href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter" href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-instagram" href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="socicon-instagram"></i></a><a class="social-button shape-circle sb-google-plus" href="#" data-toggle="tooltip" data-placement="top" title="Google +"><i class="socicon-googleplus"></i></a></div>
              </div>
              <div class="sp-buttons mt-2 mb-2">
               
                <button class="btn btn-primary" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="{{$dt['product_name']}}" data-id="{{$dt['id'] }}" data-toast-message="đã thêm vào giỏ hàng!"><i class="icon-bag"></i> Thêm vào giỏ hàng</button>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
     </div>
 <script type="text/javascript">
   $(function(){
    mylib.addtocartajax();
    mylib.choiceimg();

    });
 </script>