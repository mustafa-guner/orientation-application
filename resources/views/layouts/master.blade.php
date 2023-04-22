<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservation App - @yield('title')</title>
</head>
<body>

@include('layouts.partials.navbar')

<div class="container">
    @yield('content')
</div>

@include("layouts.partials.footer")

<script></script>
</body>
</html>
