<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        /*$messages=Message::all();
        return view('messages.index',[
            'messages'=>$messages
        ]);*/
    }
    public function sendForm($id)
    {
        $user=User::findOrFail($id);
        return view('users.sendmessage',[
            'user'=>$user
        ]);
    }
    public function send($id,Request $request)
    {
        $request->validate([
            'content'=>'required|string',
        ]);
        Message::create([
            'content'=>$request->content,
            'user_id'=>$id
        ]);
        return redirect(url("users/$id"));
    }
    public function replyForm($id)
    {
        $message=Message::findOrFail($id);
        if (Auth::user()->id==$message->user_id&&!$message->show) {
            return view('messages.reply', [
            'message'=>$message
        ]);
        }
        else
            return redirect(url('/me'));
    }
    public function reply($id,Request$request)
    {
        $message=Message::findOrFail($id);
        if (Auth::user()->id==$message->user_id&&!$message->show) {
            $request->validate([
                'reply'=>'required|string|max:255'
            ]);
            $message->update([
                'reply'=>$request->reply,
                'show'=>true
            ]);
            return redirect(url('/me'));
        }
        else
            return redirect(url('/me'));
    }
}
