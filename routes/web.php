<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\RestaurantController;
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


Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get("/register",[AuthController::class,"registerPage"]);
        Route::post("/register",[AuthController::class,"register"])->name("register");
        /**
         * Login Routes
         */
        Route::get("/login",[AuthController::class,"loginPage"])->name("login");
        Route::post("/login",[AuthController::class,"login"]);

    });

    Route::group(['middleware' => ['auth']], function() {

        Route::get("/",[FeedController::class,"myFeed"])->name("feed");
        Route::get("/restaurant/create-restaurant",[RestaurantController::class,"create"]);
        Route::post("/restaurant/create-restaurant",[RestaurantController::class,"createRestaurant"]);
        Route::group(["middleware"=>['ensure_restaurant_created']],function (){
            Route::get("/restaurant/my-restaurant",[RestaurantController::class,"show"])->name("myRestaurant");
        });

        /**
         * Logout Routes
         */
        Route::get('/logout', [AuthController::class,"logout"]);
    });
});





