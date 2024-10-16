<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Services\MessageServices;

class MessageUserController extends Controller
{
    public $message_service;

    public function __construct(MessageServices $message_service)
    {
        $this->message_service = $message_service;
    }
    public function send($id){

        $recipient = User::findOrFail($id);
        $sender = auth()->user();
        
        $messages = Message::where('sender_id' , $sender->id)->orWhere('recipient_id' , $sender->id)->get();
        $mymessages = Message::where(function($query) use ($sender, $id) {
            $query->where('sender_id', $sender->id)
                  ->where('recipient_id', $id);
        })
        ->orWhere(function($query) use ($sender, $id) {
            $query->where('sender_id', $id)
                  ->where('recipient_id', $sender->id);
        })
        ->orderBy('created_at', 'asc')->get();
        return view('front_office.messages.mymessages' ,compact('messages' , 'sender' , 'recipient' , 'mymessages'));
    }


    public function store(Request $request){

        $request->validate([
            'recipient_id'   => 'required',
            'message'               => 'required',
        ]);
        
        $sender = auth()->user();
        // $messages = Message::where('recipient_id' , $request->recipient_id )->where('sender_id' , auth('sanctum')->user()->id)->get();
        // $id = $request->recipient_id;
        // $messages = Message::where(function($query) use ($sender, $id) {
        //     $query->where('sender_id', $sender->id)
        //           ->where('recipient_id', $id);
        // })
        // ->orWhere(function($query) use ($sender, $id) {
        //     $query->where('sender_id', $id)
        //           ->where('recipient_id', $sender->id);
        // })
        // ->orderBy('created_at', 'desc')->get();
        // $messages = Message::where('recipient_id' , $request->recipient_id )->where('sender_id' , $request->sender_id)->get();
        // dd($sender_id);
        $data = $request->all();
        $data['sender_id'] = $sender->id;
        // dd($data);   
        $id = $request->recipient_id;
        $conversation = Conversation::where(function($query) use ($sender, $id) {
                $query->where('sender_id', $sender->id)
                      ->where('recipient_id', $id);
            })
            ->orWhere(function($query) use ($sender, $id) {
                $query->where('sender_id', $id)
                      ->where('recipient_id', $sender->id);
            });
        // $data['sender_id'] = $sender_id;
        $is_create = $this->message_service->store($data);
        if($is_create != null){
            if(!$conversation){
                Conversation::create([
                    'sender_id'           =>  $request->sender_id,
                    'recipient_id'   => $request->recipient_id ,
                ]);
            }
            return redirect()->back();
        }
        return redirect()->back();

    }
}
