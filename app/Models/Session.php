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
        //on recupere tous les satellites qui appartiennent à la planète courante
    $current_date = date("Y-m-d");
     $tab_s = DB::table('session')
        ->distinct()

        ->where('dateSession','>',$current_date)
        ->get();
     return $tab_s;
    }

    public static function deleteSession($id_session)
    {
        //on recupere tous les satellites qui appartiennent à la planète courante
     $session = DB::table('session')->where('idSession','=',$id_session)->delete();
     return $session;
    }

    public function get_session()
	{
		//on recupere tous les satellites qui appartiennent à la planète courante
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
}
