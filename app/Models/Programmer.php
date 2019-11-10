<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programmer extends Model
{
	protected $table = 'programmer';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idSession', 'idPromotion',
    ];

    //To don't use 'created_at and updated_at' in database
    public $timestamps = false;

    public static function create($id_session, $id_promo)
    {
            $prog = new Programmer;
            $prog->idSession=$id_session;
            $prog->idPromotion=$id_promo;
            $prog->save();

            return $prog;
    }

}
