<?php

namespace App\Http\Controllers;

use App\Review;
use App\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
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
         'name_reviewer'=>'required|min:3',
         'surname_reviewer'=>'required|min:3',
         'review'=>'required|min:3',
         'user_id'=>'required|exists:users,id'
       ]); 
       $user = User::findOrFail($data['user_id']);
       $review = new Review();
       $review->name_reviewer = $data['name_reviewer'];
       $review->surname_reviewer = $data['surname_reviewer'];
       $review->review = $data['review'];
       $review->user_id = $data['user_id'];

       $review->save();

       return redirect()->route('show', $user );
    //    $review = Review::create($params);
    // //    if($review) {
    //      return redirect()->route('show', $review );
       

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
