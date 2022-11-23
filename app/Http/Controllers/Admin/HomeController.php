<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;
use App\Review;
use App\Star;
use Carbon\Carbon;

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
        $messages = Message::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $reviews = Review::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $stars = $doctor->stars()->orderBy('created_at', 'DESC')->get();
        $votesMonth = $doctor->stars->all();
        $votes = $doctor->stars->pluck('vote')->all();
        // $avg = round(array_sum($votes) / count($votes), 2);


        //    sezione voti mensili 

        $votesByMonth = [];
        $genCount = 1;
        $febCount = 1;
        $marCount = 1;
        $aprCount = 1;
        $mayCount = 1;
        $junCount = 1;
        $julCount = 1;
        $agoCount = 1;
        $sepCount = 1;
        $ottCount = 1;
        $novCount = 1;
        $decCount = 1;

        $counter = 1;
        $totalJan = 0;
        $totalFeb = 0;
        $totalMar = 0;
        $totalApr = 0;
        $totalMay = 0;
        $totalJun = 0;
        $totalJul = 0;
        $totalAgo = 0;
        $totalSep = 0;
        $totalOct = 0;
        $totalNov = 0;
        $totalDec = 0;

        foreach ($votesMonth as $star) {
            $date = new Carbon($star->pivot->created_at);
            $month = $date->format('M');
            if ($month == 'Jan') {
                $votesByMonth['Gennaio'] = [
                    'Mese' => 'Gennaio',
                    'Numero di voti' => $genCount++,
                    'Media voti' => $totalJan +=  $doctor->stars()->find($star->pivot->star_id)->vote
                ];
            } elseif ($month == 'Feb') {
                $votesByMonth['Febbraio'] = [
                    'Mese' => 'Febbraio',
                    'Numero di voti' => $febCount++,
                    'Media voti' => $totalFeb +=  $doctor->stars()->find($star->pivot->star_id)->vote
                ];
            } elseif ($month == 'Mar') {
                $votesByMonth['Marzo'] = [
                    'Mese' => 'Marzo',
                    'Numero di voti' => $marCount++,
                    'Media voti' => $totalMar +=  $doctor->stars()->find($star->pivot->star_id)->vote
                ];
            } elseif ($month == 'Apr') {
                $votesByMonth['Aprile'] = [
                    'Mese' => 'Aprile',
                    'Numero di voti' => $aprCount++,
                    'Media voti' => $totalApr +=  $doctor->stars()->find($star->pivot->star_id)->vote
                ];
            } elseif ($month == 'May') {
                $votesByMonth['Maggio'] = [
                    'Mese' => 'Maggio',
                    'Numero di voti' => $mayCount++,
                    'Media voti' => $totalMay +=  $doctor->stars()->find($star->pivot->star_id)->vote
                ];
            } elseif ($month == 'Jun') {
                $votesByMonth['Giugno'] = [
                    'Mese' => 'Giugno',
                    'Numero di voti' => $junCount++,
                    'Media voti' => $totalJun +=  $doctor->stars()->find($star->pivot->star_id)->vote
                ];
            } elseif ($month == 'Jul') {
                $votesByMonth['Luglio'] = [
                    'Mese' => 'Luglio',
                    'Numero di voti' => $julCount++,
                    'Media voti' => $totalJul +=  $doctor->stars()->find($star->pivot->star_id)->vote
                ];
            } elseif ($month == 'Aug') {
                $votesByMonth['Agosto'] = [
                    'Mese' => 'Agosto',
                    'Numero di voti' => $agoCount++,
                    'Media voti' => $totalAgo +=  $doctor->stars()->find($star->pivot->star_id)->vote
                ];
            } elseif ($month == 'Sep') {
                $votesByMonth['Settembre'] = [
                    'Mese' => 'Settembre',
                    'Numero di voti' => $sepCount++,
                    'Media voti' => $totalSep +=  $doctor->stars()->find($star->pivot->star_id)->vote
                ];
            } elseif ($month == 'Oct') {
                $votesByMonth['Ottobre'] = [
                    'Mese' => 'Ottobre',
                    'Numero di voti' => $ottCount++,
                    'Media voti' => $totalOct +=  $doctor->stars()->find($star->pivot->star_id)->vote
                ];
            } elseif ($month == 'Nov') {
                $votesByMonth['Novembre'] = [
                    'Mese' => 'Novembre',
                    'Numero di voti' => $novCount++,
                    'Media voti' => $totalNov +=  $doctor->stars()->find($star->pivot->star_id)->vote
                ];
            } else {
                $votesByMonth['Dicembre'] = [
                    'Mese' => 'Dicembre',
                    'Numero di voti' => $decCount++,
                    'Media voti' => $totalDec +=  $doctor->stars()->find($star->pivot->star_id)->vote
                ];
            }
        }
        // sezioni messaggi mensili
        $messagesByMonth = [];
        $genMsgCount = 1;
        $febMsgCount = 1;
        $marMsgCount = 1;
        $aprMsgCount = 1;
        $mayMsgCount = 1;
        $junMsgCount = 1;
        $julMsgCount = 1;
        $agoMsgCount = 1;
        $sepMsgCount = 1;
        $ottMsgCount = 1;
        $novMsgCount = 1;
        $decMsgCount = 1;
        foreach ($messages as $message) {
            $dateMsg = new Carbon($message->created_at);
            $monthMsg = $dateMsg->format('M');
            if ($monthMsg == 'Jan') {
                $messagesByMonth['Gennaio'] = [
                    'Mese' => 'Gennaio',
                    'Numero di messaggi' => $genMsgCount++
                ];
            } elseif ($monthMsg == 'Feb') {
                $messagesByMonth['Febbraio'] = [
                    'Mese' => 'Febbraio',
                    'Numero di messaggi' => $febMsgCount++,
                    
                ];
            } elseif ($monthMsg == 'Mar') {
                $messagesByMonth['Marzo'] = [
                    'Mese' => 'Marzo',
                    'Numero di messaggi' => $marMsgCount++,
                   
                ];
            } elseif ($monthMsg == 'Apr') {
                $messagesByMonth['Aprile'] = [
                    'Mese' => 'Aprile',
                    'Numero di messaggi' => $aprMsgCount++,
                    
                ];
            } elseif ($monthMsg == 'May') {
                $messagesByMonth['Maggio'] = [
                    'Mese' => 'Maggio',
                    'Numero di messaggi' => $mayMsgCount++,
                    
                ];
            } elseif ($monthMsg == 'Jun') {
                $messagesByMonth['Giugno'] = [
                    'Mese' => 'Giugno',
                    'Numero di messaggi' => $junMsgCount++,
                  
                ];
            } elseif ($monthMsg == 'Jul') {
                $messagesByMonth['Luglio'] = [
                    'Mese' => 'Luglio',
                    'Numero di messaggi' => $julMsgCount++,
                   
                ];
            } elseif ($monthMsg == 'Aug') {
                $messagesByMonth['Agosto'] = [
                    'Mese' => 'Agosto',
                    'Numero di messaggi' => $agoMsgCount++,
                    
                ];
            } elseif ($monthMsg == 'Sep') {
                $messagesByMonth['Settembre'] = [
                    'Mese' => 'Settembre',
                    'Numero di messaggi' => $sepMsgCount++,
                   
                ];
            } elseif ($monthMsg == 'Oct') {
                $messagesByMonth['Ottobre'] = [
                    'Mese' => 'Ottobre',
                    'Numero di messaggi' => $ottMsgCount++,
                   
                ];
            } elseif ($monthMsg == 'Nov') {
                $messagesByMonth['Novembre'] = [
                    'Mese' => 'Novembre',
                    'Numero di messaggi' => $novMsgCount++,
                   
                ];
            } else {
                $messagesByMonth['Dicembre'] = [
                    'Mese' => 'Dicembre',
                    'Numero di messaggi' => $decMsgCount++,
                   
                ];
            }
        }
        // sezione review mensili

        $reviewsByMonth = [];
        $genRevCount = 1;
        $febRevCount = 1;
        $marRevCount = 1;
        $aprRevCount = 1;
        $mayRevCount = 1;
        $junRevCount = 1;
        $julRevCount = 1;
        $agoRevCount = 1;
        $sepRevCount = 1;
        $ottRevCount = 1;
        $novRevCount = 1;
        $decRevCount = 1;
        foreach ($reviews as $review) {
            $dateRev = new Carbon($review->created_at);
            $monthRev = $dateRev->format('M');
            if ($monthRev == 'Jan') {
                $reviewsByMonth['Gennaio'] = [
                    'Mese' => 'Gennaio',
                    'Numero di recensioni' => $genRevCount++
                ];
            } elseif ($monthRev == 'Feb') {
                $reviewsByMonth['Febbraio'] = [
                    'Mese' => 'Febbraio',
                    'Numero di recensioni' => $febRevCount++,
                    
                ];
            } elseif ($monthRev == 'Mar') {
                $reviewsByMonthh['Marzo'] = [
                    'Mese' => 'Marzo',
                    'Numero di recensioni' => $marRevCount++,
                   
                ];
            } elseif ($monthRev == 'Apr') {
                $reviewsByMonth['Aprile'] = [
                    'Mese' => 'Aprile',
                    'Numero di recensioni' => $aprRevCount++,
                    
                ];
            } elseif ($monthRev == 'May') {
                $reviewsByMonth['Maggio'] = [
                    'Mese' => 'Maggio',
                    'Numero di recensioni' => $mayRevCount++,
                    
                ];
            } elseif ($monthRev == 'Jun') {
                $reviewsByMonth['Giugno'] = [
                    'Mese' => 'Giugno',
                    'Numero di recensioni' => $junRevCount++,
                  
                ];
            } elseif ($monthRev == 'Jul') {
                $reviewsByMonth['Luglio'] = [
                    'Mese' => 'Luglio',
                    'Numero di recensioni' => $julRevCount++,
                   
                ];
            } elseif ($monthRev == 'Aug') {
                $reviewsByMonth['Agosto'] = [
                    'Mese' => 'Agosto',
                    'Numero di recensioni' => $agoRevCount++,
                    
                ];
            } elseif ($monthRev == 'Sep') {
                $reviewsByMonth['Settembre'] = [
                    'Mese' => 'Settembre',
                    'Numero di recensioni' => $sepRevCount++,
                   
                ];
            } elseif ($monthRev == 'Oct') {
                $reviewsByMonth['Ottobre'] = [
                    'Mese' => 'Ottobre',
                    'Numero di recensioni' => $ottRevCount++,
                   
                ];
            } elseif ($monthRev == 'Nov') {
                $reviewsByMonth['Novembre'] = [
                    'Mese' => 'Novembre',
                    'Numero di recensioni' => $novRevCount++,
                   
                ];
            } else {
                $reviewsByMonth['Dicembre'] = [
                    'Mese' => 'Dicembre',
                    'Numero di recensioni' => $decRevCount++,
                   
                ];
            }
        }
        $stats = array_replace_recursive($votesByMonth, $reviewsByMonth,$messagesByMonth);


        


        $user = Auth::user();
        return view('admin.home', compact('doctor', 'user', 'messages', 'reviews', 'stars','stats'));
    }


    // public function show($id){
    //     if(Auth::user()->id == $id){
    //         return redirect()->route('admin.home');
    //     } else {
    //         return redirect()->route('401');
    //     }
    // }

}
