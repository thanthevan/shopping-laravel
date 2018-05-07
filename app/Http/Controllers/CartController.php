<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ImageProduct;
use App\Color;
use App\Size;
use App\OrderDetail;
use Cart;
class CartController extends Controller
{
	public function list()
    {
    	$carts= Cart::content();
        $totals= Cart::total();
    	return view('page.cart.list',compact('carts','totals'));
    }

    public function update(Request $request)
    {
        if ($request->isMethod('post')){
       $db = OrderDetail::count_product_order($request->id);
      $bd = Product::find($request->id)->amount;
     $carts= Cart::content();
     $countcart=0;
     foreach ($carts as  $value) {
         if($value->id ==$request->id)
         {
             $countcart+=$value->qty;
         }
     }

       if($bd-($db+ $request->qty)<0 ){
           
        return response()->json(['notify'=>false]);

       }else{
    	$rowid = $request->rowid;
        $qty = $request->qty;
        Cart::update($rowid,$qty);
        return response()->json(['notify'=>true]);
    }
}
}


    public function deleteall()
    {
    	Cart::destroy();
        $totals= 0;
        return view('page.cart.list',compact('totals'));
    }
    
    public function listajax()
    {
    	
    	return response()->json(['count'=>Cart::count(),'total'=>Cart::total(),'cartcontent'=>Cart::content()->toArray()]);
    	
    }

    public function addajax(Request $request)
    {

      if ($request->isMethod('post')){
      $db = OrderDetail::count_product_order($request->id);
      $bd = Product::find($request->id)->amount;
       $carts= Cart::content();
       $countcart=0;
     foreach ($carts as  $value) {
         if($value->id==$request->id)
         {
             $countcart+=$value->qty;
         }
     } 
 
      
    		 $product_id= $request->id;
    		 $size=$request->size;
    		 $color=$request->color;
    		 $qty=0;
         $product = Product::where('id','=',$product_id)->select('product_name','unit_price','promo_price','alias')->first();
         $image = ImageProduct::where('product_id','=',$product_id)->first();
         $price=$product->promo_price!=0?$product->promo_price:$product->unit_price;
         $cartinfo = array();
         $qty=$request->qty;
         if(!empty($product_id) && !empty($size) && !empty($color)&& !empty($qty))
         {
    		  // $qty=$request->qty;
    		 $cartinfo =[
                 'id'=>$product_id,
                 'name'=>$product->product_name,
                 'qty'=>$qty,
                 'price'=>$price,
                 'options'=>[
                   'color'=>$color,
                   'size'=>$size,
                   'image'=>$image->image,
                   'alias'=>$product->alias
                  ]

    		 ];
         }else{
          $qty=$request->qty;
            
            $color = Color::where('product_id','=',$product_id)->first();
            $size = Size::where('product_id','=',$product_id)->first();
              $cartinfo =[
                 'id'=>$product_id,
                 'name'=>$product->product_name,
                 'qty'=>$qty,
                 'price'=>$price,
                 'options'=>[
                   'color'=>$color->color,
                   'size'=>$size->size,
                   'image'=>$image->image,
                    'alias'=>$product->alias
                  ]
                ];
         }

         if($bd-($db+$qty+$countcart)<0){
       
        return response()->json(['notify'=>'notadd']);

       }else{
    		 if(Cart::add($cartinfo))
    		 	{
    		 		return response()->json(['count'=>Cart::count(),'total'=>Cart::total(),'cartcontent'=>Cart::content()->toArray()]);
    		 	}
             }
             
 			
    	}
    }

    public function deleteajax(Request $request)
    {
    	 if ($request->isMethod('post')){

              $rowId=$request->rowId;
         
           if(!empty(Cart::get($rowId)->name)){
           	
             Cart::remove($rowId);
             
             return response()->json(['success'=>TRUE]);
           }

            return response()->json(['success'=>FALSE]);
              	
    	 }
    }
}
