<?php

namespace App\Http\Controllers\admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\serviceRequest;

class AdminServiceController extends Controller
{
    public function index(){
        $services = Service::all();

        return view('admin.pages.services.index',
        ["services" =>$services]);
    }


    public function store(serviceRequest $request){

        $services= New Service();

        $services->titre= $request->input('titre');
        $services->contenu= $request->input('contenu');

        if ($request->hasFile('image')) {
            $services->image=$request->image->store('images');
        }



        $services->save();
        session()->flash('success','Service enregistré !');
        return redirect(route('admin.service.index'));


    }
    public function edit($id){
        $service = Service::find($id);

        return view('admin.pages.services.edit',
        ["service" =>$service]);
    }
    public function update(ServiceRequest $request,$id){
        $services=  Service::find($id);

        $services->titre= $request->input('titre');
        $services->contenu= $request->input('contenu');

        if ($request->hasFile('image')) {
            $services->image=$request->image->store('images');
        }

        $services->save();
        session()->flash('success','Service enregistré !');
        return redirect(route('admin.service.index'));
    }
    public function destroy($id){
        $service= Service::find($id);
        $service->delete();
        return redirect(route('admin.service.index'));

    }
}
