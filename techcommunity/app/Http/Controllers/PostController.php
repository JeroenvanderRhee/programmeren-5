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
        $posts =  Newspost::all();
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
        'post_Title'=>'required',
        'post_Body'=> 'required',
        'post_Description' => 'required'
      ]);

      $table = new Newspost([
        'title' => $request->get('share_name'),
        'description_post'=> $request->get('share_price'),
        'long_text'=> $request->get('share_qty'),
        'uploaded_file'=> "https://disney-plaatjes.nl/files/disney/mickey-mouse/mickey-mouse-disney-829.jpg",
        'created_at_date'=> date("Y-m-d h:i:sa"),
        'created_by_user'=> "Jeroen",
        'ip_created_at'=> $_SERVER['REMOTE_ADDR'],
        'active'=> 1
      ]);
      $table->save();
      
      $posts =  Newspost::all();
        return view("pages.news")->with('posts', $posts);
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
