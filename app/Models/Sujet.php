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

    public static function getAllSujets()
	{
		//on recupere tous les satellites qui appartiennent à la planète courante
	 $tab_s = DB::table('sujet')->distinct()->get();
	 return $tab_s;
	}

	public static function deleteSujet($id_sujet)
	{
		//on recupere tous les satellites qui appartiennent à la planète courante
	 $sujet = DB::table('sujet')->where('idSujet','=',$id_sujet)->delete();
	 return $sujet;
	}

    public function get_questions()
	{
		//on recupere tous les satellites qui appartiennent à la planète courante
	 $tab_q = Question::where('sujet_id', '=', $this->id)
	 ->get();
	 return $tab_q;
	}

	/*public function create($subject_name,$author_name){
		$this->libelleSujet = $subject_name;
		$this->auteurSujet = $author_name;
		$this->save();
	}*/

	public static function get_LibSujet($id_session)
    {
        // $lib=DB::select('SELECT libelleSujet FROM sujet JOIN session ON sujet.idSujet=session.idSujet WHERE session.idSession=?',[$id_session]);
        $lib=DB::table('sujet')
        		->join('session','sujet.idSujet','=','session.idSujet')
        		->select('libelleSujet')
        		->where('session.idSession','=',$id_session)
        		->get();
        		
        return $lib;
    }

    public static function get_AllIdSujets()
    {
    	$id_sujet=DB::table('sujet')
    				->select('idSujet')
    				->get();    	
    	return $id_sujet;
    }
}