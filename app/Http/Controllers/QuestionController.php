<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Programmer;
use App\Models\Sujet;
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
        $last_id=Question::getLastId() + 1;
        for ($i=$last_id; $i <=$last_id+199 ; $i++) { 
           $question = new Question;
           $question->numeroQuestion = request('num_question'.$i);
           $question->reponseQuestion = request('rep_question'.$i);
           $question->idSujet = request('id_sujet');
           $question->idSousPartie = request('id_souspartie'.$i);
           $question->save();
        }

        $sujets = Sujet::getAllSujets();
        return view('sujet', ['sujets' => $sujets]);
        
        
    }
}
