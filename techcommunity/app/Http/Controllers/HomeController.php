<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newspost;
use App\User;



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
        //Check wat de rol is
        if((auth()->user()->role) == 'author'){

            //Haal alle posts van de desbetreffende user op
            $query =  (new Newspost)->newQuery();
            $query->where('created_by', '=', auth()->user()->id);
            $posts = $query->orderBy('created_at_date', 'desc')->get();

            //Plaats de posts in het dashboard
            return view('home')->with('posts', $posts);
        }

        //Anders return user dashboard
        elseif(((auth()->user()->role) == 'user')){
            return view('user');
        }

        //Anders return admin dashboard
        elseif(((auth()->user()->role) == 'admin')){
            //Haal alle users op en geef ze mee aan het dashboard
            $query =  (new User)->newQuery();
            $users = $query->orderBy('created_at', 'desc')->get();

            return view('admin')->with('users', $users);
        }
    }
}
