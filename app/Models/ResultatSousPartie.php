<?php

namespace App\Models;

use Carbon;
use DB;
use Illuminate\Database\Eloquent\Model;

class ResultatSousPartie extends Model
{
	protected $table = 'resultatsouspartie';
	
	public $timestamps = false;

	//Retourne tous les scores par sous-parties pour un utiisateur et une session
    public function get_score($id_utilisateur,$id_session)
	{
	 $score = DB::table($table)
	 			->where('idUtilisateur',$id_utilisateur)
	 			->where('idSession',$id_session)
	 			->pluck('scoreSousPartie');
	 return $score;
	}

	//Calcule les scores pour la partie Listening pour un utiisateur et une session
	public static function getScoreListening($id_session,$id_utilisateur)
	{
		$score_l = 0;
		for($i=1;$i<=4;$i++){
			$score = DB::table('resultatsouspartie')
	 			->where('idUtilisateur',$id_utilisateur)
	 			->where('idSession',$id_session)
	 			->where('idSousPartie',$i)
	 			->pluck('scoreSousPartie');
	 		$score_l += $score[0];
		}

		if($score_l<=6){
			$score_list=5;
		} elseif ($score_l==7) {
			$score_list=10;
		} elseif ($score_l==8) {
			$score_list=15;
		} elseif ($score_l==9) {
			$score_list=20;
		} elseif ($score_l==10) {
			$score_list=25;
		} elseif ($score_l==11) {
			$score_list=30;
		} elseif ($score_l==12) {
			$score_list=35;
		} elseif ($score_l==13) {
			$score_list=40;
		} elseif ($score_l==14) {
			$score_list=45;
		} elseif ($score_l==15) {
			$score_list=50;
		} elseif ($score_l==16) {
			$score_list=55;
		} elseif ($score_l==17) {
			$score_list=60;
		} elseif ($score_l==18) {
			$score_list=65;
		} elseif ($score_l==19) {
			$score_list=70;
		} elseif ($score_l==20) {
			$score_list=75;
		} elseif ($score_l==21) {
			$score_list=80;
		} elseif ($score_l==22) {
			$score_list=85;
		} elseif ($score_l==23) {
			$score_list=90;
		} elseif ($score_l==24) {
			$score_list=95;
		} elseif ($score_l==25) {
			$score_list=100;
		} elseif ($score_l==26) {
			$score_list=110;
		} elseif ($score_l==27) {
			$score_list=115;
		} elseif ($score_l==28) {
			$score_list=120;
		} elseif ($score_l==29) {
			$score_list=125;
		} elseif ($score_l==30) {
			$score_list=130;
		} elseif ($score_l==31) {
			$score_list=135;
		} elseif ($score_l==32) {
			$score_list=140;
		} elseif ($score_l==33) {
			$score_list=145;
		} elseif ($score_l==34) {
			$score_list=150;
		} elseif ($score_l==35) {
			$score_list=160;
		} elseif ($score_l==36) {
			$score_list=165;
		} elseif ($score_l==37) {
			$score_list=170;
		} elseif ($score_l==38) {
			$score_list=175;
		} elseif ($score_l==39) {
			$score_list=180;
		} elseif ($score_l==40) {
			$score_list=185;
		} elseif ($score_l==41) {
			$score_list=190;
		} elseif ($score_l==42) {
			$score_list=195;
		} elseif ($score_l==43) {
			$score_list=200;
		} elseif ($score_l==44) {
			$score_list=210;
		} elseif ($score_l==45) {
			$score_list=215;
		} elseif ($score_l==46) {
			$score_list=220;
		} elseif ($score_l==47) {
			$score_list=230;
		} elseif ($score_l==48) {
			$score_list=240;
		} elseif ($score_l==49) {
			$score_list=245;
		} elseif ($score_l==50) {
			$score_list=250;
		} elseif ($score_l==51) {
			$score_list=255;
		} elseif ($score_l==52) {
			$score_list=260;
		} elseif ($score_l==53) {
			$score_list=270;
		} elseif ($score_l==54) {
			$score_list=275;
		} elseif ($score_l==55) {
			$score_list=280;
		} elseif ($score_l==56) {
			$score_list=290;
		} elseif ($score_l==57) {
			$score_list=295;
		} elseif ($score_l==58) {
			$score_list=300;
		} elseif ($score_l==59) {
			$score_list=310;
		} elseif ($score_l==60) {
			$score_list=315;
		} elseif ($score_l==61) {
			$score_list=320;
		} elseif ($score_l==62) {
			$score_list=325;
		} elseif ($score_l==63) {
			$score_list=330;
		} elseif ($score_l==64) {
			$score_list=340;
		} elseif ($score_l==65) {
			$score_list=345;
		} elseif ($score_l==66) {
			$score_list=350;
		} elseif ($score_l==67) {
			$score_list=360;
		} elseif ($score_l==68) {
			$score_list=365;
		} elseif ($score_l==69) {
			$score_list=370;
		} elseif ($score_l==70) {
			$score_list=380;
		} elseif ($score_l==71) {
			$score_list=385;
		} elseif ($score_l==72) {
			$score_list=390;
		} elseif ($score_l==73) {
			$score_list=395;
		} elseif ($score_l==74) {
			$score_list=400;
		} elseif ($score_l==75) {
			$score_list=405;
		} elseif ($score_l==76) {
			$score_list=410;
		} elseif ($score_l==77) {
			$score_list=420;
		} elseif ($score_l==78) {
			$score_list=425;
		} elseif ($score_l==79) {
			$score_list=430;
		} elseif ($score_l==80) {
			$score_list=440;
		} elseif ($score_l==81) {
			$score_list=445;
		} elseif ($score_l==82) {
			$score_list=450;
		} elseif ($score_l==83) {
			$score_list=460;
		} elseif ($score_l==84) {
			$score_list=465;
		} elseif ($score_l==85) {
			$score_list=470;
		} elseif ($score_l==86) {
			$score_list=475;
		} elseif ($score_l==87) {
			$score_list=480;
		} elseif ($score_l==88) {
			$score_list=485;
		} elseif ($score_l==89) {
			$score_list=490;
		} else {
			$score_list=495;
		} 
		
	 	return $score_list;
	}

	//Calcule les scores pour la partie Reading pour un utiisateur et une session
	public static function getScoreReading($id_session,$id_utilisateur)
	{
		$score_l = 0;
		for($i=5;$i<=7;$i++){
			$score = DB::table('resultatsouspartie')
	 			->where('idUtilisateur',$id_utilisateur)
	 			->where('idSession',$id_session)
	 			->where('idSousPartie',$i)
	 			->pluck('scoreSousPartie');
	 		$score_l += $score[0];
		}

		if($score_l<=15){
			$score_read=5;
		} elseif ($score_l==16) {
			$score_read=10;
		} elseif ($score_l==17) {
			$score_read=15;
		} elseif ($score_l==18) {
			$score_read=20;
		} elseif ($score_l==19) {
			$score_read=25;
		} elseif ($score_l==20) {
			$score_read=30;
		} elseif ($score_l==21) {
			$score_read=35;
		} elseif ($score_l==22) {
			$score_read=40;
		} elseif ($score_l==23) {
			$score_read=45;
		} elseif ($score_l==24) {
			$score_read=50;
		} elseif ($score_l==25) {
			$score_read=60;
		} elseif ($score_l==26) {
			$score_read=65;
		} elseif ($score_l==27) {
			$score_read=70;
		} elseif ($score_l==28) {
			$score_read=80;
		} elseif ($score_l==29) {
			$score_read=85;
		} elseif ($score_l==30) {
			$score_read=90;
		} elseif ($score_l==31) {
			$score_read=95;
		} elseif ($score_l==32) {
			$score_read=100;
		} elseif ($score_l==33) {
			$score_read=110;
		} elseif ($score_l==34) {
			$score_read=115;
		} elseif ($score_l==35) {
			$score_read=120;
		} elseif ($score_l==36) {
			$score_read=125;
		} elseif ($score_l==37) {
			$score_read=130;
		} elseif ($score_l==38) {
			$score_read=140;
		} elseif ($score_l==39) {
			$score_read=145;
		} elseif ($score_l==40) {
			$score_read=150;
		} elseif ($score_l==41) {
			$score_read=160;
		} elseif ($score_l==42) {
			$score_read=165;
		} elseif ($score_l==43) {
			$score_read=170;
		} elseif ($score_l==44) {
			$score_read=175;
		} elseif ($score_l==45) {
			$score_read=180;
		} elseif ($score_l==46) {
			$score_read=190;
		} elseif ($score_l==47) {
			$score_read=195;
		} elseif ($score_l==48) {
			$score_read=200;
		} elseif ($score_l==49) {
			$score_read=210;
		} elseif ($score_l==50) {
			$score_read=215;
		} elseif ($score_l==51) {
			$score_read=220;
		} elseif ($score_l==52) {
			$score_read=225;
		} elseif ($score_l==53) {
			$score_read=230;
		} elseif ($score_l==54) {
			$score_read=235;
		} elseif ($score_l==55) {
			$score_read=240;
		} elseif ($score_l==56) {
			$score_read=250;
		} elseif ($score_l==57) {
			$score_read=255;
		} elseif ($score_l==58) {
			$score_read=260;
		} elseif ($score_l==59) {
			$score_read=265;
		} elseif ($score_l==60) {
			$score_read=270;
		} elseif ($score_l==61) {
			$score_read=280;
		} elseif ($score_l==62) {
			$score_read=285;
		} elseif ($score_l==63) {
			$score_read=290;
		} elseif ($score_l==64) {
			$score_read=300;
		} elseif ($score_l==65) {
			$score_read=305;
		} elseif ($score_l==66) {
			$score_read=310;
		} elseif ($score_l==67) {
			$score_read=320;
		} elseif ($score_l==68) {
			$score_read=325;
		} elseif ($score_l==69) {
			$score_read=330;
		} elseif ($score_l==70) {
			$score_read=335;
		} elseif ($score_l==71) {
			$score_read=340;
		} elseif ($score_l==72) {
			$score_read=350;
		} elseif ($score_l==73) {
			$score_read=355;
		} elseif ($score_l==74) {
			$score_read=360;
		} elseif ($score_l==75) {
			$score_read=365;
		} elseif ($score_l==76) {
			$score_read=370;
		} elseif ($score_l==77) {
			$score_read=380;
		} elseif ($score_l==78) {
			$score_read=385;
		} elseif ($score_l==79) {
			$score_read=390;
		} elseif ($score_l==80) {
			$score_read=395;
		} elseif ($score_l==81) {
			$score_read=400;
		} elseif ($score_l==82) {
			$score_read=405;
		} elseif ($score_l==83) {
			$score_read=410;
		} elseif ($score_l==84) {
			$score_read=415;
		} elseif ($score_l==85) {
			$score_read=420;
		} elseif ($score_l==86) {
			$score_read=425;
		} elseif ($score_l==87) {
			$score_read=430;
		} elseif ($score_l==88) {
			$score_read=435;
		} elseif ($score_l==89) {
			$score_read=445;
		} elseif ($score_l==90) {
			$score_read=450;
		} elseif ($score_l==91) {
			$score_read=455;
		} elseif ($score_l==92) {
			$score_read=465;
		} elseif ($score_l==93) {
			$score_read=470;
		} elseif ($score_l==94) {
			$score_read=480;
		} elseif ($score_l==95) {
			$score_read=485;
		} elseif ($score_l==96) {
			$score_read=490;
		} else {
			$score_read=495;
		} 
		
	 	return $score_read;
	}

	//Retourne les id session pour lesquelles les utilisateurs ont des scores 
	public static function get_userSessions($id_user)
    {
        //'SELECT DISTINCT idSession FROM resultatsouspartie WHERE idUtilisateur=?',[$id_user];
        $id_session=DB::table('resultatsouspartie')
        				->distinct()
        				->select('idSession')
        				->where('idUtilisateur','=',$id_user)
        				->get();
        return $id_session;
    }

    //Retourne les id des sessions pour lesquelles une promo a des scores
    public static function get_promoSessions($id_promo){
    	//'SELECT DISTINCT idSession FROM resultatsouspartie JOIN users ON resultatsouspartie.idUtilisateur=users.id WHERE users.idPromotion=?',[$id_promo];
    	$id_session= DB::table('resultatsouspartie')
    					->distinct()
    					->select('idSession')
    					->join('users','resultatsouspartie.idUtilisateur','=','users.id')
    					->where('users.idPromotion','=',$id_promo)
    					->get();
    	return $id_session;
    }


    //Retourne le score d'un utilisateur pour une sous-partie et une session données
    public static function get_userPartScore($id_souspartie,$id_user,$id_session){
    	//'SELECT scoreSousPartie FROM resultatsouspartie WHERE idSousPartie=? AND idUtilisateur=? AND idSession=?',[$id_souspartie],[$id_user],[$id_session];
    	$result=DB::table('resultatsouspartie')
    				->select('scoreSousPartie')
    				->where('idSousPartie','=',$id_souspartie)
    				->where('idUtilisateur','=',$id_user)
    				->where('idSession','=',$id_session)
    				->get();
    	return $result;
    }

    //Retourne les id utilisateurs qui ont des scores pour une session donnée
    public static function get_SessionUsers($id_session)
    {
    	$users=DB::table('resultatsouspartie')
    				->select('idUtilisateur')
    				->distinct()
    				->where('idSession','=',$id_session)
    				->get();
    	return $users;
    }

}

