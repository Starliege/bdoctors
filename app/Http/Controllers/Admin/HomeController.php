<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $doctor = User::where('id', Auth::user()->id)->first();

        $user = Auth::user();
        return view('admin.home',compact('doctor', 'user'));
    }


    // public function show($id){
    //     if(Auth::user()->id == $id){
    //         return redirect()->route('admin.home');
    //     } else {
    //         return redirect()->route('401');
    //     }
    // }

}
