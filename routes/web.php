<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\rolesControlles;
use App\Http\Controllers\permissionControlles;
use App\Http\Controllers\BobineController;
use App\Http\Controllers\FibreColoriController;
use App\Http\Controllers\TubLaicheController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();
Route::get('/', function () {
    return redirect()->route('usersList');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/usersList', [App\Http\Controllers\userController::class, 'index'])->name('usersList');
Route::get('/user/create', [App\Http\Controllers\userController::class, 'create'])->name('user.create');
Route::post('/user/store', [App\Http\Controllers\userController::class, 'store'])->name('user.store');
Route::get('/user/show/{id}', [App\Http\Controllers\userController::class, 'show'])->name('user.show');
Route::get('/user/edit/{id}', [App\Http\Controllers\userController::class, 'edit'])->name('user.edit' );
Route::put('/user/update/{id}', [App\Http\Controllers\userController::class, 'update'])->name('user.update' );
Route::delete('/user/destroy/{id}', [App\Http\Controllers\userController::class, 'destroy'])->name('user.destroy');

Route::resource('role', rolesControlles::class);
Route::resource('permission', permissionControlles::class);
// coloration ..
Route::get('/coloration/formullaire', [App\Http\Controllers\fileControlles::class, 'index'])->name('coloration.formullaire');
Route::post('/file/coloratione', [App\Http\Controllers\fileControlles::class, 'index'])->name('file.coloration');

// bobines 
Route::resource('bobines', BobineController::class)->except(['show', 'edit' , 'create']);
//fibreColori
Route::resource('fibreColori', FibreColoriController::class);

Route::get('/fibreColori/downloadPdf/{id}', [FibreColoriController::class, 'downloadFibreFile'])->name('fibreColori.downloadPdf');
// Route::get('/fibreColori/downloadListFiberColorie', [FibreColoriController::class, 'downloadListFiberColorie'])->name('fibreColori.downloadListFiberColorie');
Route::get('/fibreColori/download/FibreList', [FibreColoriController::class, 'downloadListFiberColorie'])->name('fibreColori.download.FibreList');
// Route::get('/fibreColori/ok', [FibreColoriController::class, 'ok'])->name('fibreColori.ok');


Route::resource('tube', TubLaicheController::class);

