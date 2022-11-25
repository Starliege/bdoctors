<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\User;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $data = $request->all();
        // dd($data);
       $params = $request->validate([
         'name_sender'=>'required|min:3',
         'surname_sender'=>'required|min:3',
         'message_sender'=>'required|min:3',
         'mail_sender'=>'required|email',
         'user_id'=>'required|exists:users,id'
       ]); 
       $user = User::findOrFail($data['user_id']);
       $message = new Message();
       $message->name_sender = $data['name_sender'];
       $message->surname_sender = $data['surname_sender'];
       $message->mail_sender = $data['mail_sender'];
       $message->message_sender = $data['message_sender'];
       $message->user_id = $data['user_id'];

       $message->save();

       return redirect()->route('index', $user )->with('message-success', $user);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
