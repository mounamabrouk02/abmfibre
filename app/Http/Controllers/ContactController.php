<?php

namespace App\Http\Controllers;

use App\Http\Requests\contactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
 public function index(){
    return view('contact');
 }
//Enregistrer une demande de contact
 public function store(contactRequest $request){

    $contact = new Contact();

    $contact-> nomComplet = $request->input('nomComplet');
    $contact-> email = $request->input('email');
    $contact-> objet = $request->input('objet');
    $contact-> message = $request->input('message');

    $contact-> save();// sauvegarde des infos récupérées
    session()->flash("success","Votre message a bien été envoyé");
    return redirect("/contact");

 }
}
