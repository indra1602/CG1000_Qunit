<header class="topbar bg-header" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md">
        <div class="navbar-header" data-logobg="skin6">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-brand bg-header">
                <!-- Logo icon -->
                <a href="home">
                    <b class="logo-icon">
                        <!-- Dark Logo icon -->
                        <img src="{{ asset('style/src/assets/images/Len.png') }}" alt="homepage" class="dark-logo" />
                        <!-- Light Logo icon -->
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text text-white">
                        <b alt="homepage">
                            SiLVue - CG1000
                        </b>
                    </span>
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                    class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-right">
                <!-- ============================================================== -->
                <!-- Notification -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link pl-md-3 position-relative" id="restart" href="#">
                        <i class="icon-power text-danger"></i>
                        <span class="ml-2 d-none d-lg-inline-block text-white"><span>Restart</span>
                    </a>
                </li>

                <!-- ============================================================== -->
                <!-- User profile -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user text-danger"></i>
                        <span class="ml-2 d-none d-lg-inline-block text-white"><span>Account</span>
                            <i data-feather="chevron-down"class="svg-icon"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <div class="dropdown-item">
                            <i data-feather="user" class="svg-icon mr-2 ml-1"></i>
                            {{Auth::user()->name}}
                        </div>
                        <div class="dropdown-divider"></div>
                        <!-- <a class="dropdown-item" data-toggle = "modal" href="#changePassword"> -->
                        <a class="dropdown-item" href="{{ url('/user-config') }}">
                            <i data-feather="edit" class="svg-icon mr-2 ml-1"></i>
                            <!-- <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">  -->
                                <!-- @csrf -->
                            <!-- </form> -->
                            Change Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/logout') }}"><i data-feather="log-out"
                                class="svg-icon mr-2 ml-1"></i>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                            Logout
                        </a>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>