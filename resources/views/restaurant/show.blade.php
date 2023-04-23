
@extends('layouts.master')
@section("title","Register")
@section("content")
    <div class="row mt-5">
        <div class="card">
            <div class="col-12 text-center p-3">
                <div class=" text-center mx-auto" style="width: 120px;height: 120px;border-radius: 100%; overflow: hidden; border: 2px solid #ced4da;">
                    <img class="w-100 h-100" src="{{ url('restaurant_images/'.$restaurant->profile_image)}}" alt="">
                </div>
                <h3 class="px-3 my-2 fw-bold">{{$restaurant->name}}</h3>
                <div class="mt-3">
                    <h6>Description</h6>
                </div>
                <p>{{$restaurant->description == null ? "-" : $restaurant->description}}</p>
                <hr>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12 mx-auto text-center">
                        <div class="row mx-auto">
                            <div class="col-md-3 col-sm-6">
                                <h6 class="fw-bold">Email</h6>
                                <p>{{$restaurant->email == null ? "-" : $restaurant->email}}</p>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <h6 class="fw-bold">Phone No</h6>
                                <p>{{$restaurant->phone_no == null ? "-" : $restaurant->phone_no}}</p>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <h6 class="fw-bold">City</h6>
                                <p>{{$restaurant->city_id}}</p>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <h6 class="fw-bold">Indoor/Outdoor</h6>
                                <p>{{$restaurant->has_indoor ==  1 ? "Yes" : "No"}} / {{$restaurant->has_outdoor == 1 ?"Yes":"No"}}</p>
                            </div>

                        </div>
                    </div>
{{--                    <div class="col-2">--}}
{{--                        <h5>Is Open</h5>--}}
{{--                        <p>{{$restaurant->is_open == 1 ? "Open" : "Closed"}}</p>--}}
{{--                    </div>--}}
                </div>

                <div class="my-5">

                    <table class="table table-bordered data-table">
                        <thead>
                        <tr>
                            <th>Reserved By</th>
                            <th>Contact No</th>
                            <th>Number of people (Reserved Seat)</th>
                            <th>Reservation Date</th>
                            <th width="100px">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script>
        $(function () {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,

                columns: [
                    // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    // {data: 'name', name: 'name'},
                    // {data: 'email', name: 'email'},
                    // {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

        });
    </script>
@stop

