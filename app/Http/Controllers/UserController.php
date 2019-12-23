<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $currentuser = User::find($id);
        return view('user',['user' => $currentuser]);
    }

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

    public function listing()
    {
        $users = User::getAllUsersNotAdmin();
        return view('users_list', ['users' => $users]);
    }

    public function delete()
    {
        $id = request('id');
        $user = User::find($id);
        $user->delete();

        return redirect('/users_list')->with('success', 'User deleted!');
    }
}
