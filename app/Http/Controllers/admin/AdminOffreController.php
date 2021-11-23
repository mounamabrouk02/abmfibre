<?php

namespace App\Http\Controllers\admin;

use App\Models\Offre;
use App\Models\Mission;
use App\Models\Candidature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminOffreController extends Controller
{
    public function index(){

        $offres= Offre::all()->sortByDesc('created_at');
        $missions=Mission::all();

        return view('admin.pages.offres.index',
                     ["offres" => $offres,
                      "missions" => $missions]);
    }

    public function store(Request $request){
        //$offre = new Offre();
        $offree= new Offre();
        $offree->titre=$request->input('titre');
        $offree->description=$request->input('description');
        $offree->profil_recherche=$request->input('profil_recherche');
        $offree->contrat=$request->input('contrat');
        $offree->salaire=$request->input('salaire');
        $offree->infocompl=$request->input('infocompl');
        $offree->save();


        for($i=1;$i<=6;$i++){
            $content = $request->input('contenu'.$i);
            $mission = new Mission();
            $mission->parent_id = $offree->id;
            $mission->contenu=  $content ? $content:" ";
            $mission->save();
        }

        session()->flash('success','Offre enregistrée !');
        return redirect(route('admin.offre.store'));

    }

    public function edit($id){
        $offre= Offre::where("id",$id)->with('missions')->first();
        $mission = $offre->missions;
        return view('admin.pages.offres.edit',["offre"=>$offre]);
    }
    public function update(Request $request,$id){
        $offree= Offre::where("id",$id)->with('missions')->first();
        $mission = Mission::find($id);

        $offree->titre=$request->input('titre');
        $offree->description=$request->input('description');
        $offree->profil_recherche=$request->input('profil_recherche');
        $offree->contrat=$request->input('contrat');
        $offree->salaire=$request->input('salaire');
        $offree->infocompl=$request->input('infocompl');
        $offree->save();

        $offree->missions()->delete();
        for($i=1;$i < count($commande->articles);$i++){
            $content = $request->input('contenu'.$i);
            $mission = new Mission();
            $mission->parent_id = $offree->id;
            $mission->contenu=  $content ? $content:" ";
            $mission->save();
        }

        session()->flash('success','Offre modifiée !');
        return redirect(route('admin.offre.index'));

    }

    public function destroy($id){
        $candidatures= Candidature::where('parent_id', $id);
        $missions= Mission::where('parent_id', $id);
        $offre = Offre::find($id);
        $candidatures->delete();
        $missions->delete();
        $offre->delete();
        return back()->with('error',"Offre 'emploi supprimé !");
    }
   /* public function show($id){
        $offre = Offre::find($id);
        return view()
    }*/
}
