<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use Illuminate\Http\Request;

class ActualiteController extends Controller
{
    public function index(){
        //On récupère toutes les actu
        $actualite = Actualite::all();



        return view('actualites',[
        "actualites"=>$actualite,
        ]);
    }
}
