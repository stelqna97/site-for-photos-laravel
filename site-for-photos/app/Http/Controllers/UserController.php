<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photo;
use App\Models\Role;
use Auth;

class UserController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::withCount('photo')->orderBy('photo_count', 'desc')->paginate();
        $users_adm=User::orderBy('created_at','DESC')->paginate(10);


         return view('user.index',compact('users'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user=User::where('id',Auth::user()->id)->first();
        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,$id)
    {
        $user=User::where('id',$id)->first();
        $roles=Role::all();
        return view('user.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user,$id)
    {
        $user= User::where('id',$id)->first();
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->role_id=$request->input('roles');
        $user->updated_at=new \DateTime();
   

         $user->save();
        return view('user.show',compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $use0r,$id)
    {
        $user= User::where('id',$id)->first();
        $user->delete();

        return redirect('/users');
    }

    public function user_photos(User $user,$id)
    {
        $photos= Photo::where('user_id',$id)->get();
        $user=User::where('id',$id)->first();

        return view('user.photos',compact('photos','user'));
    }
}
