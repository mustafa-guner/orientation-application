
@extends('layouts.master')
@section("title","Login")
<style>
    .modal-body header {
        background-color: #ff6633;
        color: #fff;
        text-align: center;
        padding: 10px;
    }
    .modal-body h1 {
        font-size: 3rem;
        margin: 0;
    }
    .modal-body nav {
        background-color: #333;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
    }
    .modal-body nav a {
        color: #fff;
        text-decoration: none;
        margin: 0 10px;
    }
    .modal-body section {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 10px;
    }
    .modal-body section img {
        max-width: 70%;
        width: 100%;
        height: auto;
        border-radius: 9px;
        margin: 20px 0;
    }

</style>
@section("content")
   <div class="container">
       <div class="card rounded-3 px-4 py-2 my-5">
           @if(session("error"))
               <div class="alert alert-danger" role="alert">
                   {{session("error")}}
               </div>
           @endif
           <div class="d-flex justify-content-end p-3">
               <a class="btn btn-secondary" href="{{url("/")}}">Back</a>
           </div>
           <div class="row my-5">
               <div class="col-md-3 col-sm-12">
                   <img style="width:300px;height:300px;border: 1px solid gray;object-fit: cover;" class="rounded-3 align-self-start" src="{{url("restaurant_images/".$restaurant->profile_image)}}"/>
                   <div class="my-4">
                       <ul class="list-group">
                           <li class="list-group-item">Website: @if($restaurant->website_link)  <a class="link-primary" href="{{$restaurant->website_link}}" target="_blank">{{$restaurant->website_link}}</a> @else -@endif </li>
                           <li class="list-group-item">Facebook: @if($restaurant->facebook_link)  <a class="link-primary" href="{{$restaurant->facebook_link}}" target="_blank">{{$restaurant->facebook_link}}</a> @else -@endif </li>
                           <li class="list-group-item">Instagram: @if($restaurant->instagram_link)  <a class="link-primary" href="{{$restaurant->instagram_link}}" target="_blank">{{$restaurant->instagram_link}}</a> @else -@endif </li>
                           <li class="list-group-item text-success fw-bold">Currently Open</li>
                       </ul>
                       <button  data-target-id="{{ $restaurant->restaurant_id }}" class="btn btn-primary btn-sm text-right w-100 mt-3" data-bs-toggle="modal" data-bs-target="#reservation-modal" data-bs-whatever="@mdo">Book Now</button>
                   </div>
               </div>
               <div class="col-md-9 col-sm-12">
                   <div class="row">
                       <div class="col-md-10">

                           <h2 class="fw-bold ">{{$restaurant->name}}</h2>
                           <div class="col-md-12 col-sm-12 mx-auto">
                               <div class="row mt-3">
                                   <div class="col-md-12 col-sm-12 mx-auto ">
                                       <ul class="nav nav-tabs">
                                           <li class="nav-item">
                                               <a class="nav-link active" data-toggle="tab" href="#tab1">About</a>
                                           </li>
                                           <li class="nav-item">
                                               <a class="nav-link " data-toggle="tab" href="#tab2">News</a>
                                           </li>
                                           <li class="nav-item">
                                               <a class="nav-link" data-toggle="tab" href="#tab3">Menu</a>
                                           </li>
                                       </ul>
                                       <div class="row my-3 mx-auto">
                                           <div class="tab-content">
                                               <div id="tab1" class="tab-pane fade show active">
                                                   <div class="row mt-3">
                                                       <div class="col-md-12 col-sm-12 ">
                                                           <div class="row my-3 ">
                                                               <div class="col-12">
                                                                   <h6 class="fw-bold">Description</h6>
                                                                   <p>{{$restaurant->description == null ? "-" : $restaurant->description}}</p>
                                                               </div>
                                                           </div>
                                                           <div class="row  mt-3 ">
                                                               <div class="col-md-4 col-sm-6">
                                                                   <h6 class="fw-bold">Email</h6>
                                                                   <p>{{$restaurant->email == null ? "-" : $restaurant->email}}</p>
                                                               </div>
                                                               <div class="col-md-3 col-sm-6">
                                                                   <h6 class="fw-bold">Phone No</h6>
                                                                   <p>{{$restaurant->phone_no == null ? "-" : $restaurant->phone_no}}</p>
                                                               </div>
                                                               <div class="col-md-2 col-sm-6">
                                                                   <h6 class="fw-bold">City</h6>
                                                                   <p>{{$restaurant->city->name}}</p>
                                                               </div>
                                                               <div class="col-md-3 col-sm-6">
                                                                   <h6 class="fw-bold">Indoor/Outdoor</h6>
                                                                   <p>{{$restaurant->has_indoor ==  1 ? "Yes" : "No"}} / {{$restaurant->has_outdoor == 1 ?"Yes":"No"}}</p>
                                                               </div>
                                                           </div>
                                                           <div class="row  mt-3 ">
                                                               <div class="col-md-12 col-sm-6">
                                                                   <h6 class="fw-bold">Address</h6>
                                                                   <p>{{$restaurant->address == null ? "-" : $restaurant->address}}</p>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div id="tab2" class="tab-pane fade">
                                                   <div class="row mt-2">
                                                       <div class="col-md-12 col-sm-12 mx-auto ">
                                                           <div class="row">
                                                            @if($restaurant->news && count($restaurant->news) > 0)
                                                              @foreach($restaurant->news as $news)
                                                                  <div class="card px-2 py-2 my-3 col-12">
                                                                      <div class="card-header ">
                                                                          <h4 class="fw-bold">{{$news->title}}</h4>
                                                                          <small><span class="fw-bold">Created At: </span>{{$news->created_at}}</small>
                                                                      </div>
                                                                      <div class="card-body">
                                                                          <div>
                                                                              <img src="{{url("thumbnail_images/$news->thumbnail_image")}}" class="w-100 h-50 mx-auto" alt="">
                                                                          </div>
                                                                      </div>
                                                                      <div class="card-footer">
                                                                          <h5>Description</h5>
                                                                          @php echo htmlspecialchars_decode($news->description) @endphp
                                                                      </div>
                                                                  </div>
                                                                   @endforeach
                                                               @else
                                                                <h3 class="text-muted text-center">No News Found</h3>
                                                               @endif

                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>

                                               <div id="tab3" class="tab-pane fade">
                                                   <div class="row mt-2">
                                                       <div class="col-md-12 col-sm-12 mx-auto ">

                                                           @if(isset($menu) && $menu->menu_image != null)
                                                           <img style="" class="rounded w-100 h-100" src="{{url("menu_images/")."/".$menu->menu_image}}" alt="">
                                                            @else
                                                            <h3 class="text-muted text-center">No Menu Uploaded</h3>
                                                           @endif
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>

               </div>
           </div>
       </div>
   </div>

   <div class="modal fade" id="reservation-modal" tabindex="-1" aria-labelledby="reservation-modal" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Book Your Table <span id="restaurant_name"></span></h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body" id="modal-body">
                   <form>
                       <div class="row mb-3">
                           <div class="col-6">
                               <label for="reservation_date" class="col-form-label">Reservation Date/Time:</label>
                               <input required type="datetime-local" class="form-control" id="reservation_date">
                           </div>
                           <div class="col-6">
                               <label for="people_no" class="col-form-label">Number Of People:</label>
                               <input required type="number" class="form-control" id="people_no">
                           </div>
                       </div>
                       <div class="mb-3">
                           <label for="door" class="col-form-label">Indoor/Outdoor</label>
                           <select required id="door" name="door" class="form-control">
                               <option>Please Select</option>
                           </select>
                       </div>
                       <div class="mb-3">
                           <label for="comment" class="col-form-label">Comment:</label>
                           <textarea name="comment" class="form-control" id="comment"></textarea>
                       </div>

                   </form>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                   <button id="createReservation" type="button" class="btn btn-primary">Submit</button>
               </div>
           </div>
       </div>
   </div>




   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script>

        $(document).ready(function () {

            $(".alert-danger").delay(5000).fadeOut('slow');


            //Create new reservation modal
            $("#reservation-modal").on("show.bs.modal", function (e) {
                const restaurant_id = $(e.relatedTarget).data('target-id');
                $.ajax({
                    type:"GET",
                    url:`{{url("restaurant/")}}/${restaurant_id}`,
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                }).done(function (result){
                    if(result.success){
                        const door = $("#door");
                        const restaurant = result.restaurant;
                        door.html(`
                     ${restaurant.has_indoor ? '<option value="in_door">Indoor</option>': ''}
                     ${restaurant.has_outdoor ?  '<option value="out_door">Outdoor</option>':''}
                `)
                    }
                })

                $("#createReservation").on("click",function (){
                    $.ajax({
                        url: `{{url("reservation/")}}/${restaurant_id}`,
                        type:"POST",
                        data:{
                            '_token': "{{ csrf_token() }}",
                            'reservation_date':$("#reservation_date").val(),
                            'users_no':$("#people_no").val(),
                            'door':$("#door").val(),
                            'comment':$("#comment").val(),
                        }
                    }).done(function(result){
                        if(result.success){
                            return Swal.fire(
                                'Success!',
                                'Reservation request has been sent!',
                                'success'
                            )
                        }
                    }).fail(function (err){
                        const failed_result = JSON.parse(err.responseText);
                        const errors = failed_result.errors;
                        const errorMessage = Object.keys(errors).map(err=>errors[err])[0].join("")
                        return Swal.fire(
                            'error',
                            errorMessage,
                            'error'
                        )
                    })
                })
            });

        });

    </script>

@stop
