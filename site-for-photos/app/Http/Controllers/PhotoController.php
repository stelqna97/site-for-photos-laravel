<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Auth;


class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos=Photo::orderBy('created_at','DESC')->paginate(10);;
        return view('photo.index',compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user= Auth::user()->id;
        $photos=Photo::where('user_id',$user)->count();
        return view('photo.create',compact('photos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo=new Photo();
        $photo->title=$request->input('title');
        $photo->description=$request->input('description');
        $photo->user_id = Auth::user()->id;
        $photo->created_at =new \DateTime();
        $photo->updated_at=new \DateTime();
   
        $image=$request->file('image');
         $image_name=date('dmy_H_s_i');
         $ext=strtolower($image->getClientOriginalExtension());
         $image_full_name=$image_name.".".$ext;
         $upload_path='public/image/';
         $image_url=$upload_path.$image_full_name;
         $success=$image->move($upload_path,$image_full_name);
         $photo->image=$image_url;
         $photo->save();
        return redirect('/')->with('message','Your photo has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo,$id)
    {
        $photo=Photo::where('id',$id)->first();
        return view('photo.show',compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo,$id)
    {
        $photo=Photo::where('id',$id)->first();
        return view('photo.edit',compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo,$id)
    {
        $photo= Photo::where('id',$id)->first();
        $photo->title=$request->input('title');
        $photo->description=$request->input('description');
        $photo->user_id = Auth::user()->id;
        $photo->updated_at=new \DateTime();
   
        $image=$request->file('image');
        if($request->hasFile('image')){
         $image_name=date('dmy_H_s_i');
         $ext=strtolower($image->getClientOriginalExtension());
         $image_full_name=$image_name.".".$ext;
         $upload_path='public/image/';
         $image_url=$upload_path.$image_full_name;
         $success=$image->move($upload_path,$image_full_name);
         $photo->image=$image_url;
        }

         $photo->save();
        return view('photo.show',compact('photo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo,$id)
    {
        $photo= Photo::where('id',$id)->first();
        $photo->delete();

        return redirect('/photos');
    }
}
