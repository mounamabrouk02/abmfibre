<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('accueil');
// });
use App\Http\Controllers\OffresController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\ActualitesController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\admin\PasswordCotroller;
use App\Http\Controllers\admin\PasswordController;
use App\Http\Controllers\admin\AdminOffreController;
use App\Http\Controllers\admin\AdminChiffreController;
use App\Http\Controllers\admin\AdminContactController;
use App\Http\Controllers\admin\AdminEmployeController;
use App\Http\Controllers\admin\AdminServiceController;
use App\Http\Controllers\admin\AdminActualiteController;
use App\Http\Controllers\admin\AdminCandidatureController;

Route::get('/', [AccueilController::class, "index"]); // laravel 8
// Route::get('/', "AccueilController@index") laravel 7,6,5

Route::get('/actualites', [ActualiteController::class, "index"]);


//Route::get('/offres', [OffresController::class, "index"]);
Route::resource('/offres', OffresController::class);
Route::resource('/candidature', CandidatureController::class);

Route::get('/contact', [ContactController::class, "index"]);
Route::post('/contact', [ContactController::class, "store"]);


Route::prefix('/administrateur')->middleware('auth')->group(function () {

    //public route (remove auth middleware from it)
    Route::get('/login', [LoginController::class, "index"])->withoutMiddleware('auth')->name("login");
    Route::post('/login', [LoginController::class, "login"])->withoutMiddleware('auth')->name("login.submit");
    Route::get('/password',[PasswordController::class,"create"])->name('admin.password.create');
    Route::post('/password',[PasswordController::class,"changePass"]);

    Route::post('/logout', [LoginController::class, "logout"])->name("logout");

    Route::get('/', [AdminEmployeController::class, "index"])->name('admin.employe.index');
    Route::get('/{id}/edit', [AdminEmployeController::class, "edit"]);
    Route::put('/{id}', [AdminEmployeController::class, "update"]);
    Route::post('/', [AdminEmployeController::class, "store"])->name('admin.employe.store');
    Route::delete('/{id}', [AdminEmployeController::class, "destroy"]);
    // Route::get('/', [AdminEmployeController::class, "index"])->name("admin.employe.index");
    // Route::post('/', [AdminEmployeController::class, "store"])->name("admin.employe.store");



    Route::get('/services', [AdminServiceController::class, "index"])->name("admin.service.index");
    Route::get('/services/{id}/edit', [AdminServiceController::class, "edit"]);
    Route::put('/services/{id}', [AdminServiceController::class, "update"]);
    Route::post('/services', [AdminServiceController::class, "store"])->name("admin.service.store");
    Route::delete('/services/{id}', [AdminServiceController::class, "destroy"]);

    Route::get('/chiffres', [AdminChiffreController::class, "index"])->name("admin.chiffre.index");
    Route::post('/chiffres', [AdminChiffreController::class, "store"])->name("admin.chiffre.store");
    Route::delete('/chiffres/{id}', [AdminChiffreController::class, "destroy"]);

    Route::get('/actualites', [AdminActualiteController::class, "index"])->name("admin.actualites.index");
    Route::get('/actualites/{id}/edit', [AdminActualiteController::class, "edit"]);
    Route::put('/actualites/{id}', [AdminActualiteController::class, "update"]);
    Route::post('/actualites', [AdminActualiteController::class, "store"])->name("admin.actualites.store");
    Route::delete('/actualites/{id}', [AdminActualiteController::class, "destroy"]);

    Route::get('/offres', [AdminOffreController::class, "index"])->name("admin.offre.index");
    Route::get('/offres/{id}/edit', [AdminOffreController::class, "edit"]);
    Route::put('/offres/{id}', [AdminOffreController::class, "update"]);
    Route::post('/offres', [AdminOffreController::class, "store"])->name("admin.offre.store");
    Route::delete('/offres/{id}', [AdminOffreController::class, "destroy"]);

    Route::get('/contact', [AdminContactController::class, "index"])->name("admin.contact.index");
    Route::delete('/contact/{id}', [AdminContactController::class, "destroy"]);

    Route::get('/candidature', [AdminCandidatureController::class, "index"])->name("admin.candidature.index");
    Route::delete('/candidature/{id}', [AdminCandidatureController::class, "destroy"]);

    Route::get('/candidature/pdf/{id}/download', [AdminCandidatureController::class, "downloadPdf"])->name("pdf:download");
    Route::get('/candidature/pdf/{id}/view', [AdminCandidatureController::class, "viewPDF"])->name("pdf:view");

    //route to send mails
    Route::post('/candidature/{candidature}/accept', [AdminCandidatureController::class, "sendAcceptMail"])->name("admin.candidature.sendAcceptMail");
    Route::post('/candidature/{candidature}/refusal', [AdminCandidatureController::class, "sendRefusalMail"])->name("admin.candidature.sendRefusalMail");
});
