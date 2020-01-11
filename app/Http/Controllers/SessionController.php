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
        if (User::find(Auth::user()->id)->isAdmin()) {
            $sessions = Session::getAllSessions();
                return view('session/liste_session', ['sessions' => $sessions]);

        } else {
        	return view('error.error_403');
        }
    }

    public function newSession()
    {
    	$tab_sujets = Sujet::getAllSujets();
        $promos = Promotion::getAllPromosOfCurrentYear();

        return view('session/session', ['tab_sujets' => $tab_sujets,'promos' => $promos]); 
    }

    public function create()
    {
        if(User::find(Auth::user()->id)->isAdmin()){
            $promos = Promotion::getAllPromosOfCurrentYear();

            $session = new Session;

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
            return view('error.eror_403');
        }
    }

    public function enter_session()
    {
        $sujets=Programmer::displaySubject(Auth::user()['idPromotion']);
        return view('session.session_user',['sujets' => $sujets]);
    }

    public function waiting_session()
    {
        date_default_timezone_set('Europe/Paris'); //fuseau horaire français

        $id_session=request('id_session');
        $id_sujet=Session::getSubjectFromSession($id_session);
        $hour=Session::hourSession($id_session);
        $current_hour = date('H:i:s');

        //on compare l'heure de la session à l'heure actuelle, si l'heure est égale ou dépassée l'étudiant peut entrer dans la session
        if($current_hour < $hour[0]){
            $access = false;
        }
        else {
            $access = true;
        }
        
        return view('session.waiting_session',['id_sujet' => $id_sujet,'id_session' => $id_session,'access'=>$access]);
    }

    public function delete()
    {
        if (User::find(Auth::user()->id)->isAdmin()) {
            $idSession = request('idSession');
            $session = Session::deleteSession($idSession);
            
            return redirect('/session')->with('success', 'Session deleted!');
        } else {
            return view('error.error_403');
        }
    }
}
