<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	protected $table = 'question';

    public function get_reponse()
	{
		//on recupere tous les satellites qui appartiennent à la planète courante
	 $reponse = DB::table($table)->whereId($this->id)->pluck('reponseQuestion');
	 return $reponse;
	}
}
