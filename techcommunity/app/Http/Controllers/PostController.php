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
        $posts =  Newspost::where('active', '1')->orderBy('created_at_date', 'desc')->paginate(5);

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

    if ($_FILES['uploadimage']['size'] > 0){
        $upload_image = 0;
        $image_errors = [];

        $imageName = basename($_FILES["uploadimage"]["name"]);
        $imageExtension = strtolower(pathinfo($imageName,PATHINFO_EXTENSION));
        $image_prefix = date("ynjHis");
        $imageDestination = "uploads/users/" . $image_prefix .$imageName;
     
        if (file_exists($imageDestination)) {
            array_push($image_errors, "This image already exist. Give it just another name");
            $upload_image = 0;
        };

        $extensions = ['jpg', 'jpeg', 'png', 'eps', 'gif'];

        foreach($extensions as $extension){
            if($extension == $imageExtension){
                $upload_image = 1;
            }
        }

        if($upload_image == 0){
            array_push($image_errors, "Your picture have a wrong extension. The only extensions which alowed are: jpg, jpeg, png, eps and gif.");
        }

        if($upload_image == 1){
            move_uploaded_file($_FILES["uploadimage"]["tmp_name"], $imageDestination);
            $imagepath = $imageDestination;
        } 

        else{
            $imagepath = "uploads/No-image.jpg";
        }
    }
    else{
         $imagepath ="uploads/No-image.jpg";
    }
           
      $table = new Newspost();
      $table->title = $request->get('title');
      $table->body_text = $request->get('body_text');
      $table->categorie = $request->get('category');
      $table->image = $imagepath;
      $table->created_at_date = date("Y-m-d H:i:s");
      $table->created_by = auth()->user()->id;
      $table->ip_created_at = $_SERVER['REMOTE_ADDR'];
      $table->active = 1;
      $table->save();
      
      return redirect('home');
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
        
        $post = Newspost::find($id);

        return view('pages.edit')->with('post', $post);
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

        $request->validate([
        'title'=>'required',
        'body_text' => 'required',
        'category' => 'required'
      ]);

        Newspost::where('id', $id)->update([
        'title' =>  $request->get('title'),
        'body_text' => $request->get('body_text'),
        'categorie' => $request->get('category'),
        ]);

         return redirect('home');
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


      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function statue(Request $request)
    {
        $request->validate([
        'id'=>'required',
        'state_post' => 'required'
        ]);

        $id = $request->get('id');

        $querycontrolle = Newspost::find($id);

        if($querycontrolle->created_by == auth()->user()->id){
            Newspost::where('id', $id)->update([
            'active' =>  $request->get('state_post')
            ]);
        }

        return redirect("home");

    }

}

