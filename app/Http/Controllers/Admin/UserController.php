<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
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
        
        $doctor = User::where('id', Auth::user()->id)->first();
        if(!$doctor->cv || !$doctor->image || !$doctor->services || !$doctor->phone){

            return view('admin.users.create', compact('doctor')); 
        }else{
            return redirect()->route('admin.home', compact('doctor'))->with('Profilo già creato');
        }
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
        $doctor = User::where('id', Auth::user()->id)->first();
        $request->validate(
            [
                'services' => 'nullable|min:1',
                'phone' => 'nullable|min:2',
                'image' => 'nullable|mimes:png,jpg,jpeg,svg|max:4096',
                'cv' => 'nullable|mimes:pdf|max:4096',

            ]
        );
        if(array_key_exists('services', $data)){
            $doctor->services = $data['services'];
        }
        if(array_key_exists('phone', $data)){
            $doctor->phone = $data['phone'];
        }
        $doctor->save();
        return redirect()->route('admin.home',$doctor);

        
        // $doctor->services = $data['services'];
        // $doctor->services = $data['services'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        // $email = Auth::user()->email->first();
        // $user = User::where('email', $email)->first();
        // return view('admin.users.show', compact($user));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $doctor = User::where('id', Auth::user()->id)->first();
        return view('admin.users.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
