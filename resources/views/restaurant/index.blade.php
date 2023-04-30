
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
   <div class="container">
       <div class="card rounded-3 px-4 py-2 my-5">
           @if(session("error"))
               <div class="alert alert-danger" role="alert">
                   {{session("error")}}
               </div>
           @endif
           <div class="d-flex justify-content-end p-3">
               <a class="btn btn-secondary" href="{{url("/")}}">Back</a>
           </div>
           <div class="row my-5">
               <div class="col-md-3 col-sm-12">
                   <img style="width:300px;height:300px;border: 1px solid gray;object-fit: cover;" class="rounded-3 align-self-start" src="{{url("restaurant_images/".$restaurant->profile_image)}}"/>
                   <div class="my-4">
                       <ul class="list-group">
                           <li class="list-group-item">Website: @if($restaurant->website_link)  <a class="link-primary" href="{{$restaurant->website_link}}" target="_blank">{{$restaurant->website_link}}</a> @else -@endif </li>
                           <li class="list-group-item">Facebook: @if($restaurant->facebook_link)  <a class="link-primary" href="{{$restaurant->facebook_link}}" target="_blank">{{$restaurant->facebook_link}}</a> @else -@endif </li>
                           <li class="list-group-item">Instagram: @if($restaurant->instagram_link)  <a class="link-primary" href="{{$restaurant->instagram_link}}" target="_blank">{{$restaurant->instagram_link}}</a> @else -@endif </li>
                           <li class="list-group-item text-success fw-bold">Currently Open</li>
                           <button class="btn btn-sm btn-primary my-2 text-right">Book Now</button>
                       </ul>
                   </div>
               </div>
               <div class="col-md-9 col-sm-12">
                   <div class="row">
                       <div class="col-md-10">

                           <h2 class="fw-bold ">{{$restaurant->name}}</h2>
                           <div class="col-md-12 col-sm-12 mx-auto">
                               <div class="row mt-3">
                                   <div class="col-md-12 col-sm-12 mx-auto ">
                                       <ul class="nav nav-tabs">
                                           <li class="nav-item">
                                               <a class="nav-link active" data-toggle="tab" href="#tab1">About</a>
                                           </li>
                                           <li class="nav-item">
                                               <a class="nav-link " data-toggle="tab" href="#tab2">News</a>
                                           </li>
                                           <li class="nav-item">
                                               <a class="nav-link" data-toggle="tab" href="#tab3">Menu</a>
                                           </li>
                                       </ul>
                                       <div class="row my-3 mx-auto">
                                           <div class="tab-content">
                                               <div id="tab1" class="tab-pane fade show active">
                                                   <div class="row mt-3">
                                                       <div class="col-md-12 col-sm-12 ">
                                                           <div class="row my-3 ">
                                                               <div class="col-12">
                                                                   <h6 class="fw-bold">Description</h6>
                                                                   <p>{{$restaurant->description == null ? "-" : $restaurant->description}}</p>
                                                               </div>
                                                           </div>
                                                           <div class="row  mt-3 ">
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
                                                           <div class="row  mt-3 ">
                                                               <div class="col-md-12 col-sm-6">
                                                                   <h6 class="fw-bold">Address</h6>
                                                                   <p>{{$restaurant->address == null ? "-" : $restaurant->address}}</p>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div id="tab2" class="tab-pane fade">
                                                   <div class="row mt-2">
                                                       <div class="col-md-12 col-sm-12 mx-auto ">
                                                           <div class="row">
                                                            @if($restaurant->news && count($restaurant->news) > 0)
                                                              @foreach($restaurant->news as $news)
                                                                  <div class="card px-2 py-2 my-3 col-12">
                                                                      <div class="card-header ">
                                                                          <h4 class="fw-bold">{{$news->title}}</h4>
                                                                          <small><span class="fw-bold">Created At: </span>{{$news->created_at}}</small>
                                                                      </div>
                                                                      <div class="card-body">
                                                                          <div>
                                                                              <img src="{{url("thumbnail_images/$news->thumbnail_image")}}" class="w-100 h-50 mx-auto" alt="">
                                                                          </div>
                                                                      </div>
                                                                      <div class="card-footer">
                                                                          <h5>Description</h5>
                                                                          @php echo htmlspecialchars_decode($news->description) @endphp
                                                                      </div>
                                                                  </div>
                                                                   @endforeach
                                                               @else
                                                                <h3 class="text-muted text-center">No News Found</h3>
                                                               @endif

                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>

                                               <div id="tab3" class="tab-pane fade">
                                                   <div class="row mt-2">
                                                       <div class="col-md-12 col-sm-12 mx-auto ">

                                                           @if(isset($menu) && $menu->menu_image != null)
                                                           <img style="" class="rounded w-100 h-100" src="{{url("menu_images/")."/".$menu->menu_image}}" alt="">
                                                            @else
                                                            <h3 class="text-muted text-center">No Menu Uploaded</h3>
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
