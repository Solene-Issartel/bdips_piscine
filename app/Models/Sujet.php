<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sujet extends Model
{
    public function get_questions()
	{
		//on recupere tous les satellites qui appartiennent à la planète courante
	 $tab_q = Question::where('sujet_id', '=', $this->id)
	 ->get();
	 return $tab_q;
	}
}
