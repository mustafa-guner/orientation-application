@extends('layouts.master')
@section("title","Register")

@section("content")

    <div class="row my-5">

        <div class="col-md-7 mt-md-1 mt-sm-4 col-sm-12">
            <h1>Register</h1>
            <p>Do you have already account? <a href="{{url("/login")}}">Login</a></p>
            <hr>
            <div>
                <form action="{{url("/register")}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <label class="label fw-bold" for="first_name">
                                First Name
                            </label>
                            <input type="text" name="first_name" class="form-control" value="Mustafa" id="first_name" placeholder="Enter Firstname" required>
                            @if ($errors->has('first_name'))
                                <span class="text-danger text-left">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="fw-bold" for="last_name">Surname</label>
                            <input type="text" name="last_name" value="Guner" class="form-control" placeholder="Enter Lastname" id="last_name" required>
                            @if ($errors->has('last_name'))
                                <span class="text-danger text-left">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-md-6 col-sm-12">
                            <label class="label fw-bold" for="email">Email</label>
                            <input required type="email" class="form-control" name="email" value="test@outlook.com" placeholder="Enter Email" id="email">
                            @if ($errors->has('email'))
                                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="fw-bold" for="password">Password</label>
                            <input type="password" name="password" class="form-control" value="asdf1234" placeholder="Enter Password" id="password" required>
                            @if ($errors->has('password'))
                                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="row my-2">
                        <div class="col-md-6 col-sm-12">
                            <label class="fw-bold" for="birth_date">Date of Birth</label>
                            <input required class="form-control" type="date" name="birth_date"  id="birth_date">
                            @if ($errors->has('birth_date'))
                                <span class="text-danger text-left">{{ $errors->first('birth_date') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="fw-bold" for="city_id">City</label>
                            <select class="form-control" required id="city_id" name="city_id">
                                <option value="">Please Select</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->city_id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('city_id'))
                                <span class="text-danger text-left">{{ $errors->first('city_id') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <label class="fw-bold" for="profile_image">Profile Image</label>
                            <input required type="file" class="form-control" name="profile_image"  id="profile_image">
                            @if ($errors->has('profile_image'))
                                <span class="text-danger text-left">{{ $errors->first('profile_image') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-md-6 col-sm-12">
                            <label class="fw-bold" for="phone_no">Phone No</label>
                            <input class="form-control" required type="text" name="phone_no" value="5338673755"  id="phone_no">
                            @if ($errors->has('phone_no'))
                                <span class="text-danger text-left">{{ $errors->first('phone_no') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="account_type" class="fw-bold">
                                Account type
                            </label>
                            <select class="form-control w-100" id="account_type" name="user_type_id" required>
                                <option class="w-100">Please select</option>
                                @foreach($userTypes as $userType)
                                    <option class="w-100 form-control" value="{{$userType->user_type_id}}">{{$userType->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class=" my-2">
                        <div class="fw-bold">Gender</div>
                        @foreach($genders as $gender)
                            <label for="{{$gender->gender_id}}_gender">
                                {{$gender->name}}
                                <input required id="{{$gender->gender_id}}_gender" type="radio" name="gender_id" value="{{$gender->gender_id}}"/>
                            </label>
                        @endforeach
                        @if ($errors->has('gender_id'))
                            <span class="text-danger text-left">{{ $errors->first('gender_id') }}</span>
                        @endif
                    </div>

                    <button class="btn btn-sm btn-primary" type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
@stop

