<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuInsertRequest;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function create(MenuInsertRequest $request){
        try{
            $menu_image = null;
            if(request()->hasfile("menu_image")){
                $menu_image = time().'_menu_image_'.'.'.request()->menu_image->getClientOriginalExtension();
                request()->menu_image->move(public_path('menu_images'), $menu_image);
            }
            $requestBody = $request->validated();
            $requestBody["restaurant_id"] = auth()->user()->restaurant->restaurant_id;
            $requestBody["menu_image"] = $menu_image;
            $menu = Menu::create($requestBody);
            return response()->json(["success"=>true,"message"=>"Menu is uploaded","menu"=>$menu]);
        }catch(\Exception $exception){
            return response()->json(["success"=>false,"message"=>$exception->getMessage()]);
        }
    }

    public function fetch(){
        try{
            $menu = Menu::where("restaurant_id","=",auth()->user()->restaurant->restaurant_id)->latest()->first();
            if(!$menu)  return response()->json(["success"=>false,"message"=>"No Menu Found"]);
            return response()->json(["success"=>true,"menu"=>$menu]);
        }catch(\Exception $exception){
            return response()->json(["success"=>false,"message"=>$exception->getMessage()]);
        }
    }
}
