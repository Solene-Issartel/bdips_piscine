<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
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
        return view('question');
    }

    public function create()
    {
        for ($i=1; $i <=200 ; $i++) { 
           $question = new Question;
           $question->numeroQuestion = request('num_question'.$i);
           $question->reponseQuestion = request('rep_question'.$i);
           $question->idSujet = request('id_sujet');
           $question->idSousPartie = request('id_souspartie'.$i);
           $question->save();
        }
        
        
    }
}
