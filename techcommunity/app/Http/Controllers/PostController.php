<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newspost;
use App\Comment;


class PostController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    // Authorisation before showing pages
     function __construct()
    {
        $this->middleware('auth')->except('index', 'show', 'search');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     function index()
    {   
        //Haal de 5 nieuwste posts op
        $posts =  Newspost::where('active', '1')->orderBy('created_at_date', 'desc')->paginate(5);

        //Zorg ervoor dat alle posts max 200 tekens als intro hebben
        foreach($posts as $post){
            if(strlen($post->body_text) >= 200){
                $post->body_text = substr_replace ($post->body_text , "..." , 200);
            }
        }

        //De pagina titel is Posts
        $posts->pagetitle = "Posts";

        //Geef de pagina met posts terug
        return view("pages.news")->with('posts', $posts);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     function create()
    {   
        //Show create page
         return view("pages.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     function store(Request $request)
    {
        //valideer de velden
        $request->validate([
        'title'=>'required|string',
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
           
        //Create a new post
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

            
      //redirect naar het dashboard
      return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    function show($id)
    {
        //Haal de desbestreffende post op met de comments
        $post = Newspost::where('id', $id)->with('comments')->get();

        //Return de singlepost pagina met comments
        return view('pages.single_post')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     function edit($id)
    {
        //Zoek de desbetreffende post op
        $post = Newspost::findOrFail($id);

        //Return de edit pagina met ingevulde waardes 
        return view('pages.edit')->with('post', $post);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     function update(Request $request, $id)
    {
        //Valideer de velden
        $request->validate([
        'title'=>'required|string',
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


        //Update het bericht waar er een aanvraag voor binnen kwam
        Newspost::findOrFail($id)->update([
        'title' =>  $request->get('title'),
        'body_text' => $request->get('body_text'),
         'image' => $imagepath,
        'categorie' => $request->get('category'),
        ]);

        //Return de dashboard
         return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     function destroy($id)
    {
        //Zoek de desbetreffende nieuwsitem op en gooi hem weg
        $query = Newspost::findOrFail($id);
        $query->delete();

        //Return de dashboard
         return redirect('home');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     function search(Request $request)
    {

        //Haal de zoekterm op
        $searchterm = $request->get('search');
        
        //Haal de filters op
        $filters = array();
        array_push($filters, $request->get('cb1'),$request->get('cb2'),$request->get('cb3'),$request->get('cb4'));

        //Maak een nieuwe query
        $query =  (new Newspost)->newQuery();

        //Zoek op deze kollomen
         $searchable = [
            'title',
            'body_text',
            'id'
        ];
                
        //Als het zoekveld niet leeg is ga dan door de kollommen heen loopen
        if($searchterm !=""){
             foreach($searchable as $collumn){
                 $query->orWhere($collumn, 'LIKE', '%' .$searchterm . '%');
             }
        }

        //Als de filter niet leeg is ga dan door de categorienn heen loopen
         foreach($filters as $filter){
            if($filter != ""){
                $query->orWhere('categorie', '=', $filter);
            }
         }

         //Sorteer de posts op wanneer geplaatst en haal de query op
        $posts = $query->orderBy('created_at_date', 'desc')->get();
         
         //Verkort weer de intro text
        foreach($posts as $post){
            if(strlen($post->body_text) >= 200){
                $post->body_text = substr_replace ($post->body_text , "..." , 200);
            }
        }

        //De pagina titel word zoekresultaten
        $posts->pagetitle = "Search results";

        //haal de nieuwspagina op met de posts
        return view("pages.news")->with('posts', $posts);

    }


      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     function statue(Request $request)
    {
        //Controlleer of alle velden aanwezig zijn
        $request->validate([
        'id'=>'required',
        'state_post' => 'required',
        ]);

        //Haal de post id op
        $id = $request->get('id');

        //Zoek de post op
        $querycontrolle = Newspost::findOrFail($id);

        //Als de post gemaakt is door de desbetreffende user haal switch hem dan naar actief of niet actief
        if($querycontrolle->created_by == auth()->user()->id){
            Newspost::where('id', $id)->update([
            'active' =>  $request->get('state_post')
            ]);
        }

        //Laat het dashboard weer zien.
        return redirect("home");

    }

}

