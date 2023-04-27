<?php

namespace App\Http\Middleware;

use App\Models\Restaurant;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRestaurantOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $restaurantId = $request->route('restaurant_id');
        $restaurant = Restaurant::findOrFail($restaurantId);

        if ($restaurant->owner_id !== auth()->id()) {
            return redirect('/')->with('error', 'You are not the owner of this restaurant.');
        }

        return $next($request);
    }
}
