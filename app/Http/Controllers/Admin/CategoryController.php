<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $category=Category::all();
        return view('admin.category.product.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo " create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->category_name;
        $alias =vn_to_str($name);
        $parent_id =  $request->parent_id;

       $category = new Category;
       $category->name =  $name ;
       $category->alias = $alias;
       $category->parent_id= $parent_id ;
       if($category->save())
       {
        return redirect()->back()->with(['notify'=>'success','mss'=>"Thêm thành công"]);
       }else
       {
         return redirect()->back()->with(['error'=>'success','mss'=>"Thêm thất bại"]);
       }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $choice='';
        $name=Category::where('id','=',$id)->first()->name;
        $root = Category::where('parent_id','=',0)->get();
        foreach (  $root  as $r) {
           if($id==$r->id)
           {
             return response()->json(['name'=> $r->name,'choice'=> 'ROOT']);
           }else
           {
               return response()->json(['name'=> $name,'choice'=>  $root]);
           }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $category = Category::find($id);
        $category->name=$request->category_name;
        $category->alias=$alias =vn_to_str($request->category_name);
        $category->parent_id=$request->parent_id;
        if( $category->save())
        {
           return redirect( route('category.index',['notify'=>'success','mss'=>"Cập nhật thành công"]));
        }else{
           return redirect( route('category.index',['notify'=>'error','mss'=>"Cập nhật thất bại"])); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category->parent_id==0)
        {   $i=0;
            foreach (Category::all() as $ct) {
               if( $ct->parent_id==$category->id)
               {
                 $i+=1;
               }
            }
            if($i>0)
            {
                return redirect()->back()->with(['notify'=>'error','mss'=>"Không thể xóa danh mục chứa danh mục khác !"]);  
            }else
            {
                 if( $category->delete()){
                                return redirect()->back()->with(['notify'=>'success','mss'=>"Xóa thành công"]);
                    }else{
                                return redirect()->back()->with(['error'=>'success','mss'=>"Xóa thất bại"]);
                        }

            }
        }else{

         if(Product::where('category_id','=',$id)->get()->isEmpty())
        {    $category->delete();
              return redirect()->back()->with(['notify'=>'success','mss'=>"Xóa thành công"]);
        }else
        {
             return redirect()->back()->with(['notify'=>'error','mss'=>"Không thể xóa danh mục chứa sản phẩm !"]); 
        }   
      }
        
    }
}
