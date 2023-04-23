
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
                    <form method="POST">
                        <div class="row">
                            <div class="col-12">
                                <label class="fw-bold" for="">Location</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Please Select</option>
                                </select>
                            </div>
                            <div class="col-12 my-2">
                                <label class="fw-bold" for="">Seats</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Please Select</option>
                                    <option>Indoor</option>
                                    <option>Outdoor</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="fw-bold" for="">Availability</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Please Select</option>
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
                        <img class="mx-auto" style="width:50px; height: 50px; border-radius: 100%" src="{{ url('profile_images/'.$user->profile_image)}}" alt="">
                    </div>

                    <h4 class="text-center py-1">My Profile</h4>
                    <hr>
                    <div class="mb-2">
                        <p class="fw-bold my-0">Full Name</p>
                        {{$user->first_name}} {{ $user->last_name }}
                    </div>
                    <div class="mb-2">
                        <p class="fw-bold my-0">Email</p>
                        {{$user->email}}
                    </div>
                    <div class="mb-2">
                        <p class="fw-bold my-0">Contact</p>
                        +{{$user->phone_no}}
                    </div>
                    <div class="mb-2">
                        <p class="fw-bold my-0">Gender</p>
                        {{$user->gender->name}}
                    </div>
                    <div class="mb-2">
                        <p class="fw-bold my-0">Account Type</p>
                        {{$user->user_type->title}}
                    </div>
                </div>
                <a class="btn btn-sm w-100 btn-success">My Reservations</a>
            </div>
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="row mr-0">
                <div class="col-6">
                    <h3 class="fw-bold">My feed</h3>
                </div>
                <div class="col-md-6 col-sm-12 pr-0">
                    <form class="d-flex btn-group mr-0">
                        <input type="search" class="form-control" placeholder="Searh for restaurant...">
                        <button class="btn btn-primary btn-sm">Search</button>
                    </form>
                </div>
            </div>
            <hr>
            <div class="row">
                @foreach($restaurants as $restaurant)
                    <div id="{{$restaurant->restaurant_id}}" class="col-md-6 col-sm-12">
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
                                        <small class="text-gray">{{$restaurant->city_id}}</small>
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
                                    <button onclick="openModal()" class="btn btn-primary btn-sm text-right w-100 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
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
                        <label for="people_no" class="col-form-label">Indoor/Outdoor</label>
                       <select class="form-control">
                           <option>Please Select</option>
                           <option>Indoor</option>
                           <option>Outdoor</option>
                       </select>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Comment:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>

    <script>
        function openModal(){
            const
            alert("test")
        }
    </script>

@stop
