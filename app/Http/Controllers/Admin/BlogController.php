<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Blog;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->checkvalidation($request,null);
        $path = 'blog_img/no-thumbnail.jpeg';
        if($request->hasFile('thumbnail')){
           $extension = ".".$request->thumbnail->getClientOriginalExtension();
           $name = basename($request->thumbnail->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->thumbnail->move('blog_img', $name, 'public');
         }
         
       $product = Blog::create([
           'title'              => $request->title,
           'slug'               => $request->slug,
           'description'        => $request->description,
           'thumbnail'          => $path,
           'status'             => $request->status,
           'featured'           => ($request->featured) ? $request->featured : 0,
           'meta_description'   => $request->meta_description,
           'created_by'         => Auth::user()->name,
           'keyword'            => $request->keyword,
       ]);
       if($product){
            return redirect(route('admin.blog.index'))->with('message', 'Post Successfully Added');
       }else{
            return back()->with('message', 'Error Inserting Post');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.create',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkvalidation($request,$id){
        $blogId =isset($id) ? $id : null;
        $this->validate($request,[
            'title'             =>'required',
            'slug'              =>'required|min:2|unique:blogs,slug,'.$blogId.',id',
            'description'       =>'required',
            'meta_description'  =>'required|max:255',
            'keyword'           =>'required'
        ]);
    }
    public function update(Request $request, Blog $blog)
    {
        $this->checkvalidation($request,$blog->id);
        
        if($request->hasFile('thumbnail')){
            File::delete($blog->thumbnail);
           $extension = ".".$request->thumbnail->getClientOriginalExtension();
           $name = basename($request->thumbnail->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->thumbnail->move('blog_img', $name);
           $blog->thumbnail = $path;
         }
        $blog->title =$request->title;

        if($blog->slug!=$request->slug){
            $blog->slug=$request->slug;
        }

        $blog->description = $request->description;
        $blog->status = $request->status;
        $blog->featured = ($request->featured) ? $request->featured : 0;
        $blog->meta_description = $request->meta_description;
        $blog->keyword = $request->keyword;
        $blog->created_by= Auth::user()->name;

        
        if($blog->save()){
            return redirect(route('admin.blog.index'))->with('message', "Blog Successfully Updated!");
        }else{
            return back()->with('message', "Error Updating Blog");
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
        $blog = Blog::onlyTrashed()->findOrFail($id);
        if($blog->forceDelete()){
          File::delete($blog->thumbnail);
          return back()->with('message','Blog Successfully Deleted!');
        }else{
          return back()->with('message','Error Deleting Blog');
        }
    }

    public function trash()
    {
        $blogs = Blog::onlyTrashed()->paginate(5);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function recoverBlog($id)
    {
        $blog = Blog::onlyTrashed()->findOrFail($id);
        if($blog->restore())
            return back()->with('message','Blog Successfully Restored!');
        else
            return back()->with('message','Error Restoring Blog');
    }


    public function remove(Blog $blog)
    {
        if($blog->delete()){
            return back()->with('message','Blog Successfully Trashed!');
        }else{
            return back()->with('message','Error Deleting Blog');
        }
    }
}
