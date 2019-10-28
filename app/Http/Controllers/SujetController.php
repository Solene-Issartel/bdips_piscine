<?php

namespace App\Http\Controllers;

use App\Models\Sujet;
use Illuminate\Http\Request;

class SujetController extends Controller
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
        return view('sujet');
    }

    public function create()
    {
        $sujet = new Sujet;
        
        $sujet->libelleSujet = request('subject_name');
        $sujet->nomAuteur = request('author_name');
        $sujet->save();

        return view('question', ['id_sujet' => $sujet->id]);
    }
}
