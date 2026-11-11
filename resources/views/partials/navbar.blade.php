
<nav class="navigation navbar navbar-expand-md navbar-dark">
    <button class="navbar-toggler" type="button"
        data-toggle="collapse"
        data-target="#navbarsExample04"
        aria-controls="navbarsExample04"
        aria-expanded="false"
        aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="room.html">Our room</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="gallery.html">Gallery</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="blog.html">Blog</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
            </li>

            @if (Route::has('login'))
                @auth

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"
                           href="#"
                           id="userDropdown"
                           role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false">

                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="userDropdown">

                            <a class="dropdown-item" href="{{ route('profile.show') }}">
                                My Profile
                            </a>

                            <div class="dropdown-divider"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="dropdown-item text-danger">
                                    Logout
                                </button>
                            </form>

                        </div>
                    </li>

                @else

                    <li class="nav-item mr-2">
                        <a class="btn btn-success" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="btn btn-primary" href="{{ route('register') }}">
                                Registration
                            </a>
                        </li>
                    @endif

                @endauth
            @endif

        </ul>
    </div>
</nav>
