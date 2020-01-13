<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\ResultatSousPartie;
use App\Models\Session;
use App\Models\Sujet;
use App\Models\Promotion;
use App\Models\SousPartie;
use Auth;
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
        if(Auth::user()->isAdmin()){
            return view('/stats/stats');
        }
        else{
            $id_user=Auth::user()->id;
            $sessions=ResultatSousPartie::get_userSessions($id_user);
            $libSujet=array();
            $resultatSujet=array();
            $userDate=array();
            $userHour=array();
            $userIdSession=array();

            $percentage=array(100/6,100/25,100/39,100/30,100/30,100/16,100/54);
            $lib_SousParties=SousPartie::get_LibSousParties();
            $libSousParties=array();
            for ($i=0; $i<count($sessions); $i++){
                //Récupère tous les libélé de sujets et les résultat par sujet
                array_push($userIdSession,$sessions[$i]->idSession);
                $lib=Sujet::get_LibSujet($sessions[$i]->idSession);
                
                $tmp=ResultatSousPartie::getScoreReading($sessions[$i]->idSession,$id_user)+ResultatSousPartie::getScoreListening($sessions[$i]->idSession,$id_user);
                array_push($resultatSujet,$tmp);
                //Récupère la date et l'heure
                $date=Session::dateSession($sessions[$i]->idSession);
                array_push($userDate,$date[0]->dateSession);
                array_push($userHour,$date[0]->heureDebut);
                array_push($libSujet,$lib[0]->libelleSujet." ".$userDate[$i]);            
                }
            $selectedSession=$sessions[$i-1]->idSession;
            if (isset($_POST['okUserSubPart'])){
                $selectedSession=request('userSubPart');
            }
            $resSousPartie=array();
            for ($i=1;$i<8;$i++){
                array_push($libSousParties,$lib_SousParties[$i-1]->libelleSousPartie);
                $res=ResultatSousPartie::get_userPartScore($i,$id_user,$selectedSession);
                array_push($resSousPartie,$res[0]->scoreSousPartie*$percentage[$i-1]);

            }
            return view('/stats/affichage',['id_user'=>$id_user,'libSujet'=> $libSujet, 'resultatSujet'=> $resultatSujet,'userDate'=>$userDate,'userHour'=>$userHour,'userIdSession'=>$userIdSession,'libSousParties'=>$libSousParties,'resSousPartie'=>$resSousPartie]);
            }
            
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
                    if(count($tmpres)!=0){
                    	$tmpmoysess=array_sum($tmpres)/count($tmpres);
                    	array_push($moysess,$tmpmoysess); 
                    }
                    
                }
                if (count($moysess)!=0){
                	array_push($moySujet,array_sum($moysess)/count($moysess));
                }
                
            }
            return view('/stats/affichage', ['libSujet'=>$libSujet,'moySujet'=>$moySujet]);
        }
        elseif($choix=='session'){
            //recupere toutes les dates de session
            $session=Session::get_session();
            $id_session=array();
            $date_session=array();
            $heure_session=array();
            for ($i=0; $i<count($session); $i++){
                array_push($id_session,$session[$i]->idSession);                
                array_push($date_session,$session[$i]->dateSession);
                array_push($heure_session,$session[$i]->heureDebut);               
            }
            return view('/stats/choix', ['choix'=>$choix,'id_session'=>$id_session,'date_session'=>$date_session,'heure_session'=>$heure_session]);

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
                 
                for ($i=0; $i<count($sessions); $i++){
                    //Récupère tous les libélé de sujets et les résultat par sujet
                    $lib=Sujet::get_LibSujet($sessions[$i]->idSession);
                    $date=Session::dateSession($sessions[$i]->idSession);
                    array_push($libSujet,$lib[0]->libelleSujet." ".$date[0]->dateSession);
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
                        if(count($tmpres)!=0){
                        	$tmpmoysess=array_sum($tmpres)/count($tmpres);
                        	array_push($moysess,$tmpmoysess);
                        }
                        
                    }
                    if(count($moysess)!=0){
                    	array_push($moySujet,array_sum($moysess)/count($moysess));
                    }
                    
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
                        
                        if(count($tmpres)!=0){
                        	$tmpmoysess=array_sum($tmpres)/count($tmpres);
                        	array_push($moysess,$tmpmoysess);
                        }
                    }
                    if(count($moysess)!=0){
                    	array_push($moySujet,array_sum($moysess)/count($moysess));
                    }
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
                $date=Session::dateSession($sessions[$i]->idSession);
                array_push($libSujet,$lib[0]->libelleSujet." ".$date[0]->dateSession);
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
                    if(count($tmp)!=0){
                    	$moy=array_sum($tmp)/count($tmp);
                    	array_push($resultat,$moy);
                    }
                    
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
                        if(count($tmp)!=0){
                    		$moy=array_sum($tmp)/count($tmp);
                    		array_push($resultat,$moy);
                    	}
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
                        if(count($tmp)!=0){
                    		$moy=array_sum($tmp)/count($tmp);
                    		array_push($resultat,$moy);
                    	}                    }
                    return view('/stats/affichage',['libPromo'=> $libPromo[0]->libellePromotion, 'resultat'=> $resultat, 'libSujet'=>$libSujet,'max'=>$max,'subPart'=>$subPart]);
                }   
            }
        }
        elseif(isset($_POST['okSession'])){
            $id_session=request('idsess');
            $users=ResultatSousPartie::get_SessionUsers($id_session);
            $sous_parties=SousPartie::get_LibSousParties();
            $moySousPartie=array();
            $libSousParties=array();
            $percentage=array(100/6,100/25,100/39,100/30,100/30,100/16,100/54);
            for ($i=1;$i<8;$i++){
                array_push($libSousParties,$sous_parties[$i-1]->libelleSousPartie);
                $tmp=array();
                for ($j=0;$j<count($users);$j++){
                    $res=ResultatSousPartie::get_userPartScore($i,$users[$j]->idUtilisateur,$id_session);
                    array_push($tmp,$res[0]->scoreSousPartie);
                    
                }
                if(count($tmp)!=0){
                	$tmpmoy=array_sum($tmp)/count($tmp)*$percentage[$i-1];
                	array_push($moySousPartie,$tmpmoy);
                }
                
            }
            return view('/stats/affichage',['libSousParties'=>$libSousParties,'moySousPartie'=>$moySousPartie]);
        }
        elseif(isset($_POST['okUserSubPart'])){
            $selected=request('userSubPart');
            return $this->index();
        }
        else{
            return view('welcome');
        }
    }
    
}