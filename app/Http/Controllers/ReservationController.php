<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertReservationRequest;
use App\Jobs\SendEmailJob;
use App\Models\Reservation;
use App\Models\Restaurant;
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
           $reservation = Reservation::create($requestBody);

           //Send Reservation Notification Mail to Restaurant Owner
           $restaurant = Restaurant::with("owner")->where("restaurant_id",'=',$requestBody["restaurant_id"])->first();
           $details["full_name"] =$restaurant->owner->first_name . ' ' . $restaurant->owner->last_name;
           $details["from"] =$reservation->user->first_name . ' ' . $reservation->user->last_name;
           $details["phone_no"] = $reservation->user->phone_no;
           $details['email'] = $restaurant->email;
           $details["restaurant_name"] = $restaurant->name;
           $details["door"] = $reservation->in_door == 1 ? "Indoor" : "Outdoor";
           $details["people"] = $reservation->users_no;
           $details["reservation_date"] =Carbon::parse($reservation->reservation_date)->format('d/m/Y  H:i:s');
           dispatch(new SendEmailJob($details,Status::PENDING));

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
       $reservation = Reservation::with("user","restaurant")->where("reservation_id",'=',$reservation_id)
           ->where("restaurant_id",'=',$restaurant_id)->first();
       try{
            if(!$reservation) abort(404);

            $reservation->status_id = Status::CONFIRMED;

            $reservation->save();

            //Send Reservation Confirmation Mail to User
           $details["full_name"] = $reservation->user->first_name . ' ' .$reservation->user->last_name;
           $details['email'] = $reservation->user->email;
           $details["restaurant_name"] = $reservation->restaurant->name;
           $details["door"] = $reservation->in_door == 1 ? "Indoor" : "Outdoor";
           $details["people"] = $reservation->users_no;
           $details["reservation_date"] =Carbon::parse($reservation->reservation_date)->format('d/m/Y  H:i:s');
           dispatch(new SendEmailJob($details,Status::CONFIRMED));

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

            //Send Reservation Rejection Mail to User
            $details["full_name"] = $reservation->user->first_name . ' ' .$reservation->user->last_name;
            $details['email'] = $reservation->user->email;
            $details["restaurant_name"] = $reservation->restaurant->name;
            $details["reservation_date"] =Carbon::parse($reservation->reservation_date)->format('d/m/Y  H:i:s');
            dispatch(new SendEmailJob($details,Status::REJECTED));

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
   public function fetch(Request $request){


//       $reservations = Reservation::with("restaurant","user","status")
//           ->where("restaurant_id",auth()->user()->restaurant->restaurant_id)
//           ->orderBy('created_at', 'desc')
//           ->get();

       $status_query = $request->input("status_id");

       //ALTERNATIVE WAY OF JOINING TABLES
      $reservations =  DB::table("reservations")
           ->join("users",'reservations.reserved_by','=','users.user_id')
           ->join("status",'reservations.status_id','=','status.status_id')
           ->join("restaurant","reservations.restaurant_id",'=','restaurant.restaurant_id')
          ->where("restaurant.owner_id","=",auth()->user()->user_id)
          ->select(
               "reservations.*",
               'users.first_name',
               'users.last_name',
               'users.phone_no',
               'users.email',
               'status.title'
           )
           ->orderBy("created_at","desc");

      if($status_query){
          $reservations = $reservations->where("reservations.status_id","=",$status_query);
      }

       return DataTables::of($reservations->get())
           ->addColumn('full_name', function ($reservation) {
             return $reservation->first_name. ' ' . $reservation->last_name;
           })
           ->addColumn('phone_no', function ($reservation) {
               return $reservation->phone_no;
           })
           ->addColumn("status",function ($reservation){
               return $reservation->title;
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
