<nav>
    <ul>
        @auth
            <li>
                <a href="/">
                    news
                </a>
            </li>
            <li>
                <a href="/">
                    reservations
                </a>
            </li>
            <li>
                <a href="{{url("/logout")}}">
                    logout
                </a>
            </li>
        @endauth


            @guest
            <li>
                <a href="{{url("/login")}}">
                    login
                </a>
            </li>
            <li>
                <a href="{{url("/register")}}">
                    register
                </a>
            </li>
            @endguest
    </ul>
</nav>
