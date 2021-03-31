<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageValidateRequest;
use Illuminate\Http\Request;
use App\Messages;
class MessageController extends Controller
{
    //get all messages controller
   public function getMessages(){
      return response()->json(Messages::all(),200);
   }
  //Filtering messages to the user's email
    public function getMessagesToEmail($email)
    {
        $messages = Messages::where('email',$email)->first();
        if(is_null($messages))
        {
            return response()->json
            (['message' => 'Messages not found to the given email']);
        }
        return response()->json($messages::where('email',$email)->first(), 200);
    }

    // add employee
    public function addMessage(MessageValidateRequest $request){
      /*$message = Messages::create($request->all());
      return  response($message, 201);*/
        $message = new Messages;
        $message->name=$request->name;
        $message->email = $request->email;
        $message->contact=$request->contact;
        $message->message = $request->message;
        $messageSave= $message->save();
        if($messageSave)
        {
            return ["Result"=>"Message has been sent"];
        }
        else{
            return["message"=>"Failed!!"];
        }
    }

    public function updateMessage($id){

    }
}
