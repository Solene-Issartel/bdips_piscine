<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/stats/stats');
    }

    public function checkchoice(){
        $choix=request('choix');
        if($choix=='eleve'){
            return view('/stats/stats_eleve');
        }
        elseif($choix=='sous_partie'){
            return view('/stats/stats_sousparties');
        }
        elseif ($choix=='partie'){
            return view('/stats/stats_partie');
        }
        elseif ($choix=='promo'){
            return view('/stats/stats_promo');
        }
        else{return view('welcome');}
    }


}
