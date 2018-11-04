<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post_Comment_Link;
use App\User;



class CommentController extends Controller
{
    

/**
     * Create a new controller instance.
     *
     * @return void
     */
    // Authorisation before showing pages
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Controlle op verplichte velden
        $request->validate([
        'comment'=>'required|string',
        'post_id'=>'required',
      ]);

      //Haal post id op
      $post_id = $request->get('post_id');

      //Create comment
      $table = new Comment();
      $table->comment_text = $request->get('comment');
      $table->created_at_date = date("Y-m-d H:i:s");
      $table->created_by_userid = auth()->user()->id;
      $table->username = auth()->user()->name;
      $table->ip_created_at = $_SERVER['REMOTE_ADDR'];
      $table->newspost_id = $post_id;
      $table->save();

      //Haal alle comments van de desbetreffende user op
      $howmuchcomments = Comment::where('created_by_userid', auth()->user()->id)->get();
      
      //Tel alle geplaatste comments
      if(count($howmuchcomments) == 5){
        $message="You can place posts. Please logout and login to place the new posts!";
        
        //Haal id op en update de desbetreffende user met de rol author
        $id = auth()->user()->id;
        User::where('id', $id)->update([
        'role' =>  'author',
        ]);

      }

       return redirect("posts/$post_id");
    }
}
