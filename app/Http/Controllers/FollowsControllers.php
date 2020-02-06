<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowsControllers extends Controller
{
  function store(User $user)
  {
    return $user->username;
  } 
}