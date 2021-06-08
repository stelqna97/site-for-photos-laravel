<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\User;
use Auth;

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
        $comment=new Comment();
        $comment->title=$request->input('title');
        $comment->comment=$request->input('comment');
        $comment->user_id = $request->input('user_id');
        $comment->photo_id = $request->input('photo_id');
        $comment->created_at =new \DateTime();
        $comment->updated_at=new \DateTime();
         $comment->save();

         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment,$id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment,$id)
    {
        
        $comment= Comment::findOrFail($id);
        //$comment=Comment::where('photo_id',$id)->where('user_id',Auth::user()->id)->first();

        //$user=User::select('id')->where('id',$comment->user_id)->first();
        //$photoo=Photo::select('id')->where('id',$comment->photo_id)->first();
        $comment->title=$request->input('title');
        $comment->comment=$request->input('comment');
        $comment->user_id = $request->input('user_id');
        $comment->photo_id = $request->input('photo_id');
        $comment->updated_at=new \DateTime();
        $comment->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment,$id)
    {
        $comment= Comment::where('id',$id)->first();
        $comment->delete();

        return redirect()->back();
    }
}
