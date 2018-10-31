<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newspost;
use App\Comment;

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

        $posts->pagetitle = "Posts";
        return view("pages.news")->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        'body_text' => 'required',
        'category' => 'required'
      ]);

      $table = new Newspost();
      $table->title = $request->get('title');
      $table->body_text = $request->get('body_text');
      $table->categorie = $request->get('category');
      $table->created_at_date = date("Y-m-d H:i:s");
      $table->created_by = auth()->user()->id;
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

        $post->comment = Comment::where('post_id', $id)->orderBy('created_at_date', 'asc')->get();

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
        $query = Newspost::find($id);
        $query->delete();

         return redirect('home');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
      //   $request->validate([
      //   'search'=>'required',
      // ]);

        $searchterm = $request->get('search');
        $filters = array();
        array_push($filters, $request->get('cb1'),$request->get('cb2'),$request->get('cb3'),$request->get('cb4'));


        $query =  (new Newspost)->newQuery();

         $searchable = [
            'title',
            'body_text',
            'id'
        ];
                

        if($searchterm !=""){
             foreach($searchable as $collumn){
                 $query->orWhere($collumn, 'LIKE', '%' .$searchterm . '%');
             }
        }

         foreach($filters as $filter){
            if($filter != ""){
                $query->orWhere('categorie', '=', $filter);
            }
         }


        $posts = $query->orderBy('created_at_date', 'desc')->get();
         
        foreach($posts as $post){
            if(strlen($post->body_text) >= 200){
                $post->body_text = substr_replace ($post->body_text , "..." , 200);
            }
        }

        $posts->pagetitle = "Search results";
        return view("pages.news")->with('posts', $posts);

    }
}




    // $category = array();

        // $posts->category = $category;

             // foreach($searchable as $collumn){
         //     $query->where('price', '<=', $request->input('priceMax'));
         // }

         // print_r()

         // $query->where('categorie', '==', $request->input('category'));

         // $category = 0;
         //    if($request->input('cb1') !== ""){
         //        $category += 1;
               

         //    }
