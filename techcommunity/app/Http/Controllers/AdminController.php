<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Newspost;

class AdminController extends Controller
{

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Zoek de desbetreffende user op en gooi hem weg
        $query = User::find($id);
        $query->delete();

        //Return de dashboard
         return redirect('home');
    }

    public function getposts()
    {
        //Haal alle posts van de desbetreffende user op
        $query =  (new Newspost)->newQuery();
        $query->where('created_by', '=', auth()->user()->id);
        $posts = $query->orderBy('created_at_date', 'desc')->get();

        //Plaats de posts in het dashboard
        return view('pages.allposts')->with('posts', $posts);
    }
}
