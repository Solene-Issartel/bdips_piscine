<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Redirige vers la page d'acceuil utilisateur
    public function index()
    {
        return view('home');
    }
}
