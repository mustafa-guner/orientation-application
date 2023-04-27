<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantRequest;
use App\Models\City;
use App\Models\Reservation;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function create(){
        $cities = City::all();
        return view("restaurant.create",compact("cities"));
    }

    public function show(){
        $restaurant = auth()->user()->restaurant;
        return view("restaurant.show",compact("restaurant"));
    }

    public function edit($restaurant_id){
        $restaurant = Restaurant::where("restaurant_id",'=',$restaurant_id)->first();
        $cities = City::all();
        return view("restaurant.edit",compact("restaurant","cities"));
    }

    public function getRestaurantByID($restaurant_id){

        $restaurant = Restaurant::where("restaurant_id",'=',$restaurant_id)->first();
        if(!$restaurant) abort(404);

        try{
            if (request()->wantsJson()) {
                return response()->json(["success"=>true,"restaurant"=>$restaurant]);
            }

            return view("restaurant.index",compact("restaurant"));
        }catch(\Exception $exception){

            if (request()->wantsJson()) {
                return response()->json(["success" => false, "message" => $exception->getMessage()]);
            }
            return redirect()->back()->with("error",["message"=>$exception->getMessage()]);
        }
    }

    /**
     * @return false|string
     */
    public function fetch(){
        $restaurants = Restaurant::all();
        return json_encode($restaurants);
    }

    public function createRestaurant(RestaurantRequest $request){
        try{
            $profile_image = null;
            if(request()->hasfile("profile_image")){
                $profile_image = time().'_restaurant_image_'.'.'.request()->profile_image->getClientOriginalExtension();
                request()->profile_image->move(public_path('restaurant_images'), $profile_image);
            }

            $requestBody = $request->validated();
            $requestBody["owner_id"] = auth()->user()->user_id;
            $requestBody["profile_image"] = $profile_image;
            $requestBody["has_outdoor"] == "on" ? $requestBody["has_outdoor"] = 1 : $requestBody["has_outdoor"] = 0;
            $requestBody["has_indoor"] == "on" ? $requestBody["has_indoor"] = 1 : $requestBody["has_indoor"] = 0;

            //Create Restaurant
            Restaurant::create($requestBody);
            return redirect()->route("myRestaurant");
        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->back()->with("errors","Restaurant could not be created.");
        }
    }
}
