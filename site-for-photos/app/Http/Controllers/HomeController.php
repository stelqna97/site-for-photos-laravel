<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users=User::latest()->take(5)->get();
        $photos=Photo::latest()->take(5)->get();
        $photos_10=Photo::latest()->take(10)->get();
        return view('home',compact('users','photos','photos_10'));
    }
}
