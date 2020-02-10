<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;


class ProfilesController extends Controller
{
    //gives id of the user
    public function index(User $user)
    {
        //checks if user is authenticated and if that user is following the profile(of same or different user)
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember(   //cache to remember
            'count.posts' . $user->id, //Key
            now()->addSeconds(30), //store it for 30 seconds
            function () use($user) { //if the 30s are over this function will be executed
                return $user->posts->count();
        });
        $followersCount = Cache::remember(
            'count.followers' . $user->id, 
            now()->addSeconds(30), 
            function () use($user) {
                return $user->profile->followers->count();
        });
        $followingCount = Cache::remember(
            'count.following' . $user->id,
            now()->addSeconds(30), 
            function () use($user) {
                return $user->following->count();
        });
        //dd = die and dump
        //dd(User::find($user));
        //$user = User::findOrFail($user);

        //pass data to the view
        //directory view ---> profiles ---> index.blade.php
        //return view('profiles.index', ['user' => $user,]);
        return view('profiles.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
    }

    public function edit(User $user)
    {
        //this edit view is now protected
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

   public function update(User $user)
   {
       $this->authorize('update', $user->profile);
       $data = request()->validate([
           'title' => 'required',
           'description' => 'required',
           'url' => 'url',
           'image' => '',
       ]);


   if (request('image')){

    $imagePath = request('image')->store('profile', 'public');

    $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);  //fit(width, height)
    $image->save();

    $imageArray =   ['image' => $imagePath ?? ' '];
   }
   //array_merge: merges two arrays and replaces former key value pairs (e.g. 'image' => '' becomes 'image'=>$imagePath)
   auth()->user()->profile->update(array_merge(
       $data,
       $imageArray ?? []        
    ));

   return redirect('profile/' . $user->id);
   } 
 // public function test(User $user)
 // {
 //     //return view('profiles.bla', ['user'=> $user]);
 //     return view('profiles.test', compact('user'));
 // }

}