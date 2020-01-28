<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    //gives id of the user
    public function index($user)
    {
        //dd = die and dump
        //dd(User::find($user));
        $user = User::findOrFail($user);

        //pass data to the view
        return view('home', [
            'user' => $user,
        ]);
    }
}
