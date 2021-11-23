<?php

namespace App\Http\Controllers\admin;

use App\Models\Chiffre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\chiffreRequest;

class AdminChiffreController extends Controller
{
    public function index(){

        $chiffres= Chiffre::All();
        return view('admin.pages.chiffres',
                    ["chiffres"=>$chiffres]);
    }

    public function store(chiffreRequest $request){

        $chiffre = New Chiffre();

        $chiffre->titre=$request->input('titre');
        $chiffre->contenu=$request->input('contenu');
        //$chiffre->icon=$request->input('icon');

        $chiffre->save();
        session()->flash('success','Icone enregistrée !');
        return redirect(route('admin.chiffre.index'));


    }

    public function destroy($id){
        $chiffre= Chiffre::find($id);
        $chiffre->delete();
        return redirect(route('admin.chiffre.index'));
    }
}
