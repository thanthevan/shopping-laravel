<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CategoryPost;
use App\Post;
use Auth;
use App\ImagePost;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorypost = CategoryPost::all();
        $post =Post::paginate(3); 
        return view('admin.post.index',compact('categorypost','post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $categorypost = CategoryPost::all();

         return view('admin.post.handle',compact('categorypost'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        
        $title =  $request->title;
        $photo = $request->file;
        $cate_post_id= $request->category_post_id;
        $status = $request['radio-group'];
        $decribe = $request->post_content;
        $auther = Auth::guard('admin')->user()->name;
        $mk= $request->meta_keyword;
        $md= $request->meta_description;
        $created = date('Y/m/d');
        if(!empty($photo)){
         $name = sha1(date('YmdHis') . str_random(30));
         $save_name = $name . '.' . $photo->getClientOriginalExtension();
         $photo->move('public/uploads/post/', $save_name);    
         $img = $save_name; 


       $post = new Post;
       $post->title =  $title ;
       $post->img= $img;
       $post->auther =  $auther;

       $post->category_post = $cate_post_id;
       $post->decribe= $decribe;
       $post->meta_keyword=$mk;
       $post->meta_describe=$md;
       $post->status = $status;
       $post->created= $created;

       if($post->save()){
            

        

            return redirect()->back()->with(['notify' => 'success', 'mss' => "Thêm  thành công"]);
       }else{
        return redirect()->back()->with(['error' => 'success', 'mss' => "Thêm  thất bại"]);
       }
         }else{
        return redirect()->back()->with(['error' => 'success', 'mss' => "Thêm  thất bại"]);
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
          $post =  Post::find($id);

         $categorypost = CategoryPost::all();

         return view('admin.post.edit',compact('categorypost','post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          
        $title =  $request->title;
        $photo = $request->file;
        $cate_post_id= $request->category_post_id;
        $status = $request['radio-group'];
        $decribe = $request->post_content;
        $auther = Auth::guard('admin')->user()->name;
        $mk= $request->meta_keyword;
        $md= $request->meta_description;
        $created = date('Y/m/d');
        if(!empty($photo)){
         $name = sha1(date('YmdHis') . str_random(30));
         $save_name = $name . '.' . $photo->getClientOriginalExtension();
         $photo->move('public/uploads/post/', $save_name);    
         $img = $save_name; 


       $post = new Post;
       $post->title =  $title ;
       $post->img= $img;
       $post->auther =  $auther;

       $post->category_post = $cate_post_id;
       $post->decribe= $decribe;
       $post->meta_keyword=$mk;
       $post->meta_describe=$md;
       $post->status = $status;
       $post->created= $created;
       
       if($post->save()){
            

        

            return redirect()->back()->with(['notify' => 'success', 'mss' => "Thêm  thành công"]);
       }else{
        return redirect()->back()->with(['error' => 'success', 'mss' => "Thêm  thất bại"]);
       }
         }else{
        $post = new Post;
       $post->title =  $title ;
       $post->auther =  $auther;
       $post->category_post = $cate_post_id;
       $post->decribe= $decribe;
       $post->meta_keyword=$mk;
       $post->meta_describe=$md;
       $post->status = $status;
       $post->created= $created;
       
       if($post->save()){
            

        

            return redirect()->back()->with(['notify' => 'success', 'mss' => "Thêm  thành công"]);
       }else{
        return redirect()->back()->with(['error' => 'success', 'mss' => "Thêm  thất bại"]);
       }
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
        //
    }
}
 