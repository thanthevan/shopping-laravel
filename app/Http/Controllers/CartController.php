<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ImageProduct;
use App\Color;
use App\Size;
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
    	$rowid = $request->rowid;
        $qty = $request->qty;
        Cart::update($rowid,$qty);
        return response()->json(['success'=>true]);
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

    		 $product_id= $request->id;
    		 $size=$request->size;
    		 $color=$request->color;
    		 $qty=$request->qty;
         $product = Product::where('id','=',$product_id)->select('product_name','unit_price','promo_price','alias')->first();
         $image = ImageProduct::where('product_id','=',$product_id)->first();
         $price=$product->promo_price!=0?$product->promo_price:$product->unit_price;
         $cartinfo = array();
         if(!empty($product_id) && !empty($size) && !empty($color)&& !empty($qty))
         {
    		 
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
            $color = Color::where('product_id','=',$product_id)->first();
            $size = Size::where('product_id','=',$product_id)->first();
              $cartinfo =[
                 'id'=>$product_id,
                 'name'=>$product->product_name,
                 'qty'=>1,
                 'price'=>$price,
                 'options'=>[
                   'color'=>$color->color,
                   'size'=>$size->size,
                   'image'=>$image->image,
                    'alias'=>$product->alias
                  ]
                ];
         }
    		 if(Cart::add($cartinfo))
    		 	{
    		 		return response()->json(['count'=>Cart::count(),'total'=>Cart::total(),'cartcontent'=>Cart::content()->toArray()]);
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
