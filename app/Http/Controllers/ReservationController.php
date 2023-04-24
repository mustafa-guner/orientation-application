<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertReservationRequest;
use App\Models\Reservation;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * @param InsertReservationRequest $request
     * @param $restaurant_id
     * @return \Illuminate\Http\JsonResponse
     */
   public function create(InsertReservationRequest $request,$restaurant_id){
       try{
           $requestBody = $request->validated();
           $requestBody["in_door"] = $requestBody["door"] == "in_door" ? 1 : 0;
           $requestBody["out_door"] = $requestBody["door"] == "out_door" ? 1 : 0;
           $requestBody["reserved_by"] = auth()->user()->user_id;
           $requestBody["restaurant_id"] = $restaurant_id;
           $requestBody["status_id"] = Status::PENDING;

           //Create reservation
            Reservation::create($requestBody);
           return response()->json(["success"=>true,'data'=>$requestBody]);
       }catch(\Exception $e){
          return response()->json(["success"=>false,'message'=>json_encode($e->getMessage())]);
       }
   }

    /**
     * @param $reservation_id
     * @param $restaurant_id
     * @return \Illuminate\Http\JsonResponse
     */
   public function confirm($reservation_id,$restaurant_id){
       $reservation = Reservation::where("reservation_id",'=',$reservation_id)
           ->where("restaurant_id",'=',$restaurant_id)->first();
       try{
            if(!$reservation) abort(404);

            $reservation->status_id = Status::CONFIRMED;

            $reservation->save();

            return response()->json(["success"=>true,"message"=>"Reservation status updated successfully."]);

       }catch(\Exception $e){
           return response()->json(["success"=>false,"message"=>"Reservation status could not updated.","error"=>$e->getMessage()]);
       }
   }

    /**
     * @param $reservation_id
     * @param $restaurant_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function reject($reservation_id,$restaurant_id){
        try{
            $reservation = Reservation::where("reservation_id",'=',$reservation_id)
                ->where("restaurant_id",'=',$restaurant_id)->first();

            if(!$reservation) abort(404);

            $reservation->status_id = Status::REJECTED;
            $reservation->save();

            return response()->json(["success"=>true,"message"=>"Reservation status updated successfully."]);

        }catch(\Exception $e){
            return response()->json(["success"=>false,"message"=>"Reservation status could not updated."]);
        }
   }

   public function myReservations(){

        $reservations = Reservation::with("restaurant","user","status")
            ->where("reserved_by",'=',auth()->user()->user_id)
            ->orderBy("created_at","desc")
            ->get();

       return DataTables::of($reservations)
           ->addColumn('restaurant_name', function ($reservation) {
               return $reservation->restaurant->name;
           })
           ->addColumn("status",function ($reservation){
               return $reservation->status->title;
           })
           ->addColumn('door', function ($reservation) {
               return $reservation->in_door != 0 ? "Indoor" : "Outdoor";
           })
           ->addColumn("reservation_date",function ($reservation){
               return Carbon::parse($reservation->reservation_date)->format('d/m/Y  H:i:s');
           })
           ->make(true);
   }

    /**
     * @param $restaurant_id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
   public function fetch($restaurant_id){
       $reservations = Reservation::with("restaurant","user","status")
           ->where("restaurant_id",auth()->user()->restaurant->restaurant_id)
           ->orderBy('created_at', 'desc')
           ->get();

       return DataTables::of($reservations)
           ->addColumn('full_name', function ($reservation) {
             return $reservation->user->first_name. ' ' . $reservation->user->last_name;
           })
           ->addColumn('phone_no', function ($reservation) {
               return $reservation->user->phone_no;
           })
           ->addColumn("status",function ($reservation){
               return $reservation->status->title;
           })
           ->addColumn('door', function ($reservation) {
               return $reservation->in_door != 0 ? "Indoor" : "Outdoor";
           })
           ->addColumn("reservation_date",function ($reservation){
               return Carbon::parse($reservation->reservation_date)->format('d/m/Y  H:i:s');
           })
           ->make(true);
   }
}
