
@extends('layouts.master')
@section("title","Login")

@section("content")

<h3>My feed</h3>
    <div>
        <h3>{{$user->first_name}} {{ $user->last_name }}</h3>
        <p>{{$user->phone_no}}</p>
        <p>{{$user->gender->name}}</p>
        <p>{{$user->city->name}}</p>
        <p>{{$user->user_type->title}}</p>
        <p>{{$user->birth_date}}</p>
        <img src="{{$user->profile_image}}" alt="">
        <p>{{$user->email}}</p>
        <p>{{$user->password}}</p>
        <p>{{$user->created_at}}</p>
    </div>

@stop
