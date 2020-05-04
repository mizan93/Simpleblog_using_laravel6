<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Collection;
class Test extends Controller
{
    public function about()
    {
        return view('pages.about');
    }
    public function contactus()
    {
        return view('pages.contact');
    }
    public function writepost()
    {
        return view('post.writepost');
    }
    public function addcategory()
    {
        return view('post.addcategory');
    }
    public function storecategory(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:category|max:55|min:4',
            'slug' => 'required|unique:category|max:100|min:7',
        ]);
        $data=array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category=DB::table('category')->insert($data);
        //return response()->json($data);
       // echo '<pre>';
        // print_r($data);
        if ($category) {
            $notification=array(
                'message'=>'Category inserted Successfully.',
                'alert-type'=>'success'
            );
            return Redirect()->route('categorylist')->with($notification);
        } else {
            $notification = array(
                'message' => 'Category  not inserted.',
                'alert-type' => 'error'
            );
            return Redirect()->route('categorylist')->with($notification);
        }
        
    }
    public function CategoryList(){
       $category=DB::table('category')->get();
       return view('post.categorylist',compact('category'));
    }
    public function viewCategory($id){
      $category=DB::table('category')->where('id',$id)->first();
      //return response()->json($category);
      return view('post.categoryview')->with('catid',$category);
    }
    public function deleteCategory($id){
        $category=DB::table('category')->where('id',$id)->delete();
        if ($category) {
            $notification = array(
                'message' => 'Category Deleted Successfully.',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Category  not Deleted.',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function EditCategory($id){
        $category = DB::table('category')->where('id', $id)->first();

        return view('post.editcategory',compact('category'));
    }
    public function updateCategory(Request $request,$id){
        $validatedData = $request->validate([
            'name' => 'required|max:55|min:4',
            'slug' => 'required|max:100|min:7',
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $category = DB::table('category')->where('id',$id)->update($data);
        //return response()->json($data);
        // echo '<pre>';
        // print_r($data);
        if ($category) {
            $notification = array(
                'message' => 'Category Updated Successfully.',
                'alert-type' => 'success'
            );
            return Redirect()->route('categorylist')->with($notification);
        } else {
            $notification = array(
                'message' => 'Category  not Updated.',
                'alert-type' => 'error'
            );
            return Redirect()->route('categorylist')->with($notification);
        }
    }
}
