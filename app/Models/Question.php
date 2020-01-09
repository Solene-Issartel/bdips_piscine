<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	protected $table = 'question';

	//To don't use 'created_at and updated_at' in database
    public $timestamps = false;

    public function get_reponse()
	{
		 $reponse = DB::table($table)->whereId($this->id)->pluck('reponseQuestion');
		 return $reponse;
	}

	public static function getLastId()
	{
		$last_id = DB::table('question')
					->max('numeroQuestion');

		/*$sql = 'SELECT MAX(`numeroQuestion`) FROM question';
	 
	 	 $last_id = DB::select($sql);*/
		 return $last_id;
	}

	public static function getAnswersFromSousPartie($id_sous_partie,$id_sujet)
	{
		$answers = DB::table('question')
					->where('idSousPartie',$id_sous_partie)
					->where('idSujet',$id_sujet)
					->pluck('reponseQuestion');

		return $answers;
	}

	public static function getFirstIdFromSousPartie($id_sous_partie)
	{
		$first_id = DB::table('question')
					->where('idSousPartie',$id_sous_partie)
					->min('numeroQuestion');

		/*$sql = 'SELECT MAX(`numeroQuestion`) FROM question';
	 
	 	 $last_id = DB::select($sql);*/
		 return $first_id;
	}
}
