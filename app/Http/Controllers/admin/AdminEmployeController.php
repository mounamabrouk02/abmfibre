<?php

namespace App\Http\Controllers\admin;

use App\Models\Employe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\employeRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class AdminEmployeController extends Controller
{
    public function index(){

        $employes = Employe::all();
        return view('admin.pages.employes.index',[
            "employes"=>$employes
        ]
        );
    }

    public function store(employeRequest $request){
        // on instancie un nouvel objet employe
        $employe = new Employe();
        // on recupère les données des input à l'aide de $request et on les affecte aux champs de la bdd
        $employe->nom = $request->input('nom');
        $employe->prenom = $request->input('prenom');
        $employe->poste = $request->input('poste');
        $employe->telephone = $request->input('telephone');
        $employe->email = $request->input('email');
        $employe->adresse = $request->input('adresse');

           // $employe->image = $request->file('image')->store('photos');
           //$employe->image = Storage::putFile('photos', $request->file('image'));

            if ($request->hasFile('image')) {
                //Alors on le stocke
                $employe->image= $request->image->store('images');
            }



        $employe->save();
        session()->flash("success","Employé ajouté !");
        return redirect(route('admin.employe.index'));
    }

    public function edit($id){
        $employe= Employe::find($id);
        return view('admin.pages.employes.edit',[
            "employe"=>$employe
        ]);
    }

    public function update(EmployeRequest $request, $id){
        //on instancie un
        $employe= Employe::find($id);

        $employe->nom=$request->input('nom');
        $employe->prenom = $request->input('prenom');

        $employe->poste = $request->input('poste');
        $employe->telephone = $request->input('telephone');
        $employe->email = $request->input('email');
        $employe->adresse = $request->input('adresse');

        if ($request->hasFile('image')) {
            //Alors on le stocke
            $employe->image= $request->image->store('images');
        }

        $employe->save();
        session()->flash("success","Employé modifié !");
        return redirect(route('admin.employe.index'));
    }

    public function destroy($id){
        $employe= Employe::find($id);
        $employe->delete();
        return redirect(route('admin.employe.index'));
    }
}
