<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Question;
use App\Models\Programmer;
use App\Models\Sujet;
use Illuminate\Http\Request;

class ResultatSousPartieController extends Controller
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
        return view('questionnaire/quiz');
    }

    public function result()
    {
        $id=Auth::user()->id;
        if($id != null){
            //$id_session = request('id_session'); //à mettre dans le questionnaire
            $res = 0;
            $user_answers=[];
            for ($i=1;$i<=2;$i++){ //pour chaque sous partie
                $subject_answers = Question::getAnswersFromSousPartie($i,88);
                $indice = Question::getFirstIdFromSousPartie($i);
            }
            print(count($subject_answers));
            for ($j=$indice;$j<$indice+count($subject_answers);$j++){
                //$user_answers = request('result'.$j);
                array_push($user_answers,request('result'.$j));
            }
            var_dump($user_answers);
            for ($k=0;$k<count($user_answers);$k++){
                if($subject_answers[$k]->reponseQuestion == $user_answers){
                        $res += 1;
                    }
            }

                /*$resultat = new ResultatSousPartie;
                $resultat->idSousPartie = $i;
                $resultat->idSession = $id_session;
                $resultat->idUtilisateur =$id;
                $resultat->scoreSousPartie = $res;
*/
            var_dump($res);
            return view('questionnaire.quiz');
        } else {
            return view('welcome');
        }
    }


    
}
