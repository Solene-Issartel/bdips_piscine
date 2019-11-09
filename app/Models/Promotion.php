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

	public static function getPromoById($id_promotion)
	{
		$promo = DB::table($table)->where('idPromotion',$id_promotion)
		return $promo;
	}
}
