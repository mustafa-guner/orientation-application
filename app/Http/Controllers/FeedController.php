<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{

    public function myFeed(){
        $user = auth()->user();
        $restaurants = Restaurant::all();
        return view("feed.index",compact("user","restaurants"));
    }
}
