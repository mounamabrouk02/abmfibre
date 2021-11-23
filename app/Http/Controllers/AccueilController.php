<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Description;
use Illuminate\Http\Request;
use App\Models\Chiffre;

class AccueilController extends Controller
{
    //

    public function index(){
        $list = [
            [
                "image"=>asset('images/carousel4.jpg'),
                "titre"=>"Agence de fibre optique ABMFibre",
                "description"=>"L'agence « ABMFibre » ABMFIBRE, société par actions simplifiée est active depuis 5 ans."
            ],
            [
                "image"=>asset('images/carousel5.jpg'),
                "titre"=>"Agence de fibre optique ABMFibre",
                "description"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, pariatur!"
            ],
            [
                "image"=>asset('images/carousel6.jpg'),
                "titre"=>"Agence de fibre optique ABMFibre",
                "description"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda nihil, accusantium odio facilis nesciunt fuga!"
            ],
            [
                "image"=>asset('images/carousel0.jpg'),
                "titre"=>"Agence de fibre optique ABMFibre",
                "description"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda nihil, accusantium odio facilis nesciunt fuga!"
            ]


        ];

        $descriptions = Description::All();

        $cards = Service::All();

        $chiffres = Chiffre::All();

        return view('accueil',[
            'topList'=>$list,
            'descriptions'=>$descriptions,
            'cartes' => $cards,
            'chiffres' => $chiffres
        ]);


    }
}
