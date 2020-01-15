<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Sujet;
use App\Models\Question;
use App\Models\Programmer;
use App\User;
use Illuminate\Http\Request;

class SujetController extends Controller
{
    //Redirige vers la liste des sujets si l'utilisateur est un admin
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $sujets = Sujet::getAllSujets();
            return view('sujet', ['sujets' => $sujets]);
        } else {
            return view('error.error_404');
        }
    }

    //Fonction pour l'affichage de création d'un nouveau sujet si l'utilisateur est un admin
    public function newSubject()
    {
        $id=Auth::user()->id;
        if($id != null){
            $user=User::find($id);
            if ($user->isAdmin()){
                return view('create_sujet',['user' => $user]);
            } else {
                return view('home');
            }
            
        } else {
            return view('welcome');
        }
    }
    
    //Création d'un nouveau sujet et rediriction vers le remplissage des 200 question (correction)
    public function create()
    {
        if (Auth::user()->isAdmin()) {
            $sujet = new Sujet;
        
            $sujet->libelleSujet = request('subject_name');
            $sujet->nomAuteur = request('author_name');
            $sujet->save();

            //on récupère le dernier id des questions entrées dans la bdd afin de ne pas écraser les sujets précèdents
            $last_id = Question::getLastId();
            if($last_id == null){
                $last_id = 0;
            }
            
            $last_id = Question::getLastId();
            return view('question', ['id_sujet' => $sujet->id,'last_id' => $last_id]);
        } else {
            return view('error.error_404');
        }
        
    }

    //Supprime le sujet selectionné si l'utilisateur est un admin
    public function delete()
    {
        if (Auth::user()->isAdmin()) {
            $idSujet = request('idSujet');
            $sujet = Sujet::deleteSujet($idSujet);
            
            return redirect('/subject')->with('success', 'Subject deleted!');
        } else {
            return view('error.error_404');
        }
    }
}
