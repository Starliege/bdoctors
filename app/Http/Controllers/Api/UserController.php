<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result= User::orderBy('created_at', 'desc')->with('specializations', 'stars','sponsorships','reviews')->get();
        // $stars = $doctor->stars()->orderBy('created_at', 'DESC')->get();
        // $votesMonth = $doctor->stars->all();
        // $votes = $doctor->stars->pluck('vote')->all();
        // if( count($votes) > 0){

        //     $avg = round(array_sum($votes) / count($votes), 1);
        // }else{
        //     $avg = 0;
        // }
        return response()->json(compact('result'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = User::where('id',$id)->with('specializations', 'stars','sponsorships','reviews')->first();
        return response()->json(compact('result'));
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
