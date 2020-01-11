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

    public static function get_session()
	{
		//on recupere tous les satellites qui appartiennent à la planète courante
	 $session = DB::table('session')->get();
	 return $session;
	}


    public static function hourSession($id_session)
    {
        $hour = DB::table('session')
            ->distinct()
            
            ->where('idSession','=', $id_session)
            ->pluck('heureDebut');
        return $hour;
    }
    public static function get_SujetSessions($id_sujet)
    {
        $sessions=DB::table('session')
                    ->select('idSession')
                    ->where('idSujet','=',$id_sujet)
                    ->get();
        return $sessions;
    }
    public static function dateSession($id_session)
    {
        $date = DB::table('session')
            ->select('dateSession','heureDebut')
            ->where('idSession','=', $id_session)
            ->get();
        return $date;
    }

}
