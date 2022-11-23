<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Specialization;

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
        if (!$doctor->cv || !$doctor->image || !$doctor->services || !$doctor->phone) {

            return view('admin.users.create', compact('doctor'));
        } else {
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
        if (array_key_exists('services', $data)) {
            $doctor->services = $data['services'];
        }
        if (array_key_exists('phone', $data)) {
            $doctor->phone = $data['phone'];
        }
        if (array_key_exists('image', $data)) {
            $img_path = Storage::disk('public')->put('images', $request->file('image'));
            $data['image'] = $img_path;
            $doctor->image = $img_path;
        }
        if (array_key_exists('cv', $data)) {
            $cv_path = Storage::disk('public')->put('cvs', $request->file('cv'));
            $data['cv'] = $cv_path;
            $doctor->cv = $cv_path;
        }
        $doctor->save();
        return redirect()->route('admin.home', $doctor);


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
        $data = $request->all();
    
        $doctor = User::where('id', Auth::user()->id)->first();
        $request->validate(
            [
                'name' => 'required', 'string', 'max:100',
                'surname' => 'required', 'string', 'max:100',
                'address' => 'required', 'string', 'max:255',
                'specialization' => 'required', 'array', 'max:255',
                'services' => 'nullable|min:1',
                'phone' => 'nullable|min:2',
                'image' => 'nullable|mimes:png,jpg,jpeg,svg|max:4096',
                'cv' => 'nullable|mimes:pdf|max:4096',

            ]
        );
        if (array_key_exists('image', $data)) {
            if ($doctor->image) {
                Storage::delete($doctor->image);
            }
            $img_path = Storage::disk('public')->put('images', $request->file('image'));
            $data['image'] = $img_path;
            $doctor->image = $img_path;
        }
        if (array_key_exists('cv', $data)) {
            if ($doctor->cv) {
                Storage::delete($doctor->cv);
            }
            $img_path = Storage::disk('public')->put('cvs', $request->file('cv'));
            $data['cv'] = $img_path;
            $doctor->cv = $img_path;
        }
        $doctor->specializations()->detach();
        foreach($data['specialization'] as $key => $s){
            $new_specialization = new Specialization();
            $new_specialization->specialization = $s;
            $new_specialization->save();
            $doctor->specializations()->attach($new_specialization->id);

        }
       $doctor->update($data);
        return redirect()->route('admin.home', $doctor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $doctor = User::where('id', Auth::user()->id)->first();
        $img = $doctor->image;
        $cv = $doctor->cv;
        $doctor->delete();
        if($img && Storage::exists($img)){

            Storage::delete($img);
        }
        if($cv && Storage::exists($cv)){

            Storage::delete($cv);
        }
        return redirect('/');
    }
}
