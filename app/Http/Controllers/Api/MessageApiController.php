<?php

namespace App\Http\Controllers\Api;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Services\MessageServices;
use App\Http\Controllers\Controller;

class MessageApiController extends Controller
{
    
    public $message_service;

    public function __construct(MessageServices $message_service)
    {
        $this->message_service = $message_service;
    }
    public function store(Request $request){

        $request->validate([
            'sender_id'           => 'required',
            'recipient_id'   => 'required',
            'message'               => 'required',
        ]);
        $messages = Message::where('recipient_id' , $request->recipient_id )->where('sender_id' , $request->sender_id)->get();

        $data = $request->all();
        $is_create = $this->message_service->store($data);
        if($is_create != null){
            if($messages->count() == 0){
                Conversation::create([
                    'sender_id'           => $request->sender_id,
                    'recipient_id'   => $request->recipient_id ,
                ]);
            }
            return response()->apiSuccess($is_create);
        }
        return response()->apiFail();

    }

    public function myMessage($recipient_id ){
        
        $sender_id = auth()->user()->id;        
        $messages = Message::where('recipient_id' , $recipient_id )->where('sender_id' , $sender_id)->get();

        if($messages->count() != 0){
            $data['items'] = $messages->all();
            return response()->apiSuccess($data);
        }else{
            return response()->apiFail();
        }
    }
    public function conversation(){
        $user = auth()->user()->id;   
        $conversation = Conversation::where('recipient_id' , $user )->orWhere('sender_id' , $user)->get();
        if($conversation->count() != 0){
            $data['items'] = $conversation->all();
            $data['auth_user_id'] = $user;
            return response()->apiSuccess($data);
        }else{
            return response()->apiFail();
        }

    }
}
