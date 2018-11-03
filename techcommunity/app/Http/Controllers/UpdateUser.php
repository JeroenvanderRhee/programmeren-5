<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UpdateUser extends Controller
{
    public function edit()
    {	
        return view("pages.editprofile");
        // return view('pages.debug')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([
        'email'=>'required',
        'name' => 'required',
      ]);

        $id = auth()->user()->id;

        User::find($id)->update([
        'name' =>  $request->get('name'),
        'email' => $request->get('email'),
        ]);

         return redirect('logout');
    }
}
