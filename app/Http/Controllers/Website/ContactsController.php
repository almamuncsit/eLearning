<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactsMail;
use App\Mail\OrderShipped;

class ContactsController extends Controller
{

    public function contact()
    {
        $info = [
            'name' => 'Mamun',
            'msg' => 'welcome to dhaka'
        ];

        Mail::to('admin@gmail.com')->send( new ContactsMail( $info ) );
        Mail::to('admin@gmail.com')->send( new OrderShipped() );
    }

}
