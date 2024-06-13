<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\ArretController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ConsommationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RecetteController;
use App\Http\Controllers\DashboardController;



// Les routes sans middleware
Route::get('/', function () {
    return view('auth.login');
});
 Route::get('/rapport', [ProductionController::class, 'rapport'])->name('rapport');
Route::get('admin', [DashboardController::class, 'index'])->name('dashboards.admin');

Auth::routes();



Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('productions', ProductionController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('recettes', RecetteController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::view('ligne', 'livewire.ligne-component');
    Route::view('atelier', 'livewire.atelier-component');
    Route::view('catalog', 'livewire.catalog-component');
    Route::view('planning', 'livewire.planning-component');
    Route::view('cadence', 'livewire.cadence-component');
});

Route::put('/productions/arrets/{id}', [ProductionController::class,'updateArret'])->name('productions.updateArret');
    Route::delete('/productions/{id}/destroy-arret', [ProductionController::class, 'destroyArret'])->name('productions.destroyArret');
Route::get('/get-lines', [ProductionController::class, 'getLines'])->name('getLines');
    Route::get('/get-articles', [ProductionController::class, 'getArticles'])->name('getArticles');
    Route::get('/productions-by-date', [ProductionController::class, 'getProductionsByDate']);

Route::middleware(['auth'])->group(function () {
    Route::post('/productions/{production}/declarer_arret', [ArretController::class, 'store'])->name('production.store');
    Route::resource('arrets', ArretController::class);});
  


    Route::resource('consommations', ConsommationController::class);
    Route::post('/consommation/{productionId}', [ConsommationController::class, 'store'])->name('consommation.store');



 
 
    Route::get('/consommations-ip/{productionId}', [RecetteController::class, 'getConsommationsIp'])->name('consommations-ip');
    Route::get('/consommations-ip/{productionId}/{articleId}', [RecetteController::class, 'getConsommationDetails'])->name('consommations-ip.details');
    