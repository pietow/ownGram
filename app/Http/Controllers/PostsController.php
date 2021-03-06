<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Post;

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

  public function index()
  {
    $users = auth()->user()->following()->pluck('profiles.user_id');
    //$posts = Post::whereIn('user_id', [1,2,3])->orderBy('created_at', 'DESC')->get();
    //$posts = Post::whereIn('user_id', [1,2,3])->latest()->get();
    //$posts = Post::whereIn('user_id', [1,2,3])->latest()->paginate(2);
    //with('user') solves the (n+1)-Problem when looping over posts in posts.index
    $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(2);

    return view('posts.index', compact('posts'));
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


  public function store()
  {
    //$data = request()->validate(array('caption' => 'required','image' => 'required',));
    $data = request()->validate([
      'caption' => 'required',
      'image'   => ['required', 'mimes:jpeg,png,bmp,tiff'],
    ]);
    //like in tinker:
   // $post = new \App\Post();
   // $post->caption = $data['caption'];
   // $post->save();

   //shorter \App\Post::create($data); throws an Integrity constraint violation error, because id is not passed

    $imagePath = request('image')->store('uploads', 'public'); //store(PATH, driver: e.g. s3); s3 for amazon storage
  //laravel creates in storage/app/public a uploads directory with the image file

  // but storage/app/public is not accessable -->  storage:link = Create a symbolic link from "public/storage" to "storage/app/public"

  $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);  //fit(width, height)
  $image->save();

   //grap the authenticated user then go into their posts and create, laravel graps the user id automatically
   //auth()->user()->posts()->create($data);
   auth()->user()->posts()->create([
     'caption' => $data['caption'],
     'image'   => $imagePath,
   ]);

  return redirect('/profile/' . auth()->user()->id);  
    
    //retrieve all of the input data as an array using the all method
    //dd(request()->all());

   // dd(request()->input("caption"));
   // dd(request()->file('image'));
  }

  //by declaring $post with \App\Post laravel is fetching the entire post
  public function show(\App\Post $post)
  {
    //post will become our variable in show.blade.php
     //return view('posts.show',['post' => $post,]);

     //exact same thing
     return view('posts.show', compact('post'));
  }

  
}