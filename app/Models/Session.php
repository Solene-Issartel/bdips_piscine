<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
	protected $table = 'session';

    public function get_session()
	{
		//on recupere tous les satellites qui appartiennent à la planète courante
	 $session = DB::table($table)->whereId($this->id);
	 return $session;
	}
}
