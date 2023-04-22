@extends('layouts.master')
@section("title","Register")

@section("content")
    <h1>Register</h1>
    <a href="{{url("/login")}}">Login</a>
    <hr>
    <div>
        <form action="{{url("/register")}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div>
                <label for="first_name">
                    First Name
                </label> <br>
                <input type="text" name="first_name" value="Mustafa" id="first_name" placeholder="Enter Firstname">
                @if ($errors->has('first_name'))
                    <span class="text-danger text-left">{{ $errors->first('first_name') }}</span>
                @endif
            </div>
            <div>
                <label for="last_name">Surname</label>
                <input type="text" name="last_name" value="Guner" placeholder="Enter Lastname" id="last_name">
                @if ($errors->has('last_name'))
                    <span class="text-danger text-left">{{ $errors->first('last_name') }}</span>
                @endif
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" value="asdf1234" placeholder="Enter Password" id="password">
                @if ($errors->has('password'))
                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" name="email" value="test@outlook.com" placeholder="Enter Email" id="email">
                @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div>
                <label for="profile_image">Profile Image</label>
                <input type="file" name="profile_image"  id="profile_image">
                @if ($errors->has('profile_image'))
                    <span class="text-danger text-left">{{ $errors->first('profile_image') }}</span>
                @endif
            </div>
            <div>
                <label for="birth_date">Date of Birth</label>
                <input type="date" name="birth_date"  id="birth_date">
                @if ($errors->has('birth_date'))
                    <span class="text-danger text-left">{{ $errors->first('birth_date') }}</span>
                @endif
            </div>
            <div>
                <label for="phone_no">Phone No</label>
                <input type="text" name="phone_no" value="5338673755"  id="phone_no">
                @if ($errors->has('phone_no'))
                    <span class="text-danger text-left">{{ $errors->first('phone_no') }}</span>
                @endif
            </div>
            <div>
                <div>Gender</div>
                @foreach($genders as $gender)
                    <label for="{{$gender->gender_id}}_gender">
                        {{$gender->name}}
                        <input id="{{$gender->gender_id}}_gender" type="radio" name="gender_id" value="{{$gender->gender_id}}"/>
                    </label>
                @endforeach
                @if ($errors->has('gender_id'))
                    <span class="text-danger text-left">{{ $errors->first('gender_id') }}</span>
                @endif
            </div>
            <div>
                <label for="city_id">City</label>
                <select id="city_id" name="city_id">
                    <option value="">Please Select</option>
                    @foreach($cities as $city)
                        <option value="{{$city->city_id}}">{{$city->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('city_id'))
                    <span class="text-danger text-left">{{ $errors->first('city_id') }}</span>
                @endif
            </div>
            <button type="submit">register</button>
        </form>
    </div>
@stop

