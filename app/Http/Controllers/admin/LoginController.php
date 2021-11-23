<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('admin.login');
    }

    public function login(Request $request){
        $request->validate([
           'username'=>'required',
           'password'=>'required'
        ]);
        //login success

        //DB
        //$user = User::where('username','$request->username')
        //$user->password === bcrypt($request->password)
        //bcrypt_check()
        //cookies_set('user','dskfmdksfozekopffpopdskfs')

        if(Auth::attempt([
            'username'=>$request->username,
            'password'=>$request->password
        ])==true){
            return redirect(route('admin.employe.index'));
        }
        //lgout from the app
//        Auth::logout();
        $request->flash();
        return back()->with([
            'error'=>"Nom d'utilisateur ou mot de passe est invalide."
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect(route('login'));
    }
}
