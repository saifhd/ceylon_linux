<?php

use App\Http\Controllers\Admin\RegionsController;
use App\Http\Controllers\Admin\TerritoriesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ZonesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\Admin\ProductsController;
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

    Route::group(['middleware'=>'admin'],function(){
        //Zone Routes
        Route::resource('zones', ZonesController::class);
        //Regions Routes
        Route::resource('regions', RegionsController::class);

        //vue js api route for fetching reagions after selecting zones
        Route::get('territories/zones/{id}/regions',[RegionsController::class, 'fetchRegions']);
        //vue js api route for fetching zone from regions
        Route::get('regions/{id}/zone', [RegionsController::class, 'fetchZone']);
        //vue js api route for fetching territories from regions
        Route::get('regions/{id}/territories', [RegionsController::class, 'fetchTerritories']);

        //territory Routes
        Route::resource('territories', TerritoriesController::class);

        //UsersController Routes
        Route::get('users', [UsersController::class,'index'])->name('users.index');
        Route::get('users/create', [UsersController::class, 'create'])->name('users.create');
        Route::post('users', [UsersController::class, 'store'])->name('users.store');

        //Products Route
        Route::get('products', [ProductsController::class,'index'])->name('products.index');
        Route::get('products/create', [ProductsController::class, 'create'])->name('products.create');
        Route::post('products', [ProductsController::class, 'store'])->name('products.store');

    });


    //orders - purchase
    Route::group(['middleware'=>'destributor'],function(){
        Route::get('orders/create',[OrdersController::class,'create'])->name('orders.create');
        Route::post('orders', [OrdersController::class, 'store'])->name('orders.store');
    });
    Route::get('orders/{id}',[OrdersController::class, 'show'])->name('orders.show');
    Route::get('orders', [OrdersController::class, 'index'])->name('orders.index');



});
