<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Sujet;
use App\Models\Question;
use App\Models\Programmer;
use App\User;
use Illuminate\Http\Request;

class SujetController extends Controller
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
     * Show subject list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sujets = Sujet::getAllSujets();
        return view('sujet', ['sujets' => $sujets]);
    }

     /**
     * Show subject list.
     *
     * @return \Illuminate\Http\Response
     */
    public function newSubject()
    {
        $id=Auth::user()->id;
        if($id == null){
            return view('create_sujet');
        } else {
             $user=User::find($id);
            return view('welcome');
        }
    }
    

    public function create()
    {
        $sujet = new Sujet;
        
        $sujet->libelleSujet = request('subject_name');
        $sujet->nomAuteur = request('author_name');
        $sujet->save();

        $last_id = Question::getLastId();
        if($last_id == null){
            $last_id = 0;
        }
        $users=Programmer::gerUsersForSession(14);
        var_dump($users);
        $u=Programmer::accessSession(15,14);
        var_dump($u);
        $last_id = Question::getLastId();
        return view('question', ['id_sujet' => $sujet->id,'last_id' => $last_id]);
    }
}
