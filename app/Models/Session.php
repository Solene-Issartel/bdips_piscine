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

    public static function getAllSessions()
    {
        //only sessions after today's date to avoid deleting session where students have results
        $current_date = date("Y-m-d");
        $tab_s = DB::table('session')
            ->distinct()

            ->where('dateSession','>=',$current_date)
            ->get();
        return $tab_s;
    }

    public static function deleteSession($id_session)
    {
        $session = DB::table('session')->where('idSession','=',$id_session)->delete();
     return $session;
    }

    public function get_session()
	{
	   $session = DB::table($table)->whereId($this->id);
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

    public static function getSubjectFromSession($id_session)
    {
        $id_sujet = DB::table('session')
            ->distinct()
            ->where('idSession','=', $id_session)
            ->pluck('idSujet');
        return $id_sujet[0];
    }
}
