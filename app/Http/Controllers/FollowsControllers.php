<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowsControllers extends Controller
{
  function store(User $user)
  {
    //user() method is in Guard.php defined and returns $user if logged in
    return auth()->user()->following()->toggle($user->profile);
  } 
}