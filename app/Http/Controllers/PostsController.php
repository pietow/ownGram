<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PostsController extends Controller
{
/**
 * Class constructor.
 */
public function __construct()
{
  //protects create and post route
  $this->middleware('auth');
}


  public function create()
  {
    return view('posts.create'); //directory posts --> file create.blade.php
  }

//  public function store(Request $request)
//    {
//        $name = $request->all();
//        dd($name);
//        //
//    }


  public function store(Request $request)
  {

    

    //$data = request()->validate(array('caption' => 'required','image' => 'required',));

    $data = request()->validate([
      'caption' => 'required',
      'image' => 'required', 'image',
    ]);
    
    //like in tinker:
   // $post = new \App\Post();
   // $post->caption = $data['caption'];
   // $post->save();

   //shorter \App\Post::create($data); throws an Integrity constraint violation error, because id is not passed

   //grap the authenticated user then go into their posts and create, laravel graps the user id automatically
   auth()->user()->posts()->create($data);


    
    //retrieve all of the input data as an array using the all method
    dd(request()->all());

   // dd(request()->input("caption"));
   // dd(request()->file('image'));
  }
}