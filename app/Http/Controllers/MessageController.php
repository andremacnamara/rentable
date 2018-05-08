<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Message;
use App\User;

class MessageController extends Controller
{
    public function index(){
        
        $messages = Message::where('sender_id', Auth::user()->id)->orWhere('recipient_id', Auth::user()->id)->get();

        return view('/pages/message/index', compact('messages'));
    }

    public function create($id){

        $user = User::where('id', $id)->first();
        return view('/pages/message/create', compact('user'));
    }

    public function store(Request $request){
        $message = Message::create([
            "sender_id" => Auth::id(),
            "sender_name" => Auth::user()->name,
            "recipient_id" => $request->recipient_id,
            "recipient_name" => $request->recipient_name,
            "title" => $request->title,
            "message" => $request->message
        ]);
        return "Message sent";
    }

    public function show($id){ 
        $message = Message::where('id', $id)->first();
        return view('/pages/message/show', compact('message'));
    }
}
