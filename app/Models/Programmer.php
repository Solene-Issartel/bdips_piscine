<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Programmer extends Model
{
	protected $table = 'programmer';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idSession', 'idPromotion',
    ];

    //To don't use 'created_at and updated_at' in database
    public $timestamps = false;

    public static function create($id_session, $id_promo)
    {
            $prog = new Programmer;
            $prog->idSession=$id_session;
            $prog->idPromotion=$id_promo;
            $prog->save();

            return $prog;
    }

    public static function gerUsersForSession($id_session)
    {
        /*"SELECT DISTINCT users.id FROM users INNER JOIN programmer ON users.idPromotion=programmer.idPromotion WHERE programmer.idSession=3";*/
        $users = DB::table('programmer')
        		->distinct()
                ->select('users.*')
                ->join('users', 'programmer.idPromotion', '=', 'programmer.idPromotion')
                ->where('programmer.idSession','=',$id_session)
                ->get();
        return $users;
    }

    public static function accessSession($id_user,$id_session)
    {
           /* $user = "SELECT DISTINCT * FROM users INNER JOIN programmer ON users.idPromotion=programmer.idPromotion WHERE programmer.idSession=25 and users.id = 16";*/
           $user = DB::table('programmer')
           		->distinct()
                ->select('users.*')
                ->join('users', 'programmer.idPromotion', '=', 'programmer.idPromotion')
                ->where('programmer.idSession','=',$id_session)
                ->where('users.id','=',$id_user)
                ->get();

            //si l'utilisateur fait partit de la liste pouvant accéder à la session donnée en paramètre, renvoie true
            if($user != null){
            	return true;
            }else {
            	return false;
            }
    }

    public function getUser ()
    {
        $id=Auth::user()->id;
        if($id != null){
            $user=User::find($id);
            return $user[libelle_Promotion];
        }
    }

    public static function displaySubject($libelle_Promotion)
    {
        $subject = DB::table('sujet')
            ->distinct()
            ->select('libelleSujet')
            ->join('session','session.idSujet','=','sujet.idSujet')
            ->join('programmer','programmer.idSession','=','session.idSession')
            ->join('promotion','promotion.idPromotion','=','programmer.idPromotion')
            ->where('promotion.libellePromotion','=', $libelle_Promotion)
            ->get();
        return $subject;
    }

}
