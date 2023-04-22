@extends('layouts.master')
@section("title","Login")

@section("content")
    <h1>Login</h1>
    @include('layouts.partials.messages')
    <a href="{{url("/register")}}">Register</a>
    <hr>
    <div>
        <form action="{{url("/login")}}" method="POST">
            {{ csrf_field() }}
            <div>
                <label for="email">
                    Email
                </label> <br>
                <input type="email" name="email" id="email" placeholder="Enter Email">
                @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter password" id="password">
                @if ($errors->has('password'))
                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <button type="submit">login</button>
        </form>
    </div>

@stop

