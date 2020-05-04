<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    public function writepost()
    {
        $category=DB::table('category')->get();
        return view('post.writepost',compact('category'));
    }
    public function storePost(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'details' => 'required',
            'image' => 'required | mimes:jpeg,jpg,png,PNG | max:1000',

        ]);
        $data=array();
        $data['title']=$request->title;
        $data['category_id']=$request->category_id;
        $data['details']=$request->details;
        $image=$request->file(['image']);
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/frontend/postImage/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['image'] = $image_url;
            DB::table('posts')->insert($data);
            $notification = array(
                'message' => 'Post inserted Successfully.',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
           DB::table('posts')->insert($data);
            $notification = array(
                'message' => 'Post inserted Successfully.',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
        
    }
    public function postList(){
       $post = DB::table('posts')->join('category','posts.category_id','category.id')->select('posts.*', 'category.name')->get();
        // return response()->json();
        return view('post.postlist', compact('post'));

    }
    public function viewPost($id){
        $post = DB::table('posts')->join('category', 'posts.category_id', 'category.id')->select('posts.*', 'category.name')->where('posts.id',$id)->first();
        return view('post.viewpost', compact('post'));
    }
    public function editPost($id){
        $category=DB::table('category')->get();
        $post=DB::table('posts')->where('id',$id)->first();
        return view('post.editpost',compact('post','category'));
    }
    public function updatePost(Request $request,$id){
        $validatedData = $request->validate([
            'title' => 'required|max:200',
            'details' => 'required',
            'image' => ' mimes:jpeg,jpg,png,PNG | max:1000',
        ]);
        $data = array();
        $data['title'] = $request->title;
        $data['category_id'] = $request->category_id;
        $data['details'] = $request->details;
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'. $ext;
            $upload_path = 'public/frontend/postimage/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['image'] = $image_url;
            unlink($request->oldphoto);
            DB::table('posts')->where('id',$id)->update($data);
            $notification = array(
                'message' => ' Post Updated Successfully.',
                'alert-type' => 'success'
            );
            return Redirect()->route('allpost')->with($notification);
        } else {
            $data['image'] = $request->oldphoto;
            DB::table('posts')->where('id',$id)->update($data);
            $notification = array(
                'message' => ' Post Updated Successfully.',
                'alert-type' => 'success'
            );
            return Redirect()->route('allpost')->with($notification);
        }
    }
    public function deletePost($id){
        $post=DB::table('posts')->where('id',$id)->first();
        $image=$post->image;
        //return response()->json($image);
        $delete=DB::table('posts')->where('id',$id)->delete();
        if ($delete) {
           unlink($image);
            $notification = array(
                'message' => ' Post Deleted Successfully.',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);

        } else {
            $notification = array(
                'message' => ' Post not Deleted.',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);

        }
        
    }
    public function index(){
        $post=DB::table('posts')
        ->join('category','posts.category_id','category.id')
        ->select('posts.*','category.name','category.slug')
        ->paginate(1);
        return view('pages.index',compact('post'));
    }
}
