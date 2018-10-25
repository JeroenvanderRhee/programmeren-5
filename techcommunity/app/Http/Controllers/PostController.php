<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newspost;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =  Newspost::orderBy('created_at_date', 'desc')->paginate(5);

        foreach($posts as $post){
            if(strlen($post->body_text) >= 200){
                $post->body_text = substr_replace ($post->body_text , "..." , 200);
            }
        }

        return view("pages.news")->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("pages.create");
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
        'title'=>'required',
        'description_post'=> 'required',
        'long_text' => 'required'
      ]);

      $table = new Newspost();
      $table->title = $request->get('title');
      $table->description_post = $request->get('description_post');
      $table->long_text = $request->get('long_text');
      $table->uploaded_file = "https://disney-plaatjes.nl/files/disney/mickey-mouse/mickey-mouse-disney-829.jpg";
      $table->created_at_date = date("Y-m-d H:i:s");
      $table->created_by_user = "Jeroen";
      $table->ip_created_at = $_SERVER['REMOTE_ADDR'];
      $table->active = 1;
      $table->save();
    
       return "Saved";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Newspost::find($id);
        return view('pages.single_post')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $post = Newspost::find($id->id)
        // return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
