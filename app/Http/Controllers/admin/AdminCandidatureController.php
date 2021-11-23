<?php

namespace App\Http\Controllers\admin;

use PDF;
use App\Models\Offre;
use App\Models\Candidature;
use Illuminate\Http\Request;
use App\Mail\CandidatAcceptMail;
use App\Mail\CandidatRefusalMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;


class AdminCandidatureController extends Controller
{
    public function index()
    {

        $candidatures = Candidature::all();



        return view('admin.pages.candidature', [
            "candidatures" => $candidatures,
        ]);
    }
    public function destroy($id)
    {
        $candidature = candidature::find($id);
        $candidature->delete();
        return back()->with('error', 'Candidature supprimé !');
    }

    public function sendAcceptMail(Candidature $candidature)
    {

        $email = $candidature['email'];

        Mail::to($email)->send(new CandidatAcceptMail($candidature));

        $candidature->etat = "accepté";
        $candidature->save();

        return back()->with('success', 'Candidature acceptée, mail envoyé');
    }
    public function sendRefusalMail(Candidature $candidature)
    {

        $email = $candidature['email'];

        Mail::to($email)->send(new CandidatRefusalMail($candidature));

        $candidature->etat = "refusé";
        $candidature->save();

        return back()->with('success', 'Candidature refusée, mail envoyé');
    }
    public function downloadPdf($id)
    {
        $candidature = Candidature::find($id);
        $pdf = $candidature->cv;

        $headers = array(
            'Content-Type: application/pdf',
        );

        $fileName = $candidature->nom . " " . $candidature->prenom . ".pdf";

        return Storage::download($pdf,$fileName,$headers);
    }

    public function viewPDF($id){
        $candidature = Candidature::find($id);
        $pdf = $candidature->cv;

        $headers = array(
            'Content-Type: application/pdf',
        );

        return response()
        ->file(Storage::path($pdf), $headers);
    }
}
