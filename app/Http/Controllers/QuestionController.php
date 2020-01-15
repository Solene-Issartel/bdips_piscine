<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Models\Question;
use App\Models\Programmer;
use App\Models\Sujet;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //Redirige vers la création des questions pour un sujet
    public function index()
    {
        return view('question');
    }

    //Création d'un sujet (200 questions) si l'utilisateur est un admin
    public function create()
    {
        if(Auth::user()->isAdmin()){

            //on récupère le dernier id des questions entrées dans la bdd afin de ne pas écraser les sujets précèdents
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
        } else {
            return view('error.error_404');
        } 
        
    }

}
