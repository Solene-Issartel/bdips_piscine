<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\ResultatSousPartie;
use App\Models\Session;
use App\Models\Sujet;
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
            $user=User::get_user($nom,$prenom,$promo);
            if(isset($user)){
                $id_user = (array) $user;
            $id_user=$id_user['id'];
            var_dump($id_user);
            //$id_user->id_user;
            //var_dump(gettype($id_user));
            $sessions=ResultatSousPartie::get_userSessions($id_user);
            // $id_sessions= (array) $sessions;
            var_dump(count($sessions));
            
            $libSujet=array();
            $resultat=array();
            //Récupère tous les libélé de sujets et les résultat par sujet 
            for ($i=0; $i<count($sessions); $i++){
                var_dump($i);
                $lib=Sujet::get_LibSujet($sessions[$i]->idSession);
                
                array_push($libSujet,$lib[$i]->libelleSujet);
                var_dump($libSujet);

                $tmp=ResultatSousPartie::getScoreReading($sessions[$i]->idSession,$id_user)+ResultatSousPartie::getScoreListening($sessions[$i]->idSession,$id_user);
                var_dump($tmp);
                array_push($resultat,$tmp);
                var_dump($resultat);
            }            
            return view('/stats/affichage',['prenom'=> $prenom, 'nom'=> $nom, 'libSujet'=> $libSujet, 'resultat'=> $resultat]);   
        }
        else{
            $not_found=true;
            return view('/stats/choix',['choix'=>'eleve','not_found'=>$not_found]);
        }
            
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
            $id_promo=request('promotion');
            $en_fonction=request('statsPromo');
            $sessions=ResultatSousPartie::get_promoSessions($id_promo);
            $libSujet=array();
            $users=User::get_promoUsers($id_promo);
            $resultat=array();
            for ($i=0; $i<count($sessions); $i++){
                $lib=Sujet::get_LibSujet($id_sessions[$i]);
                array_push($libSujet,$lib);
            }
            if(request('statsPromo')=='subject'){
                for ($i=0; $i<count($sessions); $i++){
                    $tmp=array();
                    for ($j=0; $j<count($users); $j++){
                      $res=ResultatSousPartie::getScoreTot($id_sessions[$i],$users[$j]);
                      // FAIRE LA MOYENNE DU SUJET ET METTRE DANS RESULTAT
                      array_push($tmp, $res); 
                    }
                    $array_push($resultat,$tmp);
                }
                return view('/stats/affichage',['id_promo'=> $id_promo, 'resultat'=> $resultat]);
            }
            else{
                // A FAIRE 
                return view('/stats/affichage',['id_promo'=> $id_promo]);             
                }
            return view('/stats/affichage',['id_promo'=> $id_promo]);
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
