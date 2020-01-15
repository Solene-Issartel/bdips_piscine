<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Promotion;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Redirige vers la modification du profil de l'utilisateur
    public function index()
    {
        $id = Auth::user()->id;
        $currentuser = User::find($id);
        $promos = Promotion::getAllPromosOfCurrentYear();
        return view('user',['user' => $currentuser, 'promos' => $promos]);
    }

    //Modifie le profil de l'utilisateur
    public function update()
    {
        $id = request('id');
        $user = User::find($id);
        $user->firstname =  request('firstname');
        $user->name = request('name');
        $user->idPromotion = request('promotion');
        if(request('password') != null){
            $user->password = bcrypt(request('password'));
        }
        
        $user->save();

        return redirect('/home')->with('success', 'User updated!');
    
    }

    //Redirige vers la liste des étudiants si l'utilisateur est un admin
    public function listing()
    {
        if (Auth::user()->isAdmin()) {
            $users = User::getAllUsersNotAdmin();
            return view('users_list', ['users' => $users]);
        } else {
            return view('error.error_404');
        }
    }

    public function delete()
    {
        $id = request('id');
        $user = User::find($id);
        $user->delete();

        return redirect('/users_list')->with('success', 'User deleted!');
    }
}
