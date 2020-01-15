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

    //Recupére toutes les promotions de la bdd
	public static function getAllPromos()
	{
		$promos = DB::table('promotion')->distinct()->get();
		return $promos;
	}

	//Recupére toutes les promotions de l'année courante de la bdd
	public static function getAllPromosOfCurrentYear()
	{
		global $GLOBALS;
		$annee=$GLOBALS['annee_en_cours'];
		$promos = DB::table('promotion')->distinct()->where('anneeScolaire',$annee)->get();
		return $promos;
	}

	//Recupére le libellé d'une promo grâce à son id
	public static function getLibPromoById($id_promo)
	{
		$promo=DB::table('Promotion')
				->select('libellePromotion')
				->where('idPromotion','=',$id_promo)
				->get();
		return $promo;
	}
}
