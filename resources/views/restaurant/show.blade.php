
@extends('layouts.master')
@section("title","Register")
@section("content")
    <div class="row mt-5">
        <div class="card">
            <div class="col-12 text-center p-3">
                <div class="d-flex flex-column align-items-center">
                    <div class=" text-center mx-auto" style="width: 120px;height: 120px;border-radius: 100%; overflow: hidden; border: 2px solid #ced4da;">
                        <img class="w-100 h-100" src="{{ url('restaurant_images/'.$restaurant->profile_image)}}" alt="">
                    </div>
                    <p class="rounded-5 mb-0 mt-2 {{$restaurant->is_open == 1 ? "bg-success" : "bg-danger"}} px-3 text-white">{{$restaurant->is_open == 1 ? "Open" : "Closed"}}</p>
                    <h3 class="px-3 my-2 fw-bold">{{$restaurant->name}}</h3>
                </div>
                <hr>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12 mx-auto ">
                        <div class="row my-3 mx-auto px-5">
                           <div class="col-12">
                               <h6 class="fw-bold">Description</h6>
                               <p>{{$restaurant->description == null ? "-" : $restaurant->description}}</p>
                           </div>
                        </div>
                        <div class="row px-5 mt-5 mx-auto">
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
                                <p>{{$restaurant->city->name}}</p>
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

                <div class="mt-2 mb-5 p-5">
                    <table id="reservations_table" class=" mt-0 table table-bordered data-table">
                        <caption>Reservations</caption>
                        <thead>
                        <tr>
                            <th>Reserved By</th>
                            <th>Contact No</th>
                            <th># of People</th>
                            <th>Indoor/Outdoor</th>
                            <th>Comment</th>
                            <th>Reservation Date</th>
                            <th>Status</th>
                            <th>Action(s)</th>
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

        let table;
        $(function () {
             table = $('#reservations_table').DataTable({
                lengthChange:false,
                autoWidth: false,
                processing: true,
                serverSide: true,
                ajax:{
                  url:"{{url("reservation")}}/{{$restaurant->restaurant_id}}",
                  type:"GET",
                },
                columns: [
                     {data: 'full_name',name:'full_name',searchable: true,width:"10%"},
                     {data: 'phone_no', name: 'phone_no',width: "10%"},
                     {data: 'users_no',width:"10%"},
                     {data: 'door',name:"door"},
                     {data:"comment",defaultContent:"-",width: "25%"},
                     {data: 'reservation_date', orderable: true, searchable: true},
                     {data:"status",searchable: true},
                     {data:null, render: function(data,type,full,meta)
                         {
                             return `<span class="btn-group">
                                   <button ${Boolean(data.status_id == {{\App\Models\Status::CONFIRMED}}) ? "disabled" : ""} onclick="confirmReservation(${data.reservation_id},${data.restaurant_id})" class="btn btn-sm btn-success"><i class="fa-solid fa-check"></i></button>
                                   <button ${Boolean(data.status_id == {{\App\Models\Status::REJECTED}}) ? "disabled" : ""} onclick="rejectReservation(${data.reservation_id},${data.restaurant_id})" href="javascript:;" class="btn btn-sm text-white btn-warning"><i class="fa-solid fa-ban"></i></button>
                                   <button onclick="rejectReservation(${data.reservation_id},${data.restaurant_id})" class="btn btn-sm text-white btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </span>`;
                         }
                     }
                ]
            });
        });

        function updateDataTable(){
            table.ajax.reload();

        }

        function fireAreYouSureModal(text,confirmBtnText){
            return Swal.fire({
                title: 'Are you sure?',
                text: text,
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#005C4B',
                confirmButtonText: confirmBtnText
            })
        }

        function confirmReservation(reservation_id,restaurant_id){
            return fireAreYouSureModal("You are going to confirm the reservation","Yes,confirm the reservation").then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type:"POST",
                        url:"{{url("reservation/confirm")}}/"+reservation_id + "/restaurant/"+restaurant_id,
                        data:{
                            '_token': "{{ csrf_token() }}",
                        }
                    }).done(function(result){
                        if(result.success){
                            Swal.fire(
                                'Confirmed!',
                                result.message,
                                'success'
                            )
                            updateDataTable();
                        } else{
                            return Swal.fire(
                                'error',
                                result.message,
                                'error'
                            )
                        }
                    })
                }
            })
        }

        function rejectReservation(reservation_id,restaurant_id){
            return fireAreYouSureModal("You are going to reject the reservation","Yes,reject the reservation").then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type:"POST",
                        url:"{{url("reservation/reject")}}/"+reservation_id + "/restaurant/"+restaurant_id,
                        data:{
                            '_token': "{{ csrf_token() }}",
                        }
                    }).done(function(result){
                        if(result.success){
                            Swal.fire(
                                'Rejected!',
                                result.message,
                                'success'
                            )
                            updateDataTable();
                        } else{
                            return Swal.fire(
                                'error',
                                result.message,
                                'error'
                            )
                        }
                    })
                }
            })
        }
    </script>
@stop

