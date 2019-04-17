<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    
    public function index()
    {
        return view('user.password', $this->data);
    }


    public function update( Request $request )
    {   
        $inputData = $request->all();
        $user = Auth::user();

        if ( Hash::check( $inputData['old_password'], $user->password) ) {
            $user->password = Hash::make( $inputData['password'] );
            $user->save();

            flash('Password Updated Successfully')->success();
            return redirect()->back();
        } else {
            flash('Wrong Old Password')->warning();
            return redirect()->back();
        }

    }

}
