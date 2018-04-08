 <div class="isotope-grid cols-3 mb-2">
              <div class="gutter-sizer"></div>
              <div class="grid-sizer"></div>
              <!-- Product-->
             
              @if($products->count()==0)
                  <h3>Không tìm thấy sản phẩm</h3>
                 
              @endif
             
              @if($products->count()>0)
              @foreach ($products as $product)
              <div class="grid-item">
                <div class="product-card">
                  <div class="product-badge text-danger">50% Off</div>
                  <div class="rating-stars">
                    @php
                      $vote=$product->vote;
                    @endphp
                    @for ($i = 0; $i<$vote; $i++)
                       <i class='icon-star filled'></i>  
                    @endfor
                    </div>
                  <a class="product-thumb" href="{{ route('detailproduct',['alias'=>$product->alias,'id'=>$product->id]) }}"><img src="public/uploads/product/{{$product->image_product[0]['image']}}" alt="Product"></a>
                  <h3 class="product-title"><a href="{{ route('detailproduct',['alias'=>$product->alias,'id'=>$product->id]) }}">{{$product->product_name}}</a></h3>
                  <h4 class="product-price">
                    {{$product->promo_price!=0?"<del>".number_format($product->unit_price)." VNĐ</del>".number_format($product->promo_price)." VNĐ":number_format($product->unit_price)." VNĐ"}}
                  </h4>
                  <div class="product-buttons">
                    <button class="btn btn-outline-secondary btn-sm btn-wishlist btn-quickview clearfix-sm-hidden" data-id="{{$product->id}}" data-toggle="tooltip" title="Xem nhanh"><i class="icon-search"></i></button>
                    <button class="  btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="{{$product->product_name}}" data-toast-message="đã thêm vào giỏ hàng!" data-id="{{$product->id }}">Thêm vào giỏ hàng</button>
                  </div>
                </div>
              </div>
                @endforeach
               @endif
               
            </div>
            <!-- Pagination-->
             @isset ($products)
             @if ($key===true)
               {{ $products->links() }}
             @else
            {{ $products->links('vendor.pagination.custompag') }}
            @endif
            @endisset