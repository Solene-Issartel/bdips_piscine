<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Models\Sujet;
use App\Models\Session;
use App\Models\Promotion;
use App\Models\Programmer;
use Illuminate\Http\Request;

class SessionController extends Controller
{

    //Redirige vers la liste des sessions si l'utilisateur est un admin
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $sessions = Session::getAllSessions();
                return view('session/liste_session', ['sessions' => $sessions]);

        } else {
        	return view('error.error_404');
        }
    }

    //Fonction pour l'affichage pour la création d'une nouvelle session toeic
    public function newSession()
    {
    	$tab_sujets = Sujet::getAllSujets();
        $promos = Promotion::getAllPromosOfCurrentYear();

        return view('session/session', ['tab_sujets' => $tab_sujets,'promos' => $promos]); 
    }


    //Création d'une session (uniquement pour les admin)
    public function create()
    {
        if(Auth::user()->isAdmin()){
            $promos = Promotion::getAllPromosOfCurrentYear();

            $session = new Session;

            //on récupère les infos du formulaire
            $tab_promo = request('promo');
            $session->dateSession = request('date_session');
            $heure = request('heure_session').':00';
            $session->heureDebut = $heure;
            $session->idSujet = request('idSujet');
            $session->save();

            $id_s=$session->id;

            foreach ($tab_promo as $val) {
                $prog = Programmer::create($id_s,$val);
            }

            return view('home');
        
        } else {
            return view('error.error_404');
        }
    }

    //Fonction pour l'affichage des sessions non passées et pour lesquelles l'utilisateur peut entrer en fonction de sa promo
    public function enter_session()
    {
        $Subjects=Programmer::displaySubject(Auth::user()['idPromotion']);
        $sujets = [];
        foreach ($Subjects as $sujet){
            $access=Programmer::accessSubject(Auth::user()['id'],$sujet->idSession);
            if ($access){
                array_push($sujets,$sujet);
            }
        }
        
        return view('session.session_user',['sujets' => $sujets]);
    }

    //Page d'attente pour pouvoir entrer dans une session. La session s'ouvre à l'heure programmée et ferme 30 min après celle-ci
    public function waiting_session()
    {
        date_default_timezone_set('Europe/Paris'); //fuseau horaire français

        $id_session=request('id_session');
        $id_sujet=Session::getSubjectFromSession($id_session);
        $hour=Session::hourSession($id_session);
        $current_hour = date('H:i:s');

        //on compare l'heure de la session à l'heure actuelle, si l'heure est égale ou dépassée l'étudiant peut entrer dans la session

        //on empeche l'utilisateur de rentrer dans la session 30min apres le depart de celle-ci
        $secs = strtotime("00:30:00")-strtotime("00:00:00");
        $result = date("H:i:s",strtotime($hour[0])+$secs);

        if($current_hour < $hour[0] || $current_hour > $result){
            $access = false;
        }
        else {
            $access = true;
        }
        
        return view('session.waiting_session',['id_sujet' => $id_sujet,'id_session' => $id_session,'access'=>$access]);
    }


    //Supprime une session si l'utilisateur est un admin
    public function delete()
    {
        if (Auth::user()->isAdmin()) {
            $idSession = request('idSession');
            $session = Session::deleteSession($idSession);
            
            return redirect('/session')->with('success', 'Session deleted!');
        } else {
            return view('error.error_404');
        }
    }
}
