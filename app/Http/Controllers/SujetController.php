<?php

namespace App\Http\Controllers;

use App\Models\Sujet;
use App\Models\Question;
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
     * Show subject list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sujets = Sujet::getAllSujets();
        return view('sujet', ['sujets' => $sujets]);
    }

     /**
     * Show subject list.
     *
     * @return \Illuminate\Http\Response
     */
    public function newSubject()
    {
        return view('create_sujet');
    }
    

    public function create()
    {
        $sujet = new Sujet;
        
        $sujet->libelleSujet = request('subject_name');
        $sujet->nomAuteur = request('author_name');
        $sujet->save();

        $last_id = Question::getLastId();
        if($last_id == null){
            $last_id = 0;
        }

        return view('question', ['id_sujet' => $sujet->id,'last_id' => $last_id]);
    }
}
