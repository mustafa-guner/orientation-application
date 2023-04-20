@extends('layouts.master')
@section("title","Login")

@section("content")
    <h1>Login</h1>
    <hr>
    <div>
        <form action="{{url("/login")}}">
            <div>
                <label for="username">
                    Username
                </label> <br>
                <input type="text" name="username" id="username" placeholder="Enter username">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter password" id="password">
            </div>
            <button>login</button>
        </form>
    </div>

@stop

