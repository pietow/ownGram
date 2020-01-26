<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //fetch from User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
