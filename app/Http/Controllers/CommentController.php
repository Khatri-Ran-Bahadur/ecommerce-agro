<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'comment'=>'required',
        ]);
   
        $input = $request->all();
        $input['parent_id'] = ($request->parent_id) ? $request->parent_id : 0;
        Comment::create($input);
        $comments=Comment::orderBy('created_at','desc')->where('blog_id',$request->blog_id)->paginate(5);
        return view('frontend.blog.comments',['comments'=>$comments]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $Comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $Comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $Comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $Comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $Comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $Comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $Comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $Comment)
    {
        //
    }
}
