<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    //gives id of the user
    public function index(User $user)
    {
        //dd = die and dump
        //dd(User::find($user));
        //$user = User::findOrFail($user);

        //pass data to the view
        //directory view ---> profiles ---> index.blade.php
        //return view('profiles.index', ['user' => $user,]);
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

   public function update(User $user)
   {
       $data = request()->validate([
           'title' => 'required',
           'description' => 'required',
           'url' => 'url',
           'image' => '',
       ]);

    $user->profile->update($data);
    return redirect('profile/' . $user->id);
       
   } 
 // public function test(User $user)
 // {
 //     //return view('profiles.bla', ['user'=> $user]);
 //     return view('profiles.test', compact('user'));
 // }

}