
@extends('layouts.master')
@section("title","Login")
<style>
    .modal-body header {
        background-color: #ff6633;
        color: #fff;
        text-align: center;
        padding: 10px;
    }
    .modal-body h1 {
        font-size: 3rem;
        margin: 0;
    }
    .modal-body nav {
        background-color: #333;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
    }
    .modal-body nav a {
        color: #fff;
        text-decoration: none;
        margin: 0 10px;
    }
    .modal-body section {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 10px;
    }
    .modal-body section img {
        max-width: 70%;
        width: 100%;
        height: auto;
        border-radius: 9px;
        margin: 20px 0;
    }

</style>
@section("content")
    <div class="card rounded-3 px-4 py-2 my-5">
        @if(session("error"))
            <div class="alert alert-danger" role="alert">
                {{session("error")}}
            </div>
        @endif
        <div class="row my-5">
            <div class="col-md-3 col-sm-12">
                <img style="width:300px;height:300px;border: 1px solid gray;object-fit: cover;" class="rounded-3 align-self-start" src="{{url("restaurant_images/".$restaurant->profile_image)}}"/>
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="row">
                    <div class="col-md-10">
                        <div class="col-md-3 mx-auto justify-content-center col-sm-12 mb-3 btn-group col-sm-12">
                            <a class="btn btn-secondary" href="{{url("/")}}">Back</a>
                            <button class="btn btn-sm btn-primary text-right">Book Now</button>
                        </div>
                        <h2 class="fw-bold mt-3 ">{{$restaurant->name}}</h2>
                        <hr>
                        <div class="col-md-12 col-sm-12 mx-auto">
                            <div class="row mt-3">
                                <div class="col-md-12 col-sm-12 mx-auto ">
                                    <div class="row my-3 mx-auto">
                                        <div class="col-12">
                                            <h6 class="fw-bold">Description</h6>
                                            <p>{{$restaurant->description == null ? "-" : $restaurant->description}}</p>
                                        </div>
                                    </div>
                                    <div class="row mt-3 mx-auto">
                                        <div class="col-md-4 col-sm-6">
                                            <h6 class="fw-bold">Email</h6>
                                            <p>{{$restaurant->email == null ? "-" : $restaurant->email}}</p>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <h6 class="fw-bold">Phone No</h6>
                                            <p>{{$restaurant->phone_no == null ? "-" : $restaurant->phone_no}}</p>
                                        </div>
                                        <div class="col-md-2 col-sm-6">
                                            <h6 class="fw-bold">City</h6>
                                            <p>{{$restaurant->city->name}}</p>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <h6 class="fw-bold">Indoor/Outdoor</h6>
                                            <p>{{$restaurant->has_indoor ==  1 ? "Yes" : "No"}} / {{$restaurant->has_outdoor == 1 ?"Yes":"No"}}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row px-2 mt-3">
                                <div class="col-md-12 col-sm-12 mx-auto ">
                                    <h4 class="fw-bold">News</h4>
                                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5>First slide label</h5>
                                                    <p>Some representative placeholder content for the first slide.</p>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5>Second slide label</h5>
                                                    <p>Some representative placeholder content for the second slide.</p>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5>Third slide label</h5>
                                                    <p>Some representative placeholder content for the third slide.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script>

        $(document).ready(function () {

            $(".alert-danger").delay(5000).fadeOut('slow');


        });

    </script>

@stop
