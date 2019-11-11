<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="#">Delectable</a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#admin-top-nav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="admin-top-nav">
        <!-- Links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" id="notification-dropdown" href="#" data-toggle="dropdown"><i class="fas fa-bell"></i><span class="ml-2 d-lg-none">Notifications</span></a>
                <div class="dropdown-menu dropdown-primary dropdown-menu-right">
                    <a class="dropdown-item" href="#">Notification 1</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="message-dropdown" href="#" data-toggle="dropdown"><i class="fas fa-envelope"></i><span class="ml-2 d-lg-none">Messages</span></a>
                <div class="dropdown-menu dropdown-primary dropdown-menu-right">
                    <a class="dropdown-item" href="#">Message 1</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link" id="profile-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i><span class="ml-2">Admin Name</span></a>
                <div class="dropdown-menu dropdown-primary dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
            </li>
        </ul>
        <!-- Links -->
        {{-- 
        <form class="form-inline">
            <div class="md-form my-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            </div>
        </form>
        --}}
    </div>
    <!-- Collapsible content -->
</nav>
<!--/.Navbar-->