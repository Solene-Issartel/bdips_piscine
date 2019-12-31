<?php

use Carbon;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultatSousPartie extends Model
{
	protected $table = 'resultatsouspartie';

	public $timestamps = false;

    public function get_score($id_utilisateur,$id_session)
	{
	 $score = DB::table($table)
	 			->where('idUtilisateur',$id_utilisateur)
	 			->where('idSession',$id_session)
	 			->pluck('scoreSousPartie');
	 return $score;
	}
}
