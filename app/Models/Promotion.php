<?php
namespace App\Models;

$GLOBALS = array(
    'annee_en_cours' => '2019/2020'
);

use DB;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
	protected $table = 'promotion';

	protected $annee;

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        global $GLOBALS;
        $this->annee = $GLOBALS['annee_en_cours'];
    }

	public static function getAllPromos()
	{
		$promos = DB::table('promotion')->distinct()->get();
		return $promos;
	}

	public static function getAllPromosOfCurrentYear()
	{
		global $GLOBALS;
		$annee=$GLOBALS['annee_en_cours'];
		$promos = DB::table('promotion')->distinct()->where('anneeScolaire',$annee)->get();
		return $promos;
	}

	public static function getPromoById($id_promotion)
	{
		$promo = DB::table($table)->where('idPromotion',$id_promotion);
		return $promo;
	}
}
