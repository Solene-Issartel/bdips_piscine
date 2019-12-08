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
}
