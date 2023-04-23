<nav class="navbar navbar-expand-lg py-3 navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{url("/")}}">Reservation<span class="text-danger">Book</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>

            <ul class="navbar-nav mb-2 mb-lg-0">
                @auth

                    @if(auth()->user()->user_type_id == \App\Models\UserType::RESTAURANT_OWNER)
                        <li class="nav-item">
                            <a class="nav-link" href="{{url("/restaurant/my-restaurant")}}">My Restaurant</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{url("/logout")}}">Logout <i class="bi bi-box-arrow-right"></i></a>
                    </li>
                @endauth

                @guest

                    <li class="nav-item mt-1">
                        <a class="btn rounded-5 px-4 btn-sm btn-primary " aria-current="page" href="{{url("/login")}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url("/register")}}">Register</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
