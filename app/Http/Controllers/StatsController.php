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
        return view('/stats/choix', ['choix'=>$choix]);
    }

    public function affichage(){
        if(isset($_POST['okEleve'])){
            $nom= request('name');
            $prenom=request('prenom');
            return view('/stats/affichage',['prenom'=> $prenom, 'nom'=> $nom]);   
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
