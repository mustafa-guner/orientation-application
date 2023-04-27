
@extends('layouts.master')
@section("title","Login")

@section("content")
    <div class="card row mt-5 p-3">
        <div class="d-flex justify-content-center justify-content-sm-end p-2">
            <a class="btn btn-secondary mx-1" href="{{url("/restaurant/my-restaurant")}}">Back</a>
        </div>
        <h3>Edit Your Restaurant</h3>
        <hr>
        <div class="col-md-7 mt-md-1 mt-sm-4 col-sm-12">
            <div>
                <form method="POST" action="{{url("restaurant/edit-restaurant")}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <label class="fw-bold" for="name">
                                Restaurant Name
                                <span class="text-danger">*</span>
                            </label>
                            <input class="form-control" type="text" name="name" value="{{$restaurant->name}}" id="name" required>
                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label  class="fw-bold" for="profile_image">
                                Profile Image
                                <span class="text-danger">*</span>
                            </label>
                            <input class="form-control" type="file" name="profile_image" id="profile_image" required>
                            @if ($errors->has('profile_image'))
                                <span class="text-danger text-left">{{ $errors->first('profile_image') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12">
                            <label  class="fw-bold" for="description">
                                Description <span class="text-danger">*</span>
                            </label>
                            <br>
                            <small>Tell us about your business</small>
                            <textarea required class="form-control" id="description" name="description">{{$restaurant->description}}</textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-md-6 col-sm-12">
                            <label class="fw-bold" for="email">
                                Email
                            </label>
                            <br>
                            <small>What is your business mail?</small>
                            <input class="form-control" required type="email" value="{{$restaurant->email}}" name="email" id="email" >
                            @if ($errors->has('email'))
                                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <label  class="fw-bold" for="city_id">Location</label>
                            <br>
                            <small>Where is your business located at?</small>

                            <select class="form-control" required id="city_id" name="city_id">
                                <option value="">Please Select</option>
                                @foreach($cities as $city)
                                    <option {{$restaurant->city_id == $city->id ? "selected" : ""}} value="{{$city->city_id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('city_id'))
                                <span class="text-danger text-left">{{ $errors->first('city_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-md-6 col-sm-12">
                            <label  class="fw-bold" for="phone_no">
                                Business Phone No <span class="text-danger">*</span>
                            </label>
                            <input required class="form-control" type="text" value="{{$restaurant->phone_no}}" name="phone_no" id="phone_no" />
                            @if ($errors->has('phone_no'))
                                <span class="text-danger text-left">{{ $errors->first('phone_no') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label  class="fw-bold" for="phone_no_2">
                                Business Phone No 2
                            </label>
                            <input class="form-control" type="text" value="{{$restaurant->phone_no_2}}" name="phone_no_2" id="phone_no_2" />
                            @if ($errors->has('phone_no_2'))
                                <span class="text-danger text-left">{{ $errors->first('phone_no_2') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-md-6 col-sm-12">
                            <label for="has_outdoor"  class="fw-bold col-md-6 col-sm-12">
                                Outdoor Option
                            </label>
                            <br>
                            <small>Does your business have outside seating?</small>
                            <br>
                            <input {{$restaurant->has_outdoor ? "checked" : ""}} type="checkbox" name="has_outdoor" id="has_outdoor">
                            @if ($errors->has('has_outdoor'))
                                <span class="text-danger text-left">{{ $errors->first('has_outdoor') }}</span>
                            @endif

                        </div>

                        <div class="col-md-6 col-sm-12">
                            <label for="has_indoor" class="fw-bold col-md-6 col-sm-12">
                                Indoor Option
                            </label>
                            <br>
                            <small>Does your business have inside seating?</small>
                            <br>
                            <input {{$restaurant->has_indoor ? "checked" : ""}} type="checkbox" name="has_indoor" id="has_indoor">
                            @if ($errors->has('has_indoor'))
                                <span class="text-danger text-left">{{ $errors->first('has_indoor') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-12">
                            <label  class="fw-bold" for="address">
                                Full Address <span class="text-danger">*</span>
                            </label>
                            <br>
                            <small>Enter full address of your business</small>
                            <textarea required class="form-control" id="address" name="address">{{$restaurant->address}}</textarea>
                            @if ($errors->has('address'))
                                <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                    </div>

                    <h5 class="mt-4">Social Links (Optional)</h5>
                    <div class="row my-2">
                        <div class="col-md-6 col-sm-12">
                            <label  class="fw-bold" for="website_link">
                                Website Link
                            </label>
                            <input class="form-control" type="text" value="{{$restaurant->website_link}}" name="website_link" id="website_link" />
                            @if ($errors->has('website_link'))
                                <span class="text-danger text-left">{{ $errors->first('website_link') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label  class="fw-bold" for="facebook_link">
                                Facebook Link
                            </label>
                            <input class="form-control" type="text" value="{{$restaurant->facebook_link}}" name="facebook_link" id="facebook_link" />
                            @if ($errors->has('facebook_link'))
                                <span class="text-danger text-left">{{ $errors->first('facebook_link') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6 mt-2 col-sm-12">
                            <label  class="fw-bold" for="instagram_link">
                                Instagram Link
                            </label>
                            <input class="form-control" type="text" value="{{$restaurant->instagram_link}}" name="instagram_link" id="instagram_link" />
                            @if ($errors->has('instagram_link'))
                                <span class="text-danger text-left">{{ $errors->first('instagram_link') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="my-4">
                        <button class="btn btn-sm btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
