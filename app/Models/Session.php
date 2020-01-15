<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;


class Session extends Model
{
	protected $table = 'session';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dateSession', 'heureDebut', 'idSujet',
    ];

    //To don't use 'created_at and updated_at' in database
    public $timestamps = false;

    //Recupére toutes les sessions programmées après la date et l'heure courante de la bdd
    public static function getAllSessions()
    {
        //date et heure courantes
        $current_date = date("Y-m-d");
        $current_hour = date("H:i:s");

        //on récupère les sessions du jour qui ne sont pas encore passées
        $tab_s_today = DB::table('session')
            ->distinct()

            ->where('dateSession','=',$current_date)
            ->where('heureDebut','>',$current_hour)
            ->get();

        //on récupère les sessions d'après la date courante
        $tab_s_future = DB::table('session')
            ->distinct()

            ->where('dateSession','>',$current_date)
            ->get();

        if(count($tab_s_today)>0){
            $tab_s=array_merge($tab_s_today,$tab_s_future);
        } else {
            $tab_s = $tab_s_future;
        }
        
        return $tab_s;
    }

    //Supprime la session grâce à l'id donné
    public static function deleteSession($id_session)
    {
        $session = DB::table('session')->where('idSession','=',$id_session)->delete();
     return $session;
    }

    //Récupére l'heure de la session donnée 
    public static function hourSession($id_session)
    {
        $hour = DB::table('session')
            ->distinct()
            
            ->where('idSession','=', $id_session)
            ->pluck('heureDebut');
        return $hour;
    }

    //Récupére l'id du sujet de la session donnée 
    public static function getSubjectFromSession($id_session)
    {
        $id_sujet = DB::table('session')
            ->distinct()
            ->where('idSession','=', $id_session)
            ->pluck('idSujet');
        return $id_sujet[0];
    }

    //Récupére l'id du session de la sujet donnée
    public static function get_SujetSessions($id_sujet)
    {
        $sessions=DB::table('session')
                    ->select('idSession')
                    ->where('idSujet','=',$id_sujet)
                    ->get();
        return $sessions;
    }

    //Récupére la date de la session donnée 
    public static function dateSession($id_session)
    {
        $date = DB::table('session')
            ->select('dateSession','heureDebut')
            ->where('idSession','=', $id_session)
            ->get();
        return $date;
    }

}
