<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
    public function getContacts(){
//        $contacts = User::all();
        $contacts = User::where('id', '!=', Auth::id())->get();

        return response()->json($contacts);
    }

    public function getMessagesFor($id){
        $messages = Message::where('from', $id)->orWhere('to', $id)->get();

        return response()->json($messages);
    }
}
