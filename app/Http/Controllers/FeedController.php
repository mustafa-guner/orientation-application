<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{

    public function myFeed(Request $request){

        $query = Restaurant::query();
        $user = auth()->user();
        $cities = City::all();

        if($request->has("city_id")){
            $query->where("city_id","=",$request->input("city_id"));
        }

         elseif($request->has("doom")){
            $indoor = $request->input("door") == "in_door";
            $outdoor = $request->input("door") == "out_door";
            if($indoor){
                $query->where("has_indoor",'=',1);
            }
            elseif($outdoor){
                $query->where("has_outdoor",'=',0);
            }
        }

       elseif($request->has("availability")){
            $query->where("is_available","=",$request->input("availability"));
        }

        //Search by name
        elseif ($request->has('restaurant_name')) {
            $query->whereHas('restaurant', function ($query) use ($request) {
                $query->where('name', 'like', '%'.$request->input('restaurant_name').'%');
            });
        }


        $restaurants = $query->get();
        return view("feed.index",compact("user","restaurants","cities"));
    }
}
