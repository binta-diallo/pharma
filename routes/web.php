<?php

use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {return view('welcome');});

// la route pour s'authentifier générer par laravel
Auth::routes();
// la route pour la page d'acceuil de l'aministrateur
Route::get('admin.home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');


//les routes des catégories

Route::get('admin.categories.index',[App\Http\Controllers\admin\CategorieController::class, 'index'])->name('admin.categories.index');

Route::get('admin.categories.create',[App\Http\Controllers\admin\CategorieController::class, 'create'])->name('admin.categories.create');

Route::post('admin.categories.store',[App\Http\Controllers\admin\CategorieController::class, 'store'])->name('admin.categories.store');

Route::get('admin.categories.edit/{id}',[App\Http\Controllers\admin\CategorieController::class, 'edit'])->name('admin.categories.edit');

Route::patch("admin.categories.update.{id}",[App\Http\Controllers\admin\CategorieController::class,"update"])->name('admin.categories.update');

Route::delete("admin.categories.delete.{id}",[App\Http\Controllers\admin\CategorieController::class,"destroy"])->name('admin.categories.delete');                      

//les routes des publications

Route::get('admin.publications.index',[App\Http\Controllers\admin\PublicationController::class,'index'])->name('admin.publications.index');

Route::get("admin/publications/create",[App\Http\Controllers\Admin\PublicationController::class,"create"])->name('admin.publications.create');

Route::post("admin/publications/store",[App\Http\Controllers\Admin\PublicationController::class,"store"])->name('admin.publications.store');









//les routes des utilisateurs

 //je créé une route pour la page d'attérissage de l'aministrateur.
 Route::get('/', [App\Http\Controllers\AcceuilController::class,"index"])->name("acceuil");

 //je créé une route pour la page de présentation.
 Route::get('présentation',[\App\Http\Controllers\PresentationController::class,"index"])->name("presentation");

 //je créé une route pour la page d'activités.
 Route::get('activities',[App\Http\Controllers\ActivitiesController::class,"index"])->name("activities");

 

