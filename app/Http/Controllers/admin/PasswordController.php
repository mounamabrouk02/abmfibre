<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function create(){
        return view('admin.pages.password');
    }
    public function changePass(Request $request){
       // $admin = User::find($id);

       // $oldmdp= $request->input('oldmdp');
      // $newmdp= $request->input('newmdp');
        // $confmdp = $request->input('confmdp');

       // if ($admin->hash('password') == $oldmdp) {
        //    var_dump($admin->hash('password'));
        //}
        if ($request->get('oldmdp') != null) {
            # code...

            //si le hash du mot de passe saisi est différent du hash du mot de passe enregistré sur la bdd
        if(!(Hash::check($request->get('oldmdp'), Auth::user()->password))){
            //session()->flash('error','Votre mot de passe actuel ne correspond pas à celui précédemment enregistré');
            // Alors générer alert error
            return back()->with('error','Votre ancien mot de passe est incorrect');
        }}
        if ($request->get('newmdp') != null) {

            //si le nouveau mdp est identique au mdp enregistré
            if (strcmp($request->get('oldmdp'), $request->get('newmdp'))== 0) {
                // session()->flash('error','Ce mot de passe est un ancien mot de passe');
                //alors generer error
                return back()->with('error', 'Votre nouveau mot de passe a deja été utilisé');
            }
        }
        if ($request->get('newmdp') != null) {
            //si le nouveau mdp est different du mot de passe confirmé
            if (strcmp($request->get('newmdp'), $request->get('confmdp')) != 0) {
                //alors generer un message d'erreur
                return back()->with('error', 'La confirmation du mot de passe ne correspond pas au nouveau mot de passe saisi');
            }
        }
        $request->validate([
            "oldmdp"=> "required",
            "newmdp"=> "required",
            "confmdp"=>"required"

        ]);
        //
        $user = Auth::user();
        //crypte le mdp et le stocke sur la bdd
        $user->password=bcrypt($request->get('newmdp'));
        $user->save();
        return back()->with('success','Mot de passe modifié !');
    }
}
