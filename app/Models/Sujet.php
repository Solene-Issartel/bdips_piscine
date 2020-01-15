<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Sujet extends Model
{
    protected $table = 'sujet';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'libelleSujet', 'nomAuteur',
    ];

    //To don't use 'created_at and updated_at' in database
    public $timestamps = false;

     //Recupére tous les sujets de la bdd
    public static function getAllSujets()
	{
	   $tab_s = DB::table('sujet')
                ->distinct()
                ->get();
	   return $tab_s;
	}

    //Supprime le sujet grâce à son id donné
	public static function deleteSujet($id_sujet)
	{
	   $sujet = DB::table('sujet')
                ->where('idSujet','=',$id_sujet)
                ->delete();
	   return $sujet;
	}

    //Récupère le libelle du sujet en fonction de l'id session donné
	public static function get_LibSujet($id_session)
    {
        //'SELECT libelleSujet FROM sujet JOIN session ON sujet.idSujet=session.idSujet WHERE session.idSession=?',[$id_session];
        $lib=DB::table('sujet')
        		->join('session','sujet.idSujet','=','session.idSujet')
        		->select('libelleSujet')
        		->where('session.idSession','=',$id_session)
        		->get();
        		
        return $lib;
    }

    //Récupère tous les identifiants des sujets de la bdd
    public static function get_AllIdSujets()
    {
    	$id_sujet=DB::table('sujet')
    				->select('idSujet')
    				->get();    	
    	return $id_sujet;
    }


    
}