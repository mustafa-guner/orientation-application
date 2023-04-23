
@extends('layouts.master')
@section("title","Login")

@section("content")

<div class="card rounded-3 p-4 my-5">
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
            <div class="card custom-card mt-5 p-3">
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
                    <div class="col-md-6 col-sm-12">
                        <div class="card custom-card mb-4 rounded-2">
                            <div class=" p-3 d-flex justify-content-between">
                                <h4 class="card-title fw-bold">{{$restaurant->name}}</h4>
                                <p class="rounded-5 bg-success text-white px-2"><small>{{$restaurant->is_open == 1 ? "Available" : "Not Available"}}</small></p>
                            </div>
                            <div class="card-body">
                                <img class="rounded-2 w-100 h-100" src="{{ url('restaurant_images/'.$restaurant->profile_image)}}" alt="">
                                <p class="card-description mt-2">
                                    {{$restaurant->description?$restaurant->description : "-"}}
                                </p>
                                <div class="row">
                                    <div class="col-3">
                                        <p class="my-0">City</p>
                                        <small class="text-gray">{{$restaurant->city}}</small>
                                    </div>
                                    <div class="col-3">
                                        <p class="my-0">Outdoor</p>
                                        <small class="text-gray">{{$restaurant->has_outdoor == 1 ? "Yes" : "No"}}</small>
                                    </div>
                                    <div class="col-3">
                                        <p class="my-0">Indoor</p>
                                        <small class="text-gray">Yes</small>
                                    </div>
                                    <div class="col-3">
                                        <p class="my-0">Phone No</p>
                                        <small class="text-gray">+{{$restaurant->phone_no}}</small>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-primary btn-sm text-right w-100 mt-3">
                                        Book Now
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



@stop
