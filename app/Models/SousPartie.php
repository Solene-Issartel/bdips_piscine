<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class SousPartie extends Model
{
	protected $table = 'sous-partie';

	public static function get_LibSousParties()
	{
		$sous_parties=DB::table('sous-partie')
						->select('libelleSousPartie')
						->get();
		return $sous_parties;
	}
}
