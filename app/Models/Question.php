<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	protected $table = 'question';

	//To don't use 'created_at and updated_at' in database
    public $timestamps = false;

    //Retourne le dernier id des questions enregistrées dans la bdd
	public static function getLastId()
	{
		/*$sql = 'SELECT MAX(`numeroQuestion`) FROM question'; */

		$last_id = DB::table('question')
					->max('numeroQuestion');

		 return $last_id;
	}

	//Retourne les réponses en fonction de l'id du sujet et d'une sous-partie particulière
	public static function getAnswersFromSousPartie($id_sous_partie,$id_sujet)
	{
		$answers = DB::table('question')
					->where('idSousPartie',$id_sous_partie)
					->where('idSujet',$id_sujet)
					->pluck('reponseQuestion');

		return $answers;
	}

	//Retoune l'id minimum pour une sous-partie donnée 
	public static function getFirstIdFromSousPartie($id_sous_partie)
	{
		/*'SELECT MAX(`numeroQuestion`) FROM question';*/
		$first_id = DB::table('question')
					->where('idSousPartie',$id_sous_partie)
					->min('numeroQuestion');

		 return $first_id;
	}
}
