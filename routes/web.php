<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\rolesControlles;
use App\Http\Controllers\permissionControlles;
use App\Http\Controllers\BobineController;
use App\Http\Controllers\FibreColoriController;
use App\Http\Controllers\TubLaicheController;
use App\Http\Controllers\FScoloratioController;
use App\Http\Controllers\AparileController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\WorkOrderController;
use App\Http\Controllers\ChifetsController;


Auth::routes();
Route::get('/', function () {
    return redirect()->route('usersList');
});

Route::get('/dashbord', [App\Http\Controllers\HomeController::class, 'index'])->name('dashbord');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
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
Route::resource('fibreColori', FibreColoriController::class)->except(['index']);
Route::get('fibreColori/create/{id}', [FibreColoriController::class , 'create'])->name('fibreColori.create');

//passer id de fiche de suivi a formullaire de creation de fibre colorier

Route::resource('tube', TubLaicheController::class);
Route::get('/tube/download/TubeList', [TubLaicheController::class, 'downloadList'])->name('tube.download.TubeList');


// les route de coloration
Route::resource('coloration', FScoloratioController::class);// coloration/...

//les routes de aparile
Route::resource('aparile', AparileController::class)->except(['create' , 'show' , 'edit']);
//les routes de lotes
Route::resource('lote', LoteController::class)->except(['create' , 'show' , 'edit']);
//les routes de chiftes
Route::resource('chifet', ChifetsController::class)->except(['create' , 'show' , 'edit']);
//les routes de work order
Route::resource('work_order', WorkOrderController::class);