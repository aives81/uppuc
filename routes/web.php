<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/*
 * Route pour l'espace avant la connexion, le site web
*/
//Route pour la page acceuil
Route::get('/', function (){
    return view('index');
});

//Route pour la page inscription
Route::get('/Inscription', 'userController@create');

//Route pour la page categorie
Route::get('/Categorie-{id}', function () {
    return view('categorie');
});

//Route pour la page contact
Route::get('/Contactez-nous', function () {
    return view('contact');
});

//Route pour la page about
Route::get('/A-propos', function () {
    return view('about');
});

/*
 * Route pour le traitement lié à l'espace avant la connexion, le site web
*/

//Route pour le traitement de la page de connexion
Route::post('/trtlogin', 'userController@authenticate');

//Page de traitement
Route::post('/createUser', 'userController@store');

/*
 * Route pour l'espace d'apres connexion des utilisateurs
*/

//Profil utilisateur
Route::get('/Utilisateur/Profil', 'adminController@index');
Route::get('/Entreprise/Toutes-vos-entreprises', 'adminController@allEntreprisesOfOwner');

//Page pour la creation d'une entreprise
Route::get('/Entreprise/Ajouter-une-entreprise', 'entrepriseController@create');

/*
 * Route pour les traitements liés au pages de profil de l'user
*/
//Sur les pages de traitement rajouter les ->auth();
//Enregistrement d'une entreprise
Route::post('/addEntreprise', 'entrepriseController@store');

//Enregistrement des produits d'une entreprise
Route::post('/AddProd', 'prodServController@store');

//Déconnexion
Route::get('/Utilisateur/Logout', 'userController@logout');
