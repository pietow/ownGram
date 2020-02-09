<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowsControllers extends Controller
{

  /**
   * Class constructor. This constructor with its midddel ware changes 500 Error to unauthorized Error
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  function store(User $user)
  {
    //user() method is in Guard.php defined and returns $user if logged in
    //without the middelware, auth()->user() would be null and get an internal server error
    return auth()->user()->following()->toggle($user->profile);
  } 
}