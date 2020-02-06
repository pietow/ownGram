<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //disable mass assignment
    protected $guarded = [];
    
public function profileImage()
{
    //$this == $profile
    $imagePath = ($this->image) ? $this->image : 'profile/HABMHQvSK8t2oELiAWcUIluArNKCH6hZ1B1LxvWn.png';
   return '/storage/' . $imagePath;
}

//profile has many Users (=followers)
public function followers()
{
    return $this->belongsToMany(User::class);
}

    //fetch from User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}