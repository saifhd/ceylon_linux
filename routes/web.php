<?php

use App\Http\Controllers\Admin\RegionsController;
use App\Http\Controllers\Admin\TerritoriesController;
use App\Http\Controllers\Admin\ZonesController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware'=>'auth'],function(){
    //Zone Routes
    Route::resource('zones', ZonesController::class);
    //Regions Routes
    Route::resource('regions', RegionsController::class);

    //vue js api route for fetching reagions after selecting zones
    Route::get('territories/zones/{id}/regions',[RegionsController::class, 'fetchRegions']);
    //vue js api route for fetching zone from regions
    Route::get('regions/{id}/zone', [RegionsController::class, 'fetchZone']);

    //territory Routes
    Route::resource('territories', TerritoriesController::class);

});
