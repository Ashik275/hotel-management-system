<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{ asset('admin/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">

    <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
        <a href="{{ route('home') }}">
            <i class="icon-home"></i> Home
        </a>
    </li>

    <li class="{{ request()->routeIs('create_room', 'view_room') ? 'active' : '' }}">

        <a href="#exampledropdownDropdown"
           aria-expanded="{{ request()->routeIs('create_room', 'view_room') ? 'true' : 'false' }}"
           data-toggle="collapse">
            <i class="icon-windows"></i> Hotel Room
        </a>

        <ul id="exampledropdownDropdown"
            class="collapse list-unstyled {{ request()->routeIs('create_room', 'view_room') ? 'show' : '' }}">

            <li class="{{ request()->routeIs('create_room') ? 'active' : '' }}">
                <a href="{{ route('create_room') }}">Add Room</a>
            </li>

            <li class="{{ request()->routeIs('view_room') ? 'active' : '' }}">
                <a href="{{ route('view_room') }}">View Room</a>
            </li>

            <li>
                <a href="#">Page</a>
            </li>

        </ul>
    </li>

</ul>
</nav>