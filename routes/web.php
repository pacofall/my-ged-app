<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/** Rappel format d une Route:
 *   - URL de la page,
 *   - La class Controller qui gére l URL
 *   - La methode dans le Controller qui implémente la logique de ce qu il y"a faire
 *   - Donner un nom à la route pour retrouver facilement l url
 *
 *   IMPORTANT: Une route n est pas également à une View.  Il s‘agit juste d une url et l information d un controller
 *   qui géré ce qui se passe lorsqu‘on tape l url
 */

/** Homepage ...  */
Route::get('/',[IndexController::class,"index"])->name("homepage");


/** Login page ... */
Route::match(['get', 'post'],'/login',[AuthController::class,"login"])->name("auth-login-page");
Route::match(['delete'],'/logout',[AuthController::class,"logout"])->name("auth.logout");


/** Documents page ...  */
Route::get('/documents', [DocumentController::class, "index"])->name("document-page")->middleware("auth");
Route::get('/document/show/{doc}', [DocumentController::class, "showPage"])->name("document-show-page")->middleware("auth");
Route::get('/document/form-add', [DocumentController::class, "addFormPage"])->name("document-form-add-page")->middleware("auth");
Route::post('/document/action-add', [DocumentController::class, "addFormAction"])->name("document-action-add")->middleware("auth");
Route::get('/document/remove/{doc}', [DocumentController::class, "removeAction"])->name("document-action-remove")->middleware("auth");
Route::get('/document/download/{doc}', [DocumentController::class, "downloadAction"])->name("document-action-download")->middleware("auth");

















/** User page etc...  */
Route::get('/user', [UserController::class, "index"])->name("user-list-page")->middleware("auth");
Route::get('/user/show/{ref-user}', [UserController::class, "index"])->name("user-show-page")->middleware("auth");
Route::get('/user/form-add-user', [UserController::class, "showFormAdd"])->name("user-form-add-page")->middleware("auth");
Route::post('/user/action-add-user', [UserController::class, "addAction"])->name("user-form-action-add")->middleware("auth");


/** Settings page ...  */
Route::get('/settings', [SettingController::class, "index"])->name("settings-page")->middleware("settings-page");


Route::get('/support', function () {
    return view("support");
})->name("support");





//Route::prefix("/category")->name("category.")->group(function(){
//    Route::get('/', [DocumentController::class, "index"])->name("index");
//    Route::get('/show/{id}', [DocumentController::class, "show"])
//    ->where(["id" => "[0-9]+"])
//    ->name("show");
//});



//
//Route::prefix("/document")->middleware("auth")->name("ged.")->group(function(){
//    Route::get('/', [DocumentController::class, "index"])->name("index");
//    Route::post('/add', [DocumentController::class, "add"])->name("add");
//    Route::get('/{document}', [DocumentController::class, "show"])
////        ->where(['id' => '[0-9]+'])
//        ->name("show");
//});







