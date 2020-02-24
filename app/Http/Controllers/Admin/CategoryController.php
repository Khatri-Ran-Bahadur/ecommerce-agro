<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $categories=Category::paginate(5);
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
        'title'=>'required|min:5',
        'description'=>'required',
        'slug'=>'required|min:5|unique:categories'
        ]); 
        $categories = Category::create($request->only('title','description','slug'));
        $categories->parents()->attach($request->parent_id,['created_at'=>now(), 'updated_at'=>now()]);
        return back()->with('message','Successfully Added');
       
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
    public function edit($id)
    {
        $category=Category::find($id);
        $categories = Category::where('id','!=', $category->id)->get();
        return view('admin.categories.create',compact('categories','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'title'=>'required|min:5',
            'description'=>'required',
            'slug'=>'required|min:5|unique:categories,slug,'.$category->id.',id'
        ]);
        
        $category->title = $request->title;
        $category->description = $request->description;
       
        if($category->slug!=$request->slug){
            $category->slug = $request->slug;
        }
        //detach all parent categories
        $category->parents()->detach();
        //attach selected parent categories
        $category->parents()->attach($request->parent_id);
        //save current record into database
        $saved = $category->save();
        //return back to the /add/edit form
        if($saved){
             return back()->with('message','Record Successfully Updated!');
        }else{
            dd('message');
            return back()->with('message', 'Error Updating Category');
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

        $category = Category::onlyTrashed()->findOrFail($id);

        if($category->childrens()->detach() && $category->forceDelete()){
            return back()->with('message','Category Successfully Deleted!');
        }else{
            return back()->with('message','Error Deleting Record');
        }
    }

     public function recoverCat($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        if($category->restore())
            return back()->with('message','Category Successfully Restored!');
        else
            return back()->with('message','Error Restoring Category');
    }

    public function fetchCategories($id = 0){

        if($id == 0)
            return Category::all();

      $category =  Category::where('id', $id)->first();
      return $category->childrens;
    }

    public function remove(Category $category)
    {
        if($category->delete()){
            return back()->with('message','Category Successfully Trashed!');
        }else{
            return back()->with('message','Error Deleting Record');
        }
    }

    public function trash()
    {
        $categories = Category::onlyTrashed()->paginate(5);
        return view('admin.categories.index', compact('categories'));
    }
}
