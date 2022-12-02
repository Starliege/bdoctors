<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Star;
use App\User;
use Illuminate\Http\Request;

class VoteController extends Controller
{

    protected $validationVote = [
        "id" => 'required|exists:users,id',
        "vote" => 'required',
        "user_id" => 'required',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $votes = Star::all();
        return response()->json($votes);
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
    public function store(Request $request)
    {
        // $request->validate($this->validationVote);
        // $data= $request->all();

        // $newVote = new Star();
        // $newVote->id = $data['id'];
        // $newVote->vote = $data['vote'];
        // $newVote->user_id = $data['user_id'];

        // $newVote->save();
        $data= $request->all();

        // dd($data);
        $params = $request->validate([
            'vote'=>'required',
            'user_id' => 'required|exists:users,id',
          ]);
        
        $user = User::where('id', $data['user_id'])->first();

        $user->stars()->attach($data['user_id'], ['user_id'=> $user->id, 'star_id'=>$data['vote'] ]);
        $user->save();
        return response()->json($user);
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
