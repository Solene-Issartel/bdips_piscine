<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\ResultatSousPartie;
use App\Models\Session;
use App\Models\Sujet;
use App\Models\Promotion;
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
            $sessions=ResultatSousPartie::get_userSessions($id_user);           
            $libSujet=array();
            $resultat=array();
            //Récupère tous les libélé de sujets et les résultat par sujet 
            for ($i=0; $i<count($sessions); $i++){
                $lib=Sujet::get_LibSujet($sessions[$i]->idSession);
                array_push($libSujet,$lib[$i]->libelleSujet);
                $tmp=ResultatSousPartie::getScoreReading($sessions[$i]->idSession,$id_user)+ResultatSousPartie::getScoreListening($sessions[$i]->idSession,$id_user);

                array_push($resultat,$tmp);
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
            $libPromo=Promotion::getLibPromoById($id_promo);
            $en_fonction=request('statsPromo');
            $sessions=ResultatSousPartie::get_promoSessions($id_promo);
            $libSujet=array();
            $users=User::get_promoUsers($id_promo);
            $resultat=array();
            for ($i=0; $i<count($sessions); $i++){
                $lib=Sujet::get_LibSujet($sessions[$i]->idSession);
                array_push($libSujet,$lib[0]->libelleSujet);
            }
            if(request('statsPromo')=='subject'){
                $subPart='';
                $max=990;
                for ($i=0; $i<count($sessions); $i++){
                    $tmp=array();
                    for ($j=0; $j<count($users); $j++){
                      $res=ResultatSousPartie::getScoreReading($sessions[$i]->idSession,$users[$j]->id)+ResultatSousPartie::getScoreListening($sessions[$i]->idSession,$users[$j]->id);
                      array_push($tmp, $res); 
                    }
                    $moy=array_sum($tmp)/count($tmp);
                    array_push($resultat,$moy);
                }
                return view('/stats/affichage',['libPromo'=> $libPromo[0]->libellePromotion, 'resultat'=> $resultat, 'libSujet'=>$libSujet,'max'=>$max,'subPart'=>$subPart]);
            }
            else{
                $max=495;
                if(request('statsPromo')=='listening'){
                    $subPart=request('statsPromo');
                    for ($i=0; $i<count($sessions); $i++){
                        $tmp=array();
                        for ($j=0; $j<count($users); $j++){
                          $res=ResultatSousPartie::getScoreListening($sessions[$i]->idSession,$users[$j]->id);
                          // FAIRE LA MOYENNE DU SUJET ET METTRE DANS RESULTAT

                          array_push($tmp, $res); 
                        }
                        $moy=array_sum($tmp)/count($tmp);
                        array_push($resultat,$moy);
                    }
                    return view('/stats/affichage',['libPromo'=> $libPromo[0]->libellePromotion, 'resultat'=> $resultat, 'libSujet'=>$libSujet,'max'=>$max, 'subPart'=>$subPart]);
                }
                else{
                    $subPart=request('statsPromo');
                    for ($i=0; $i<count($sessions); $i++){
                        $tmp=array();
                        for ($j=0; $j<count($users); $j++){
                          $res=ResultatSousPartie::getScoreReading($sessions[$i]->idSession,$users[$j]->id);
                          array_push($tmp, $res); 
                        }
                        $moy=array_sum($tmp)/count($tmp);
                        array_push($resultat,$moy);
                    }
                    return view('/stats/affichage',['libPromo'=> $libPromo[0]->libellePromotion, 'resultat'=> $resultat, 'libSujet'=>$libSujet,'max'=>$max,'subPart'=>$subPart]);
                }   
            }
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
