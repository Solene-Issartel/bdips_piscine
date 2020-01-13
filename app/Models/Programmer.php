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


    
    public static function accessSubject($id_user,$id_session)
    {
        $user = DB::table('resultatsouspartie')
            ->distinct()
            ->select('resultatsouspartie.*')
            ->where('resultatsouspartie.idUtilisateur', '=', $id_user)
            ->where('resultatsouspartie.idSession', '=', $id_session)
            ->get();
        // si l'utilisateur possède déjà un score pour cette session alors renvoie false
        if($user != null){
            return false;
        }else {
            return true;
        }
    }
    

    public function getUser ()
    {
        $id=Auth::user()->id;
        if($id != null){
            $user=User::find($id);
            return $user['id_Promotion'];
        }
    }

    public static function displaySubject($id_promo){
        $date = date('Y-m-d');
        $id_subject = DB::table('programmer')
                ->distinct()
                ->join('session', 'session.idSession', '=', 'programmer.idSession')
                ->join('sujet','sujet.idSujet','=','session.idSujet')
                ->select('sujet.idSujet','sujet.libelleSujet','session.idSession')
                ->where('programmer.idPromotion','=',$id_promo)

                ->where('session.dateSession', '=', $date)
                ->get();
        return $id_subject;
    }

}
