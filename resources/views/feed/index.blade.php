
@extends('layouts.master')
@section("title","Login")

@section("content")

<div class="card rounded-3 px-4 py-2 my-5">
    <div class="row my-5">
        <div class="col-md-3 col-sm-12">
            <div class="card custom-card mt-5 p-3">
                <div>
                    <h4 class="text-center">Filters</h4>
                    <hr>
                    <form method="GET" action="{{url("")}}">
                        <div class="row">
                            <div class="col-12">
                                <label class="fw-bold" for="">Location</label>
                                <select name="city_id" id="" class="form-control">
                                    <option value="">Please Select</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->city_id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 my-2">
                                <label class="fw-bold" for="">Seats</label>
                                <select name="door" id="" class="form-control">
                                    <option value="">Please Select</option>
                                    <option value="in_door">Indoor</option>
                                    <option value="out_door">Outdoor</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="fw-bold" for="">Availability</label>
                                <select name="availability" id="" class="form-control">
                                    <option value="">Please Select</option>
                                    <option value="1">Available</option>
                                    <option value="0">Not Available</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start mt-2">
                            <button class="btn btn-sm btn-primary" type="submit">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card custom-card my-5 p-3">
                <div>
                    <div class="text-center d-flex justify-content-center">
                        <img class="mx-auto" style="width:50px; height: 50px; border-radius: 100%; border: 2px solid #ced4da;" src="{{ url('profile_images/'.$user->profile_image)}}" alt="">
                    </div>

                    <h4 class="text-center py-1">My Profile</h4>
                    <hr>
                    <div class="mb-2">
                        <p class="fw-bold my-0"><i class="fa-solid fa-user"></i> Full Name</p>
                        {{$user->first_name}} {{ $user->last_name }}
                    </div>
                    <div class="mb-2">
                        <p class="fw-bold my-0"><i class="fa-solid fa-envelope"></i> Email</p>
                        {{$user->email}}
                    </div>
                    <div class="mb-2">
                        <p class="fw-bold my-0"><i class="fa-solid fa-phone"></i> Contact</p>
                        +{{$user->phone_no}}
                    </div>
                    <div class="mb-2">
                        <p class="fw-bold my-0"><i class="fa-solid fa-venus-mars"></i> Gender</p>
                        {{$user->gender->name}}
                    </div>
                    <div class="mb-2">
                        <p class="fw-bold my-0"><i class="fa-solid fa-building"></i> City</p>
                        {{$user->city->name}}
                    </div>
                    <div class="mb-2">
                        <p class="fw-bold my-0"><i class="fa-duotone fa-user-helmet-safety"></i> Account Type</p>
                        {{$user->user_type->title}}
                    </div>
                </div>
                <button id="get-my-reservations-btn" data-bs-toggle="modal" data-bs-target="#my-reservations-modal"  class="btn btn-sm w-100 btn-success">My Reservations</button>
            </div>
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="row mr-0">
                <div class="col-6">
                    <h3 class="fw-bold">My feed</h3>
                </div>
                <div class="col-md-6 col-sm-12 pr-0">
                    <form class="d-flex btn-group mr-0">
                        <input type="search" class="form-control" placeholder="Search for restaurant...">
                        <button class="btn btn-primary btn-sm">Search</button>
                    </form>
                </div>
            </div>
            <hr>
            <div class="row">
                @foreach($restaurants as $restaurant)
                    <div id="my_modal_{{$restaurant->restaurant_id}}" class="col-md-6 col-sm-12">
                        <div class="card custom-card mb-4 rounded-2">
                            <div class=" p-3 d-flex align-items-center justify-content-between">
                                <div>
                                    <h4 class="card-title fw-bold">{{$restaurant->name}}</h4>
                                    <small>{{$restaurant->phone_no}}</small>
                                    @if($restaurant->phone_no_2 != null)
                                        <small>, {{$restaurant->phone_no_2}}</small>
                                    @endif
                                </div>
                                <p class="rounded-5 bg-success text-white px-2"><small>{{$restaurant->is_available == 1 ? "Available" : "Not Available"}}</small></p>
                            </div>
                            <div class="card-body">
                                <img class="rounded-2 w-100 h-100" src="{{ url('restaurant_images/'.$restaurant->profile_image)}}" alt="">
                                <p class="card-description mt-2">
                                    {{$restaurant->description?$restaurant->description : "-"}}
                                </p>
                                <div class="row">
                                    <div class="col-4">
                                        <p class="my-0">City</p>
                                        <small class="text-gray">{{$restaurant->city->name}}</small>
                                    </div>
                                    <div class="col-4">
                                        <p class="my-0">Outdoor</p>
                                        <small class="text-gray">{{$restaurant->has_outdoor == 1 ? "Yes" : "No"}}</small>
                                    </div>
                                    <div class="col-4">
                                        <p class="my-0">Indoor</p>
                                        <small class="text-gray">Yes</small>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button data-target-id="{{ $restaurant->restaurant_id }}" class="btn btn-primary btn-sm text-right w-100 mt-3" data-bs-toggle="modal" data-bs-target="#reservation-modal" data-bs-whatever="@mdo">
                                        Book Table Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="reservation_date" class="col-form-label">Reservation Date:</label>
                        <input type="date" class="form-control" id="reservation_date">
                    </div>
                    <div class="mb-3">
                        <label for="people_no" class="col-form-label">Number Of People:</label>
                        <input type="number" class="form-control" id="people_no">
                    </div>
                    <div class="mb-3">
                        <label for="door" class="col-form-label">Indoor/Outdoor</label>
                       <select id="door" name="door" class="form-control">
                           <option>Please Select</option>
                           <option value="in_door">Indoor</option>
                           <option value="out_door">Outdoor</option>
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

<div class="modal fade bd-example-modal-lg"  id="my-reservations-modal" tabindex="-1" aria-labelledby="my-reservations-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">My Reservations <span id="restaurant_name"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="my_reservations_table" class=" mt-0 table table-bordered data-table">
                    <thead>
                        <th>Restaurant Name</th>
                        <th>Indoor/Outdoor</th>
                        <th>Comment</th>
                        <th>Reservation Date</th>
{{--                        <th>Action Date</th>--}}
                        <th>Status</th>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script>

    $(document).ready(function () {
        //Create new reservation modal
        $("#reservation-modal").on("show.bs.modal", function (e) {
            const restaurant_id = $(e.relatedTarget).data('target-id');
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
                            'Good job!',
                            'You clicked the button!',
                            'success'
                        )
                    }
                }).fail(function (err){
                    const error_message = JSON.parse(err.responseText);
                    return Swal.fire(
                        'error',
                        error_message.message,
                        'error'
                    )
                })
           })
        });

        //My reservations modal
        $("#my-reservations-modal").on("show.bs.modal", function (e) {
            //Destroy table when opening modal again after closing it (check if it is exists)
            if ($.fn.DataTable.isDataTable($("#my_reservations_table"))) {
                $("#my_reservations_table").DataTable().destroy();
            }
            let table = $("#my_reservations_table").DataTable({
                lengthChange:false,
                autoWidth:false,
                serverSide:true,
                processing:true,
                ajax:{
                    type:"GET",
                    url:"{{url("reservation/my-reservations")}}"
                },
                columns:[
                    {data:"restaurant_name",name:"restaurant_name"},
                    {data: 'door',name:"door"},
                    {data:"comment",defaultContent:"-",width: "25%"},
                    {data: 'reservation_date', orderable: true, searchable: true},
                    // {data:"action_at",name:"action_at"},
                    {data:"status",searchable: true},
                ]
            })
        });
    });

</script>

@stop
