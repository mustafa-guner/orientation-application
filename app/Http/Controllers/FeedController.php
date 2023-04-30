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
        $search = $request->input("q");

        if($request->filled("city_id")){
            $query->where("city_id","=",$request->input("city_id"));
        }

        else if($search){
            $query->where("name",'like','%'.$search.'%');
        }

        $restaurants = $query->get();

        return view("feed.index",compact("user","restaurants","cities"));
    }

    public function search(Request $request){
        try{

            $query = $request->input("q");
            $user = auth()->user();
            $restaurants = Restaurant::where("name",'like','%'.$query.'%')->get();
            $cities = City::all();
            return view("feed.index",compact("restaurants","cities","user"));
        }catch(\Exception $exception){
            return redirect()->back()->with("error",$exception->getMessage());
        }
    }
}
