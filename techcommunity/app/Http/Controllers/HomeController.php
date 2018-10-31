<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newspost;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if((auth()->user()->role) == 'author'){

            $query =  (new Newspost)->newQuery();

            $query->where('created_by', '=', auth()->user()->id);

            $posts = $query->orderBy('created_at_date', 'desc')->get();


            return view('home')->with('posts', $posts);
        }
        elseif(((auth()->user()->role) == 'user')){
            return view('user');
        }
    }
}
