<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //disable mass assignment
    protected $guarded = [];
    //fetch from User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
