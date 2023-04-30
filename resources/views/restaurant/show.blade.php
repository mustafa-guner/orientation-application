
@extends('layouts.master')
@section("title","My Restaurant")
@section("content")
    <div class="container">
        <div class="row mt-5 p-3 card">
            @if(session("error"))
                <div class="alert alert-danger" role="alert">
                    {{session("error")}}
                </div>
            @endif

            @if(session("success"))
                <div class="alert alert-success" role="alert">
                    {{session("success")}}
                </div>
            @endif
            <div class="d-flex justify-content-center justify-content-sm-end p-2">
                <a class="btn btn-secondary  mx-1" href="{{url("/")}}">Back</a>
            </div>
            <div class="col-12 text-center p-3">
                <div class="d-flex flex-column align-items-center">
                    <a class="text-secondary" href="{{url("restaurant/$restaurant->restaurant_id")}}/edit"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                    <div class=" text-center mx-auto" style="width: 120px;height: 120px;border-radius: 100%; overflow: hidden; border: 2px solid #ced4da;">
                        <img class="w-100 h-100" src="{{ url('restaurant_images/'.$restaurant->profile_image)}}" alt="">
                    </div>
                    <p class="rounded-5 mb-0 mt-2 {{$restaurant->is_open == 1 ? "bg-success" : "bg-danger"}} px-3 text-white">{{$restaurant->is_open == 1 ? "Open" : "Closed"}}</p>
                    <h3 class="px-3 my-2 fw-bold">{{$restaurant->name}}</h3>
                </div>

            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12 mx-auto">
                        <ul class="nav nav-tabs justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab1">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab2">Reservations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " data-toggle="tab" href="#tab3">News</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab4">Menu</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane fade show active">
                                <div class="row mt-3">
                                    <div class="col-md-12 col-sm-12 mx-auto">
                                        <div class="row my-3 mx-auto px-5">
                                            <div class="col-12">
                                                <h6 class="fw-bold">Description</h6>
                                                <p>{{$restaurant->description == null ? "-" : $restaurant->description}}</p>
                                            </div>
                                        </div>
                                        <div class="row px-5 mt-3 mx-auto">
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
                                    <div class="d-flex flex-column justify-content-center my-5 mx-auto px-4">
                                        <div class="row px-5">
                                            <div class="col-md-3 p-4 bg-primary bg-gradient text-white col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="d-flex justify-content-between">
                                                            <h4 class="fw-bold">x{{$reservations}}</h4>
                                                            <p>Total Reservations</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12 ">
                                                        <button class="btn btn-sm btn-primary">See Details</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 p-4 bg-info bg-gradient text-white  col-sm-12" >
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="d-flex justify-content-between">
                                                            <h4 class="fw-bold">x{{$pending_reservations}}</h4>
                                                            <p>Pending</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 ">
                                                        <button class="btn btn-sm btn-info text-white">See Details</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3  p-4 bg-success bg-gradient text-white  col-sm-12" >
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="d-flex justify-content-between">
                                                            <h4 class="fw-bold">x{{$confirmed_reservations}}</h4>
                                                            <p>Confirmed</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12 ">
                                                        <button class="btn btn-sm btn-success">See Details</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 p-4 bg-danger bg-gradient text-white  col-sm-12" >
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="d-flex justify-content-between">
                                                            <h4 class="fw-bold">x{{$rejected_reservations}}</h4>
                                                            <p>Rejected</p>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6 col-sm-12 ">
                                                        <button class="btn btn-sm btn-danger">See Details</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab2" class="tab-pane fade">
                                <div class="row mt-3">
                                    <div class="col-md-12 col-sm-12 mx-auto ">
                                        <div class="mx-auto row my-3 px-5">
                                            <div class=" mb-5">
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
                            </div>
                            <div id="tab3" class="tab-pane fade">
                                <div class="row mt-3">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="row mx-5">
                                            <div class="col-12">
                                                @if(isset($news))

                                                    <a class="my-2 btn btn-sm btn-success" href="{{url("restaurant/my-restaurant#tab3")}}">Create new</a>

                                                    <form id="updateNews" method="POST" action="{{url("news/$restaurant->restaurant_id/$news->news_id/update")}}" enctype="multipart/form-data">
                                                        @else
                                                            <form id="createNews" method="POST" action="{{url("news/$restaurant->restaurant_id/create")}}" enctype="multipart/form-data">
                                                                @endif
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="col-md-6  my-2 col-sm-12">
                                                            <label class="fw-bold" for="news_title">News Title</label>
                                                            <input id="news_title" value="{{isset($news) ? $news->title : ""}}" name="title" required class="form-control" type="text" placeholder="Enter news title" >
                                                        </div>
                                                        <div class="col-md-6 my-2 col-sm-12">
                                                            <label class="fw-bold" for="thumbnail_image">News Thumbnail</label>
                                                            <input required class="form-control" name="thumbnail_image" id="thumbnail_image" type="file">
                                                        </div>
                                                    </div>
                                                    <div class="row  my-4">
                                                        <div class="col-12">
                                                            <label for="news_description" class="fw-bold">News Content</label>
                                                            <textarea id="news_description" name="news_description" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row my-4">
                                                        <div class="col-2">
                                                            <button type="submit" class="btn btn-primary btn-sm">{{isset($news) ? "Save" : "Create"}}</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 mx-auto ">
                                        <div class="mx-auto row my-3 px-5">
                                            <div class=" mb-5">
                                                <table id="news_table" class=" mt-0 table table-bordered data-table">
                                                    <caption>News</caption>
                                                    <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th>Thumbnail</th>
                                                        <th>Created At</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab4" class="tab-pane fade">
                                <div class="row mt-2">
                                    <div class="col-md-12 col-sm-12 mx-auto ">
                                        <form id="uploadMenu" method="POST" class="form" action="{{url("menu/$restaurant->restaurant_id/create")}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row mx-auto px-5">
                                                <div class="col-md-6 my-2 col-sm-12">
                                                    <label class="fw-bold" for="thumbnail">Menu Thumbnail</label>
                                                    <br>
                                                   <div class="btn-group">
                                                       <input required class="form-control" name="menu_image" id="menu_image" type="file">
                                                       <button type="submit" class="btn btn-sm btn-primary">Upload</button>
                                                   </div>

                                                </div>
                                            </div>

                                        </form>
                                        <div class="mx-auto row my-5 px-5">
                                            <h3>Latest Uploaded Menu</h3>
                                            <div class="col-7">
                                                @if($restaurant->menu)
                                                <img class="w-100 h-100" id="latest_menu">
                                                @else
                                                    <h5 class="text-muted">You haven't upload a menu yet.</h5>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.tiny.cloud/1/iu7ixcj8f6lg1l2279cc0xz5cy5boifbgvigjoinwsselme5/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script>

        let news_table;
        let reservations_table;
        const news = '{{ isset($news) }}';
        const isNewsSet = Boolean(news);
        const editorOptions = {
            selector: '#news_description',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            height: 500,
            resize:false
        }

        const createNewsForm = $("#createNews");
        const updateNewsForm = $("#updateNews");

        $(".alert-danger").delay(5000).fadeOut('slow');
        $(".alert-success").delay(5000).fadeOut('slow');



        $(function () {

            var hash = location.hash.replace(/^#/, '');  // ^ means starting, meaning only match the first hash

            if (hash) {
                $('.nav-tabs a[href="#' + hash + '"]').tab('show');
            }

                // Change hash for page-reload
            $('.nav-tabs a').on('shown.bs.tab', function (e) {
                window.location.hash = e.target.hash;
            })

            function getMenuOnLoad(){
                $.ajax({
                    type:"GET",
                    url:"{{url("menu/$restaurant->restaurant_id/fetch")}}"
                }).done(function (result){
                    if(result.success){
                        var imageUrl = `{{url("menu_images/")}}/${result.menu.menu_image}`;
                        var img = new Image();
                        img.onload = function() {
                            // Set the src property of the img element to the URL of the Image object
                            $("#latest_menu").attr("src", this.src);
                        };
                        img.src = imageUrl;
                    }
                })
            }

            getMenuOnLoad()

            if(isNewsSet){
                $('.nav-tabs a[href="#' + "tab3" + '"]').tab('show');
                tinymce.init({
                    ...editorOptions,
                    setup: function (editor) {
                        editor.on('init', function () {
                            @if(isset($news))
                                editor.setContent(`{!! $news->description !!}`);
                            @endif
                        });
                    }
                });
            } else{
                tinymce.init(editorOptions);
            }

            reservations_table = $('#reservations_table').DataTable({
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
                                   <button ${Boolean(data.status_id == {{\App\Models\Status::REJECTED}}) ? "disabled" : ""} onclick="rejectReservation(${data.reservation_id},${data.restaurant_id})" href="javascript:;" class="btn btn-sm text-white btn-danger"><i class="fa-solid fa-ban"></i></button>
                                </span>`;
                         }
                     }
                ]
            });

 //<button onclick="previewNews()"  class="btn btn-sm btn-success"><i class="fa-solid fa-eye"></i></button>
//  <button onclick="rejectReservation(${data.reservation_id},${data.restaurant_id})" class="btn btn-sm text-white btn-danger"><i class="fa-solid fa-trash"></i></button>

            news_table = $('#news_table').DataTable({
                lengthChange:false,
                autoWidth: false,
                processing: true,
                serverSide: true,
                ajax:{
                    url:"{{url("news/fetch/")}}/{{$restaurant->restaurant_id}}",
                    type:"GET",
                },
                columns: [
                    {data: 'title',searchable: true,width:"10%"},
                    {data: 'description',searchable: true,orderable: true},
                    {data: 'thumbnail_image',width:"10%",searchable: false,orderable: false},
                    {width:"20%",data: 'created_at',searchable: true,orderable: true},
                    {data:null,width:"5%", render: function(data,type,full,meta){
                            return `<span class="btn-group">

                                    <a  href="{{url("restaurant/my-restaurant?news=")}}${data.news_id}" class="btn btn-sm btn-info text-white"><i class="fa-solid fa-pen-to-square"></i></a>
                                   <a onclick="removeNews({{$restaurant->restaurant_id}},${data.news_id})" href="javascript:;" class="btn btn-sm text-white btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </span>`;
                        }
                    }
                ]
            });

            $("#news-modal").on("show.bs.modal", function (e) {
                //Destroy table when opening modal again after closing it (check if it is exists)
                if ($.fn.DataTable.isDataTable($("#news_table"))) {
                    $("#news_table").DataTable().destroy();
                }
                reservations_table = $("#news_table").DataTable({
                    lengthChange:false,
                    autoWidth:false,
                    serverSide:true,
                    processing:true,
                    ajax:{
                        type:"GET",
                        url:"{{url("news/fetch/")."/".$restaurant->restaurant_id}}"
                    },
                    columns:[
                        {data:"title",searchable: true,orderable: true},
                        {data: 'description',searchable: true,orderable: true},
                        {width:'15%',data:"thumbnail_image",orderable: false,searchable: false},
                        {data: 'created_at', orderable: true, searchable: true},
                    ]
                })
            });

            if(updateNewsForm && isNewsSet)
                updateNewsForm.submit(function (e){
                    e.preventDefault();
                    const restaurant_id = {{$restaurant->restaurant_id}};
                    const news_id = '{{ isset($news) ? $news->news_id : ""  }}';

                    const formData = new FormData(this); // create FormData object from form
                    // add file data to FormData object
                    const fileInput = document.getElementById('thumbnail_image');
                    const file = fileInput.files[0];
                    formData.append('thumbnail_image', file);
                    formData.append("title",$("#news_title").val());
                    formData.append("description",tinymce.get('news_description').getContent());
                    // add CSRF token to form data
                    formData.append("_token","{{csrf_token()}}");

                    $.ajax({
                        type:"POST",
                        headers: {
                            'X-CSRF-TOKEN': "{{csrf_token()}}"
                        },
                        url: isNewsSet ? "{{ url('news') }}/" + restaurant_id + "/" + news_id +  "/update" : "",
                        data:formData,
                        processData: false, contentType: false,
                        enctype: 'multipart/form-data',
                        success: function(response) {
                            //Clear the form after creating

                            window.location.href = '{{ url("restaurant/my-restaurant#tab3") }}';
                            Swal.fire(
                                "Success",
                                "News has been updated!",
                                "success"
                            )
                            updateDataTable(news_table)
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                                "Success",
                                "News could not be updated!",
                                "error"
                            )
                        }
                    })
                })

            if(createNewsForm)
                createNewsForm.submit(function (e){
                    e.preventDefault();
                    const restaurant_id = {{$restaurant->restaurant_id}};
                    const formData = new FormData(this); // create FormData object from form
                    // add file data to FormData object
                    const fileInput = document.getElementById('thumbnail_image');
                    const file = fileInput.files[0];
                    formData.append('thumbnail_image', file);
                    formData.append("title",$("#news_title").val());
                    formData.append("description",tinymce.get('news_description').getContent());
                    formData.append("_token","{{csrf_token()}}");
                    // add CSRF token to form data
                    //formData.append('_token','{{csrf_token()}}');
                    $.ajax({
                        type:"POST",
                        headers: {
                            'X-CSRF-TOKEN': "{{csrf_token()}}"
                        },
                        url: "{{ url('news') }}/" + restaurant_id + "/create",
                        data:formData,
                        processData: false, contentType: false,
                        enctype: 'multipart/form-data',
                        success: function(response) {
                            //Clear the form after creating
                            $('#createNews')[0].reset();

                            Swal.fire(
                                "Success",
                                "News has been created!",
                                "success"
                            )
                            updateDataTable(news_table)
                        },
                        error: function(xhr, status, error) {
                            console.log(error)
                            Swal.fire(
                                "Success",
                                "News has been created!",
                                "success"
                            )
                        }
                    })
                })

            $("#uploadMenu").submit(function (e){
                e.preventDefault();
                const restaurant_id = {{$restaurant->restaurant_id}};
                const formData = new FormData(this); // create FormData object from form
                // add file data to FormData object
                const fileInput = document.getElementById('menu_image');
                const file = fileInput.files[0];
                formData.append('menu_image', file);
                formData.append("_token","{{csrf_token()}}");
                // add CSRF token to form data
                //formData.append('_token','{{csrf_token()}}');
                $.ajax({
                    type:"POST",
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    url: "{{ url('menu') }}/" + restaurant_id + "/create",
                    data:formData,
                    processData: false, contentType: false,
                    enctype: 'multipart/form-data',
                    success: function(response) {
                        Swal.fire(
                            "Success",
                            "Menu has been created!",
                            "success"
                        ).then(function(){
                            window.location.reload();
                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error)
                        Swal.fire(
                            "Error",
                            "Menu could not be created!",
                            "error"
                        )
                    }
                })
            })

        });



        function updateDataTable(table){
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
                            updateDataTable(reservations_table);
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
                            updateDataTable(reservations_table);
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
        function removeNews(restaurant_id,news_id){
            fireAreYouSureModal("Are you sure remove the selected news?","Yes,remove it").then(function (result){
                if(result.value){
                    $.ajax({
                        type:"DELETE",
                        url:"{{url("news/")}}" + "/" + restaurant_id + "/" + news_id +"/remove",
                        data:{
                            "_token":"{{csrf_token()}}"
                        }
                    }).done(function (result){
                        if(result.success){
                            Swal.fire(
                                "Success",
                                result.message,
                                "success"
                            )
                            updateDataTable(news_table)
                        } else{
                            Swal.fire(
                                "Failed",
                                "News could not removed",
                                "error"
                            )
                        }
                    }).fail(function (err){
                        const failed_result = JSON.parse(err.responseText);
                        const errors = failed_result.errors;
                        const errorMessage = Object.keys(errors).map(err=>errors[err])[0].join("")
                        return Swal.fire(
                            'error',
                            errorMessage,
                            'error'
                        )
                    })
                }
            })
        }


    </script>
@stop

