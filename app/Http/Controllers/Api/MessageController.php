<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    protected $validationMes = [
        "name_sender" => 'required|string|min:3',
        "surname_sender" => 'required|string|min:3',
        "mail_sender" => 'required|email',
        "message_sender" => 'required|min:3',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();
        return response()->json($messages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationMes);
        $data= $request->all();

        $newMessage = new Message();
        $newMessage->name_sender = $data['name_sender'];
        $newMessage->surname_sender = $data['surname_sender'];
        $newMessage->mail_sender = $data['mail_sender'];
        $newMessage->message_sender = $data['message_sender'];
        $newMessage->user_id = $data['user_id'];

        $newMessage->save();
        return response()->json($newMessage);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
