<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    

    public function index()
    {
        $this->data['users'] = User::orderBy('id', 'desc')->get();

        return view('admin.users.users', $this->data);
    }


    public function show($id)
    {
        $this->data['user'] = User::find($id);

        return view('admin.users.show', $this->data);
    }

}
