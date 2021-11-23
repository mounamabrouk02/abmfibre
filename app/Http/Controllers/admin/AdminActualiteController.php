<?php

namespace App\Http\Controllers\admin;

use App\Models\Actualite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\actualiteRequest;

class AdminActualiteController extends Controller
{
    public function index(){
        $actualites = Actualite::all();
        return view("admin.pages.actualites.index",
                    ["actualites"=>$actualites]);

    }
    public function store(actualiteRequest $request){
        $actualite= new Actualite();

        $actualite->titre=$request->input('titre');
        $actualite->description=$request->input('description');
        if ($request->hasFile('image')) {
            $actualite->image=$request->image->store('images');
        }

        $actualite->save();
        session()->flash('success','Actualité enregistrée !');
        return redirect(route('admin.actualites.index'));

    }
    public function edit($id){
        $actualite= Actualite::find($id);
        return view('admin.pages.actualites.edit',[
            "actualite"=>$actualite
        ]);
    }
    public function update(ActualiteRequest $request, $id){
        $actualite= Actualite::find($id);

        $actualite->titre=$request->input('titre');
        $actualite->description=$request->input('description');
        if ($request->hasFile('image')) {
            $actualite->image=$request->image->store('images');
        }

        $actualite->save();
        session()->flash('success','Actualité modifiée !');
        return redirect(route('admin.actualites.index'));

    }

    public function destroy($id){
        $actualite= Actualite::find($id);
        $actualite->delete();
        return back()->with('error', 'Actualité supprimé !');

    }
}
