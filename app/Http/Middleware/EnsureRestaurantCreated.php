<?php

namespace App\Http\Middleware;

use App\Models\Restaurant;
use App\Models\User;
use App\Models\UserType;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureRestaurantCreated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->user_type_id == UserType::RESTAURANT_OWNER){
            $isRestaurantCreated =  Restaurant::where("owner_id",'=',Auth::user()->user_id)->first();
            if($isRestaurantCreated == null){
                return redirect(RouteServiceProvider::RESTAURANT_CREATION);
            }
            return $next($request);
        }
        return redirect(RouteServiceProvider::HOME);
    }
}
