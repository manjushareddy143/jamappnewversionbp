<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title>JAM - Dashboard</title>
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/ruang-admin.css') }}" rel="stylesheet" type="text/css">
</head>

<body id="page-top">
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon">
                <img src="{{ asset('img/logo/logo2.png') }}">
            </div>
            <div class="sidebar-brand-text mx-3">
                <img src="{{ asset('img/logo/jam-logo.png') }}">
            </div>
        </a>
        <hr class="sidebar-divider my-0">

        <li class="nav-item active">
            <a class="nav-link" href="home">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        @if (Auth::user()->roles[0]->slug == 'admin-admin')




            <li class="nav-item">
                <a id="nav-id" class="nav-link collapsed" data-toggle="collapse" data-target="#collapsePage"
                   aria-expanded="true"
                   aria-controls="collapsePage">
                    <i class="fas fa-user"></i>
                    <span>Users</span>
                </a>
                <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="/users">Organisations</a>
                        <a class="collapse-item" href="/vendors">Vendors</a>
                        <a class="collapse-item" href="/customer">Customers</a>
                    </div>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="/services">
                    <i class="fas fa-users"></i>
                    <span>Services</span>
                </a>
            </li>
        @elseif (Auth::user()->roles[0]->slug == 'organisation-admin')

        @elseif (Auth::user()->roles[0]->slug == 'provider')

        @elseif (Auth::user()->roles[0]->slug == 'customer')

        @endif


        <li class="nav-item">
            <a class="nav-link" href="/orders">
                <i class="fas fa-users"></i>
                <span>Orders</span>
            </a>
        </li>


    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- TopBar -->
            <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                 <!-- Language Dropdown -->
                            <div class="col-md-2">
                            <div class="dropdown custom">
                                <button class="dropbtn">Language</button>
                                <div class="dropdown-content">
                                 <option value="english"><a href="locale/en">
                                <img src="{{asset('img/en.png')}}" alt="" style="width: 20px;height: 10px;">English</a></option>
                    <a href="locale/ar"><img src="{{asset('img/ar.png')}}" alt="" style="width: 20px;height: 10px;"> Arabic</a>
                                </div>
                            </div>
                            </div>
                            
                            <!-- Language Dropdown -->

                <ul class="navbar-nav ml-auto">
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <img class="img-profile rounded-circle" id="profile_img" src="{{ asset('img/boy.png') }}"
                                 style="max-width: 60px">

                            <span class="ml-2 d-none d-lg-inline text-white small" id="user_name">Maman Ketoprak</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout

                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{--                      localStorage.removeItem('key')--}}
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- Topbar -->

            <!-- Container Fluid-->
            <div class="container-fluid" id="container-wrapper">
                @yield('content')
            </div>
            <!---Container Fluid-->
        </div>
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
            <span>© 2020 JAM.
            </span>
                </div>
            </div>
        </footer>
        <!-- Footer -->
    </div>
</div>


<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


<script>
    var hideShow = 0;
    function clickCollaps() {

        console.log("clickCollaps()" + hideShow)

        // $('#collapseTable').removeClass('collapse', '');
        if(hideShow == 0) {
            hideShow = 1;


        } else {
            hideShow =0;
            $('#nav-id').removeClass('nav-link');
            $('#nav-id').addClass('nav-link collapsed')
            $("#collapseTable").addClass('collapse hide');

            // $("#collapseTable").addClass('class', 'collapse');

        }

    }
    window.onload = function () {
        // console.log('retrievedObject: ');
        var retrievedObject = localStorage.getItem('userObject');
        var obj = JSON.parse(retrievedObject);

        $('#user_name').text(obj.first_name);
        if (obj.image) {
            $('#profile_img').attr("src", obj.image);
        } else {
            $('#profile_img').attr("src", '{{ URL::asset('/img/boy.png') }}')
            //{{asset('img/boy.png')}});
        }
        //currentuser = JSON.parse(retrievedObject);
         //   console.log(currentuser.roles[0].name);

    }
</script>
</body>
</html>


<style>
    .dropbtn {
        background-color: #0aa698;;
        color: white;
        padding: 4px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }
    .col-md-2 {
        padding-left: 820px;
    }
    .dropdown {
        position: relative;
        display: inline-block;
        /*margin-right: 100px;*/
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }
</style>
