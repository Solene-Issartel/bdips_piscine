<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultatSousPartie extends Model
{
	protected $table = 'resultatsouspartie';

    public function get_score($id_utilisateur,$id_session)
	{
		//on recupere tous les satellites qui appartiennent à la planète courante
	 $score = DB::table($table)->where('idUtilisateur',$id_utilisateur)->where('idSession',$id_session)->pluck('scoreSousPartie');
	 return $score;
	}
}
