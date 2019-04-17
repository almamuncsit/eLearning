<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profile = $user->profile()->firstOrCreate( [ 'user_id' => $user->id] );

        $this->data['user'] = $user;
        $this->data['user']->dob = $user->profile->dob;

        return view('user.profile', $this->data);
    }


    public function update( Request $request )
    {
        
        return $request->all();
    }
}
