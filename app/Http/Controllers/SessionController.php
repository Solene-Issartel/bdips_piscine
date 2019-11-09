<?php

namespace App\Http\Controllers;

use App\Models\Sujet;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
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
        $tab_sujets = Sujet::getAllSujets();

        return view('session/session', ['tab_sujets' => $tab_sujets]); 
    }

    public function create()
    {
        $session = new Session;

        $session->dateSession = request('date_session');
        $heure = request('heure_session').':00';
        $session->heureDebut = $heure;
        $session->idSujet = request('idSujet');
        $session->save();

        return view('user');
    }
}
