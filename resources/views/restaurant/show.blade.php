
@extends('layouts.master')
@section("title","Register")
@section("content")
    <h1>{{$restaurant->name}}</h1>
    <hr>
    <div>
        <h5>Description</h5>
    </div>
    <p>{{$restaurant->description == null ? "-" : $restaurant->description}}</p>

    <div>
        <h5>Email</h5>
    </div>
    <p>{{$restaurant->email == null ? "-" : $restaurant->email}}</p>

    <div>
        <h5>Phone No</h5>
    </div>
    <p>{{$restaurant->phone_no == null ? "-" : $restaurant->phone_no}}</p>

    <div>
        <h5>City</h5>
    </div>
    <p>{{$restaurant->city_id}}</p>

    <div>
        <h5>Has Outdoor</h5>
    </div>
    <p>{{$restaurant->has_outdoor ==  1 ? "Yes" : "No"}}</p>


    <div>
        <h5>Is Open</h5>
    </div>
    <p>{{$restaurant->is_open == 1 ? "Open" : "Closed"}}</p>
@stop

