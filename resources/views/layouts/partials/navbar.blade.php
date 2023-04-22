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
                <a href="/">
                    login
                </a>
            </li>
            <li>
                <a href="/">
                    register
                </a>
            </li>
            @endguest
    </ul>
</nav>
