<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\ResultatSousPartie;
use App\Models\Session;
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
        return view('/stats/choix', ['choix'=>$choix]);
    }

    public function affichage(){
        if(isset($_POST['okEleve'])){
            $nom= request('nom');
            $prenom=request('prenom');
            $promo=request('promotion');
            $id_user=User::get_user($nom,$prenom,$promo);
            $id_sessions=ResultatSousPartie::get_userSessions($id_user);
            $libSujet=array();
            $resultat=array();
            //Récupère tous les libélé de sujets et les résultat par sujet 
            for ($i=0; $i<count($id_sessions); $i++){
                $lib=Session::get_LibSujet($id_sessions[$i]);
                array_push($libSujet,$lib);

                $tmp=ResultatSousPartie::getScoreTot($id_sessions[$i],$id_user);
                array_push($resultat,$tmp);
            }            
            return view('/stats/affichage',['prenom'=> $prenom, 'nom'=> $nom, 'libSujet'=> $libSujet, 'resultat'=> $resultat]);   
        }
        elseif(isset($_POST['okSousPartie'])){
            $part=request('sous_partie');
             return view('/stats/affichage',['part'=> $part]);
        }
        elseif(isset($_POST['okPartie'])){
            $partie=request('partie');
            return view('/stats/affichage',['partie'=> $partie]);
        }
        elseif(isset($_POST['okPromo'])){
            $promo=request('promo');
            $annee=request('annee');
            return view('/stats/affichage',['promo'=> $promo, 'annee'=> $annee]); 

        }
        else{
            return view('welcome');
        }
        

    }
    
}
    // public function recherche_eleve(request $request){
    //     //$prenom=request('prenom')
    //     return('Le nom est ' .$requet->input('nom'));
    // }
