<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = ['user_id', 'dob', 'phone','address','institute','subject'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
