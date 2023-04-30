<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class NewsController extends Controller
{
    public function store(NewsRequest $request,$restaurant_id){
        try{
            $thumbnail_image = null;
            if(request()->hasfile("thumbnail_image")){
                $thumbnail_image = time().'_thumbnail_image'.'.'.request()->thumbnail_image->getClientOriginalExtension();
                request()->thumbnail_image->move(public_path('thumbnail_images'), $thumbnail_image);
            }
            $requestBody = $request->validated();
            $requestBody["thumbnail_image"] = $thumbnail_image;
            $requestBody["restaurant_id"]=$restaurant_id;
            //Create news
            $news =  News::create($requestBody);
            //return redirect()->back()->with("success","News created");
            return response()->json(["success"=>true,"news"=>$news]);
        }catch(\Exception $e){
//            return redirect()->back()->with("error","News not created");
           return response()->json(["success"=>false,"message"=>$e->getMessage()]);
        }
    }

    public function edit(NewsRequest $request,$restaurant_id,$news_id){
        try{
            $news = News::where("news_id","=",$news_id)->where("restaurant_id","=",$restaurant_id)->first();
            if(!$news) return response()->json(["success"=>false,"news"=>$news,"message"=>"News is not found"]);

            $thumbnail_image = null;
            if(request()->hasfile("thumbnail_image")){
                $thumbnail_image = time().'_thumbnail_image'.'.'.request()->thumbnail_image->getClientOriginalExtension();
                request()->thumbnail_image->move(public_path('thumbnail_images'), $thumbnail_image);
            }

            $requestBody = $request->validated();
            $requestBody["thumbnail_image"] = $thumbnail_image;

            $news->update($requestBody);
            return response()->json(["success"=>true,"message"=>"News updated successfully"]);
        }catch(\Exception $e){
            return response()->json(["success"=>false,"message"=>$e->getMessage()]);
        }
    }

    public function destroy($restaurant_id,$news_id){
        try{
            $news = News::where("news_id","=",$news_id)->where("restaurant_id","=",$restaurant_id);
            if(!$news) abort(404);
            $news->delete();
            return response()->json(["success"=>true,"message"=>"News removed successfully"]);
        }catch(\Exception $e){
            return response()->json(["success"=>true,"message"=>$e->getMessage()]);
        }
    }

    public function fetch($restaurant_id){
        try{
            $news = News::where("restaurant_id",'=',$restaurant_id);
           return DataTables::of($news)
               ->addColumn("created_at",function ($news){
                   return Carbon::parse($news->created_at)->format('d/m/Y  H:i:s');
               })
               ->make(true);
        }catch(\Exception $e){
            return response()->json(["success"=>false,"message"=>$e->getMessage()]);
        }
    }
}
