<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReservationController;
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

//Email Send Test Route
Route::get('email-test', function(){
    $details['email'] = 'mustafa-guner.guner@outlook.com';
    $details["from"] = "From Name";
    $details["phone_no"] = "5338783855";
    $details["full_name"] ="Test Test";
    $details["restaurant_name"] = "Test Restaurant";
    $details["door"] = "Indoor";
    $details["people"] = 3;
    $details["reservation_date"] =Carbon::parse(now())->format('d/m/Y  H:i:s');
    dispatch(new App\Jobs\SendEmailJob($details,0));
    dd('done');
});

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
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

        /**
         * Feed Routes
         */
        Route::get("/",[FeedController::class,"myFeed"])->name("feed");

        /**
         * Restaurant Routes
         */
        Route::get("/restaurant/fetch",[RestaurantController::class,"fetch"]);
        Route::get("/restaurant/create-restaurant",[RestaurantController::class,"create"]);
        Route::post("/restaurant/create-restaurant",[RestaurantController::class,"createRestaurant"]);
        Route::group(["middleware"=>['ensure_restaurant_created']],function (){
            Route::get("/restaurant/my-restaurant",[RestaurantController::class,"show"])->name("myRestaurant");
        });

        Route::post("/reservation/{restaurant_id}",[ReservationController::class,"create"]);

        /**
         * Reservation DataTable Actions
         */
        Route::get("reservation/my-reservations",[ReservationController::class,"myReservations"]);
        Route::get("/reservation/{restaurant_id}",[ReservationController::class,"fetch"]);
        Route::post("/reservation/confirm/{reservation_id}/restaurant/{restaurant_id}",[ReservationController::class,"confirm"]);
        Route::post("/reservation/reject/{reservation_id}/restaurant/{restaurant_id}",[ReservationController::class,"reject"]);
        Route::delete("/reservation/remove/{reservation_id}/restaurant/{restaurant_id}",[ReservationController::class,"remove"]);

        /**
         * Logout Routes
         */
        Route::get('/logout', [AuthController::class,"logout"]);
    });
});





