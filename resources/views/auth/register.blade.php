@extends('layouts.master')
@section("title","Register")

@section("content")
    <h1>Register</h1>
    <hr>
    <div>
        <form action="{{url("/register")}}">
            <div>
                <label for="p_firstname">
                    First Name
                </label> <br>
                <input type="text" name="p_firstname" id="p_firstname" placeholder="Enter Firstname">
            </div>
            <div>
                <label for="p_surname">Password</label>
                <input type="text" name="p_surname" placeholder="Enter Lastname" id="p_surname">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Enter Email" id="email">
            </div>
            <div>
                <label for="p_image">Profile Image</label>
                <input type="file" name="p_image"  id="p_image">
            </div>
            <div>
                <label for="p_gender">Gender</label>
                <input type="radio" name="p_gender_id" value="female"/>Female
                <input type="radio" name="p_gender_id" value="male"/>Male
                <input type="radio" name="p_gender_id" value="other">Other
            </div>
            <div>
                <label for="p_city_id">Profile Image</label>
                <select id="p_city_id" name="p_city_id">
                    <option>Please Select</option>
                    <option>Nicosia</option>
                    <option>Famagusta</option>
                    <option>Kyrenia</option>
                    <option>Morphou</option>
                </select>

            </div>
            <button>register</button>
        </form>
    </div>
@stop

