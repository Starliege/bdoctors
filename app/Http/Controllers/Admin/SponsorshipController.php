<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Sponsorship;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
class SponsorshipController extends Controller
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
        $dates = [];
        $doctor = User::where('id', Auth::user()->id)->first();
        $bronze = Sponsorship::whereId(1)->first();
        $silver = Sponsorship::whereId(2)->first();
        $gold = Sponsorship::whereId(3)->first();

        if(count($doctor->sponsorships) > 0){
            $docSponsorships = $doctor->sponsorships()->get();
            // $docSponsorships[0]->pivot->end_adv;
            foreach ($docSponsorships as $s){
                array_push($dates,$s->pivot->end_adv,);
            }
            asort($dates);
            $lastSponsorship = $dates[0];
            if($lastSponsorship < Carbon::now()){
                return view('admin.sponsorships.create', compact('doctor', 'bronze', 'silver', 'gold'));
    
            }else{
                return redirect('/');
            }

        }else{
            return view('admin.sponsorships.create', compact('doctor', 'bronze', 'silver', 'gold')); 
        }

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bronze = Sponsorship::whereId(1)->first();
        $silver = Sponsorship::whereId(2)->first();
        $gold = Sponsorship::whereId(3)->first();
        $data = $request->all();
        $doctor = User::where('id', Auth::user()->id)->first();
       
        
        if($data['sponsorship'] == 'Bronze'){
            $doctor->sponsorships()->attach($bronze->id,[
                'start_adv' => Carbon::now(),
                'end_adv' => Carbon::now()->addHour($bronze->hours)
            ]);

        }elseif($data['sponsorship'] == 'Silver'){
            $doctor->sponsorships()->attach($silver->id,[
                'start_adv' => Carbon::now(),
                'end_adv' => Carbon::now()->addHour($silver->hours)
            ]);
        }else{
            $doctor->sponsorships()->attach($gold->id,[
                'start_adv' => Carbon::now(),
                'end_adv' => Carbon::now()->addHour($gold->hours)
            ]);
        }
        $doctor->save();
        return redirect()->route('admin.home', $doctor);
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
