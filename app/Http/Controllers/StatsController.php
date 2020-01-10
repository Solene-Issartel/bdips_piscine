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
        if($choix=='sujet'){
            //récupere toutes les ids des sujets
            $sujet=Sujet::getAllSujets();
            $libSujet=array();   
            $moySujet=array();
            for ($i=0; $i<count($sujet); $i++){
                //ajout du lib sujet correspondant dans le tab
                array_push($libSujet,$sujet[$i]->libelleSujet);
                //ajoute l'id de tous les sujets
                $id=$sujet[$i]->idSujet;
                //tableau ou on va toruver la moyenne de chaque session ou le sujet à été traité
                $moysess=array();
                //récupère les id_sessions grâce à l'id du sujet
                $tmpsess=Session::get_SujetSessions($id);
                for ($j=0; $j<count($tmpsess); $j++){
                    //recupere tous les users de la sessions j
                    $users=ResultatSousPartie::get_SessionUsers($tmpsess[$j]->idSession);
                    $tmpres=array();
                    for ($k=0; $k<count($users); $k++){
                        //calcule le score de chaque users pour le sujet j
                        $resuser=ResultatSousPartie::getScoreReading($tmpsess[$j]->idSession,$users[$k]->idUtilisateur)+ResultatSousPartie::getScoreListening($tmpsess[$j]->idSession,$users[$k]->idUtilisateur);
                        array_push($tmpres,$resuser); 
                    }
                    
                    $tmpmoysess=array_sum($tmpres)/count($tmpres);
                    array_push($moysess,$tmpmoysess); 
                }
                array_push($moySujet,array_sum($moysess)/count($moysess));
            }
            return view('/stats/affichage', ['libSujet'=>$libSujet,'moySujet'=>$moySujet]);
        }
        else{
           return view('/stats/choix', ['choix'=>$choix]);  
        }
        
        
        
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
                    
                    array_push($libSujet,$lib[0]->libelleSujet);
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
            if ($partie=='listening'){
                //récupere toutes les ids des sujets
                $sujet=Sujet::getAllSujets();
                $libSujet=array();   
                $moySujet=array();
                for ($i=0; $i<count($sujet); $i++){
                    //ajout du lib sujet correspondant dans le tab
                    array_push($libSujet,$sujet[$i]->libelleSujet);
                    //ajoute l'id de tous les sujets
                    $id=$sujet[$i]->idSujet;
                    //tableau ou on va toruver la moyenne de chaque session ou le sujet à été traité
                    $moysess=array();
                    //récupère les id_sessions grâce à l'id du sujet
                    $tmpsess=Session::get_SujetSessions($id);
                    for ($j=0; $j<count($tmpsess); $j++){
                        //recupere tous les users de la sessions j
                        $users=ResultatSousPartie::get_SessionUsers($tmpsess[$j]->idSession);
                        $tmpres=array();
                        for ($k=0; $k<count($users); $k++){
                            //calcule le score de chaque users pour le sujet j
                            $resuser=ResultatSousPartie::getScoreListening($tmpsess[$j]->idSession,$users[$k]->idUtilisateur);
                            array_push($tmpres,$resuser); 
                        }
                        
                        $tmpmoysess=array_sum($tmpres)/count($tmpres);
                        array_push($moysess,$tmpmoysess);
                    }
                    array_push($moySujet,array_sum($moysess)/count($moysess));
                }
                return view('/stats/affichage', ['partie'=>$partie,'libSujet'=>$libSujet,'moySujet'=>$moySujet]);
            }
            else{
               //récupere toutes les ids des sujets
                $sujet=Sujet::getAllSujets();
                $libSujet=array();   
                $moySujet=array();
                for ($i=0; $i<count($sujet); $i++){
                    //ajout du lib sujet correspondant dans le tab
                    array_push($libSujet,$sujet[$i]->libelleSujet);
                    //ajoute l'id de tous les sujets
                    $id=$sujet[$i]->idSujet;
                    //tableau ou on va toruver la moyenne de chaque session ou le sujet à été traité
                    $moysess=array();
                    //récupère les id_sessions grâce à l'id du sujet
                    $tmpsess=Session::get_SujetSessions($id);
                    for ($j=0; $j<count($tmpsess); $j++){
                        //recupere tous les users de la sessions j
                        $users=ResultatSousPartie::get_SessionUsers($tmpsess[$j]->idSession);
                        $tmpres=array();
                        for ($k=0; $k<count($users); $k++){
                            //calcule le score de chaque users pour le sujet j
                            $resuser=ResultatSousPartie::getScoreReading($tmpsess[$j]->idSession,$users[$k]->idUtilisateur);
                            array_push($tmpres,$resuser); 
                        }
                        
                        $tmpmoysess=array_sum($tmpres)/count($tmpres);
                        array_push($moysess,$tmpmoysess);
                    }
                    array_push($moySujet,array_sum($moysess)/count($moysess));
                }
                return view('/stats/affichage', ['partie'=>$partie,'libSujet'=>$libSujet,'moySujet'=>$moySujet]); 

            }

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
