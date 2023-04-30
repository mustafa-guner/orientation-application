<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantRequest;
use App\Http\Requests\RestaurantUpdateRequest;
use App\Models\City;
use App\Models\Menu;
use App\Models\News;
use App\Models\Reservation;
use App\Models\Restaurant;
use App\Models\Status;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function create(){
        $cities = City::all();
        return view("restaurant.create",compact("cities"));
    }

    public function show(Request $request){
        $restaurant = auth()->user()->restaurant;
        $reservations = Reservation::where("restaurant_id","=",$restaurant->restaurant_id)->count();
        $confirmed_reservations = Reservation::where("restaurant_id","=",$restaurant->restaurant_id)->where("status_id","=",Status::CONFIRMED)->count();
        $pending_reservations = Reservation::where("restaurant_id","=",$restaurant->restaurant_id)->where("status_id","=",Status::PENDING)->count();
        $rejected_reservations = Reservation::where("restaurant_id","=",$restaurant->restaurant_id)->where("status_id","=",Status::REJECTED)->count();

        $result = [
            "restaurant"=>$restaurant,
            "reservations"=>$reservations,
            "confirmed_reservations"=>$confirmed_reservations,
            "pending_reservations"=>$pending_reservations,
            "rejected_reservations"=>$rejected_reservations
        ];

        //If there is query search params for editing news
        if($request->query("news")){
            $news = News::where("news_id","=",intval($request->query("news")))->first();

            if(!$news) $result["error"] = "News could not be found";
            else $result["news"] = $news;

            return view("restaurant.show")->with($result);
        }

        return view("restaurant.show")->with($result);
    }

    public function edit($restaurant_id){
        $restaurant = Restaurant::where("restaurant_id",'=',$restaurant_id)->first();
        $cities = City::all();
        return view("restaurant.edit",compact("restaurant","cities"));
    }

    public function update(RestaurantUpdateRequest $request,$restaurant_id){
        try{
            $restaurant = Restaurant::where("restaurant_id",'=',$restaurant_id)->first();
            if(!$restaurant) abort(404);

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
            $requestBody["updated_at"] = now();

            //Update Restaurant
            $restaurant->update($requestBody);
            return redirect()->route("myRestaurant")->with("success","Restaurant is updated");
        }catch(\Exception $e){
            return redirect()->back()->with("errors","Restaurant could not be updated.");
        }
    }

    public function getRestaurantByID($restaurant_id){

        $restaurant = Restaurant::with("news")->where("restaurant_id",'=',$restaurant_id)->first();
        $menu = Menu::where("restaurant_id","=",$restaurant_id)->latest()->first();
        if(!$restaurant) abort(404);

        try{
            if (request()->wantsJson()) {
                return response()->json(["success"=>true,"restaurant"=>$restaurant]);
            } else{
                return view("restaurant.index",compact("restaurant","menu"));
            }
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
            return redirect()->back()->with("errors","Restaurant could not be created.");
        }
    }
}
