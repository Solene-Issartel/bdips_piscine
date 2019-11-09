<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
	protected $table = 'promotion';

	public static function getAllPromos()
	{
		$promos = DB::table('promotion')->distinct()->get();
		return $promos;
	}
}
