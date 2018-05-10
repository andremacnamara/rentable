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

        $user = User::where('id',  Auth::user()->id)->first();
        return view('/pages/message/index', compact('user'));    
    }

    public function inbox(){
        
        $recievedMessages = Message::where('recipient_id', Auth::user()->id)->get();
        return view('/pages/message/inbox', compact('recievedMessages'));
    }

    public function sentbox(){

        $sentMessages = Message::where('sender_id', Auth::user()->id)->get();
        // dd($sentMessages);
        return view('/pages/message/sentbox', compact('sentMessages'));
    }

    public function create($id){

        $user = User::where('id', $id)->first();
        return view('/pages/message/create', compact('user'));
    }

    public function store(Request $request){
        $this->validate($request, [
            "recipient_name" => "required",
            "title" => "required",
            "message" => "required",
          ]);

        $message = Message::create([
            "sender_id" => Auth::id(),
            "sender_name" => Auth::user()->name,
            "recipient_id" => $request->recipient_id,
            "recipient_name" => $request->recipient_name,
            "title" => $request->title,
            "message" => $request->message
        ]);
        return redirect("/messages/sentbox");
    }

    public function show($id){ 
        $message = Message::where('id', $id)->first();
        return view('/pages/message/show', compact('message'));
    }
}
