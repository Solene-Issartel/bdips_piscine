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
        if (User::find(Auth::user()->id)->isAdmin()) {
            $sujets = Sujet::getAllSujets();
            return view('sujet', ['sujets' => $sujets]);
        } else {
            return view('error.error_404');
        }
    }

     /**
     * Show subject list.
     *
     * @return \Illuminate\Http\Response
     */
    public function newSubject()
    {
        $id=Auth::user()->id;
        if($id != null){
            $user=User::find($id);
            if ($user->isAdmin()){
                return view('create_sujet',['user' => $user]);
            } else {
                return view('home');
            }
            
        } else {
            return view('welcome');
        }
    }
    

    public function create()
    {
        if (User::find(Auth::user()->id)->isAdmin()) {
            $sujet = new Sujet;
        
            $sujet->libelleSujet = request('subject_name');
            $sujet->nomAuteur = request('author_name');
            $sujet->save();

            $last_id = Question::getLastId();
            if($last_id == null){
                $last_id = 0;
            }
            
            $last_id = Question::getLastId();
            return view('question', ['id_sujet' => $sujet->id,'last_id' => $last_id]);
        } else {
            return view('error.error_404');
        }
        
    }

    public function delete()
    {
        if (User::find(Auth::user()->id)->isAdmin()) {
            $idSujet = request('idSujet');
            $sujet = Sujet::deleteSujet($idSujet);
            
            return redirect('/subject')->with('success', 'Subject deleted!');
        } else {
            return view('error.error_404');
        }
    }
}
