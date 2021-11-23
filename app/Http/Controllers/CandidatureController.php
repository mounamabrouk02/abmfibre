<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidatureRequest;
use App\Models\Offre;
use App\Models\Candidature;
use Illuminate\Http\Request;

class CandidatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cand = Candidature::all();
        return $cand;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CandidatureRequest $request)
    {
            $offre= Offre::findOrFail($request->offre);

            $candidature = new Candidature();

            $candidature->nom = $request->input('nom');
            $candidature->prenom = $request->input('prenom');
            $candidature->email = $request->input('email');
            $candidature->telephone = $request->input('telephone');
            $candidature->parent_id = $offre->id;
            //si un cv est bien chargé
            if ($request->hasFile("cv")) {
                //Alors on le stocke
                $candidature->cv= $request->cv->store("cv");
            }
            //si une lettre de motivation est bien chargé
            if ($request->hasFile('lettreMotivation')) {
                //Alors on la stock
                $candidature->lettreMotivation= $request->lettreMotivation->store('lettreMotivation');
            }

            $candidature-> save();

            session()->flash("success","Votre candidature a bien été enregistrée");
            return redirect("/offres");



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sendAcceptMail(Candidature $candidature){
        //update cand status

        // $candidature->accept = true;
        // $candidature->save();

        //send mail

        return back()->with('success',"Email has been sent to $candidature->nom.");
    }
}
