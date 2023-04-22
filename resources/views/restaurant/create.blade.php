
@extends('layouts.master')
@section("title","Login")

@section("content")
<h1>Create Your Restaurant Details</h1>
<hr>
    <div>
        <form method="POST" action="{{url("restaurant/create-restaurant")}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div>
                <label for="name">
                    Restaurant Name
                    <input type="text" name="name" id="name" required>
                </label>
                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div>
                <label for="profile_image">
                    Profile Image
                    <input type="file" name="profile_image" id="profile_image" required>
                </label>
                @if ($errors->has('profile_image'))
                    <span class="text-danger text-left">{{ $errors->first('profile_image') }}</span>
                @endif
            </div>
            <div>
                <label for="description">
                    Description
                    <textarea id="description" name="description"></textarea>
                </label>
                @if ($errors->has('description'))
                    <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <div>
                <label for="email">
                    Email
                    <input type="email" name="email" id="email" >
                </label>
                @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div>
                <label for="phone_no">
                    Business Phone No
                    <input type="text" name="phone_no" id="phone_no" >
                </label>
                @if ($errors->has('phone_no'))
                    <span class="text-danger text-left">{{ $errors->first('phone_no') }}</span>
                @endif
            </div>
            <div>
                <label for="city_id">Location</label>
                <br>
                <small>Where is your business located at?</small>
                <br>
                <select required id="city_id" name="city_id">
                    <option value="">Please Select</option>
                    @foreach($cities as $city)
                        <option value="{{$city->city_id}}">{{$city->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('city_id'))
                    <span class="text-danger text-left">{{ $errors->first('city_id') }}</span>
                @endif
            </div>
            <div>
                <label for="has-outdoor">
                   Outdoor Option
                    <br>
                    <small>Does your business have outside seating?</small>
                    <br>
                    <input checked type="checkbox" name="has_outdoor" id="out_door">
                    @if ($errors->has('outdoor'))
                        <span class="text-danger text-left">{{ $errors->first('outdoor') }}</span>
                    @endif
                </label>
            </div>
            <div>
                <label for="is_open">
                   Is Your Business Currently Open?
                    <input checked type="checkbox" name="is_open" id="is_open">
                </label>
                @if ($errors->has('is_open'))
                    <span class="text-danger text-left">{{ $errors->first('is_open') }}</span>
                @endif
            </div>
            <button type="submit">Create my restaurant</button>
        </form>
    </div>
@stop
