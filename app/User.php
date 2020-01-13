<?php

namespace App;

use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'firstname', 'email', 'password','email_token','idPromotion',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','email_token'
    ];

    // Set the verified status to true and make the email token null
    public function verified()
    {
        $this->verified = 1;
        $this->email_token = null;
        $this->save();
    }

    // Boolean to know if user is an admin (1) or not (0)
    public function isAdmin()
    {
        return $this->admin == 1;
    }

    public static function getAllUsersNotAdmin()
    {
        $users = DB::table('users')->distinct()->where('admin',0)->get();
        return $users;
    }
    public static function get_user($name,$firstname,$promo)
    {
        $user=DB::table('users')
                    ->select('id')
                    ->where('name',$name)
                    ->where('firstname',$firstname)
                    ->where('idPromotion',$promo)
                    ->first();
                    
        return $user;
    }
    public static function get_promoUsers($id_promo){
        //$users=DB::select('SELECT id FROM users WHERE idPromotion=?',[$id_promo]);
        $users=DB::table('users')
                    ->select('id')
                    ->where('idPromotion','=',$id_promo)
                    ->get();
        return $users;
    }
    public static function get_userPromo($id_user){
        $promo=DB::table('users')
                    ->where('id','=',$id_user)
                    ->pluck('idPromotion');
        return $promo;
    }
}
