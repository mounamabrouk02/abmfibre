<?php

namespace App\Http\Controllers\admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminContactController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('admin.pages.contact',
                    ["contacts"=>$contacts]);
    }
    public function destroy($id){
        $contact = Contact::find($id);
        $contact->delete();
        return back()->with('error','Message supprimé !');
    }
}
