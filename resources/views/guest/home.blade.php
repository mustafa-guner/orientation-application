@extends('layouts.master')
@section("title","Home")
<style>
    body{
        background-color: #fff !important;
    }
</style>
@section("content")
<main>
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="bd-placeholder-img h-50 w-100" src="https://chinesehousecyprus.net/img/gallery/1.png" alt="">

                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>Our new interior design.</h1>
                        <p>Better service from the east ambiance.</p>
                        <p><a class="btn btn-lg btn-primary" href="{{url("/register")}}">Sign up today</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="bd-placeholder-img w-100 h-50" src="https://chinesehousecyprus.net/img/gallery/3.png" alt="">

                <div class="container">
                    <div class="carousel-caption">
                        <h1>Renewed Menu.</h1>
                        <p>We renewed our menu and staff you serve you better.</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">

                <img class="bd-placeholder-img h-50 w-100" src="https://chinesehousecyprus.net/img/gallery/4.png" alt="">

                <div class="container">
                    <div class="carousel-caption text-end">
                        <h1>One more for good measure.</h1>
                        <p>Decorations are matter for us to keep east ambiance in peace.</p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">




        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Welcome to Chinese House <span class="text-muted">It’ll blow your mind.</span></h2>
                <p class="lead">Since opening for business in 1990, with over twenty years of experience now, we have been a familiar sight in the area for many years as a leading culinary destination. The kitchen of our restaurant is managed by a celebrated Hong Kong chef, and our restaurant hosts 3 Chinese and a sushi chef who are specialised on their sections. We offer great dining experience in a relaxing environment right in the heart of Kyrenia, North Cyprus.</p>
            </div>
            <div class="col-md-5">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="https://chinesehousecyprus.net/img/hakkimizda.jpg" alt="">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
                <p class="lead">Since opening for business in 1990, with over twenty years of experience now, we have been a familiar sight in the area for many years.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="https://chinesehousecyprus.net/img/gallery/10.png" alt="">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                <p class="lead">By using this application you will be able to book your table all around Cyprus. Enjoy your food!.</p>
            </div>
            <div class="col-md-5">
                <img class="bd-placeholder-img w-100 h-100 bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="{{url("app_images/feed.png")}}" alt="">
            </div>
        </div>

        <hr class="featurette-divider">



    </div><!-- /.container -->
</main>
@stop
