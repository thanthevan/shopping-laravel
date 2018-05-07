
          <ul style="list-style: none">
          	@foreach ($products as $product)
          		 <li style="margin-left:40%"><a href="{{ route('detailproduct',['alias'=>$product->alias,'id'=>$product->id]) }}" style="font-size: 22px;text-decoration: none">{{$product->product_name}}</a></li>
          	@endforeach
           
          </ul>
