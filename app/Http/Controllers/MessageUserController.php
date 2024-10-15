<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MessageUserController extends Controller
{
    public function send($id){

        $user = User::findOrFail($id);
        $sender = auth()->user();

        return view('front_office.messages.mymessages');
    }
}
