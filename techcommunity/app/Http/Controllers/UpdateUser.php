<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UpdateUser extends Controller
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

    public function edit()
    {	
        //Return pagina waar je je profiel kan editten
        return view("pages.editprofile");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        //Controlleer verplichte velden
        $request->validate([
        'email'=>'required',
        'name' => 'required',
      ]);

        //Haal eigen ID op
        $id = auth()->user()->id;

        //Zoek eigen profiel en update
        User::find($id)->update([
        'name' =>  $request->get('name'),
        'email' => $request->get('email'),
        ]);

        //En log uit
         return redirect('logout');
    }
}
