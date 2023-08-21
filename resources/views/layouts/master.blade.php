<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title> @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/app-creative.min.css') }}" rel="stylesheet" type="text/css" id="light-style"/>
    <link href="{{ asset('css/app-creative-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <style>
        li {
            list-style-type: none;
        }

        a {
            text-decoration: none;
        }

        div > #apexchartsyj6727wol {
            display: none;
        }
    </style>

</head>
<body class="loading" data-layout="detached"
      data-layout-config='{"layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<!-- Topbar Start -->
<div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="{{ route('edu.home') }}" class="topnav-logo">
                    <span class="topnav-logo-lg">
                        <img src="{{ asset('images/logo-light.png') }}" alt="" height="16">
                    </span>
            <span class="topnav-logo-sm">
                        <img src="{{ asset('images/logo_sm.png') }}" alt="" height="16">
                    </span>
        </a>

        <ul class="list-unstyled topbar-right-menu float-right mb-0">

            <li class="dropdown notification-list d-lg-none">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <i class="dripicons-search noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                    <form class="p-3">
                        <input type="text" class="form-control" placeholder="Search ..."
                               aria-label="Recipient's username">
                    </form>
                </div>
            </li>

            <li class="dropdown notification-list topbar-dropdown d-none d-lg-block">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" id="topbar-languagedrop" href="#"
                   role="button" aria-haspopup="true" aria-expanded="false">
                    @if (Session::get('website_language') == 'vi')
                        <img src="{{ asset('images/flags/vn.png') }}" alt="user-image" class="mr-1" height="12"> <span
                            class="align-middle">Việt Nam</span> <i class="mdi mdi-chevron-down"></i>
                    @else
                        <img src="{{ asset('images/flags/us.jpg') }}" alt="user-image" class="mr-1" height="12"> <span
                            class="align-middle">English</span> <i class="mdi mdi-chevron-down"></i>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu"
                     aria-labelledby="topbar-languagedrop">
                    <!-- item-->
                    <a href="{{ route('change_language', ['en']) }}" class="dropdown-item notify-item">
                        <img src="{{ asset('images/flags/us.jpg') }}" alt="user-image" class="mr-1" height="12"> <span
                            class="align-middle">English</span>
                    </a>

                    <!-- item-->
                    <a href="{{ route('change_language', ['vi']) }}" class="dropdown-item notify-item">
                        <img src="{{ asset('images/flags/vn.png') }}" alt="user-image" class="mr-1" height="12"> <span
                            class="align-middle">Việt Nam</span>
                    </a>
                </div>
            </li>

            <li class="notification-list">
                <a class="nav-link right-bar-toggle" href="javascript: void(0);">
                    <i class="dripicons-gear noti-icon"></i>
                </a>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" id="topbar-userdrop"
                   href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="account-user-avatar">
                                @if (isset(Auth::user()->student->avatar))
                                    <img src="{{ asset('images/students/' . Auth::user()->student->avatar) }}"
                                         alt="user-image" class="rounded-circle">
                                @else
                                    <img src="{{ asset('images/default/meme-meo-like-trong-dau-kho.jpg') }}"
                                         alt="user-image" class="rounded-circle">
                                @endif
                            </span>
                    <span>
                                <span class="account-user-name">{{ Auth::user()->name }}</span>
                                <span class="account-position">{{ __('Role') }}: {{ Auth::user()->role->role }}</span>
                            </span>
                </a>
                <div
                    class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
                    aria-labelledby="topbar-userdrop">
                    <!-- item-->
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>
                    @if (Auth::user()->role->role != '0')
                        <a href="{{ route('edu.students.profile', Auth::user()->student->id) }}"
                           class="dropdown-item notify-item">
                            <i class="mdi mdi-account-circle mr-1"></i>
                            <span>My Account</span>
                        </a>
                    @endif
                    <!-- item-->
                    <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       id="nav_sidebar">
                        <i class="mdi mdi-logout mr-1"></i>
                        <span> {{ __('Logout') }} </span>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </div>
            </li>

        </ul>
        <a class="button-menu-mobile disable-btn">
            <div class="lines">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>
        <div class="app-search dropdown">
            <form>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." id="top-search">
                    <span class="mdi mdi-magnify search-icon"></span>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
            <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
                </div>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="uil-notes font-16 mr-1"></i>
                    <span>Analytics Report</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="uil-life-ring font-16 mr-1"></i>
                    <span>How can I help you?</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="uil-cog font-16 mr-1"></i>
                    <span>User profile settings</span>
                </a>

                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                </div>

                <div class="notification-list">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="media">
                            <img class="d-flex mr-2 rounded-circle" src="assets/images/users/avatar-2.jpg"
                                 alt="Generic placeholder image" height="32">
                            <div class="media-body">
                                <h5 class="m-0 font-14">Erwin Brown</h5>
                                <span class="font-12 mb-0">UI Designer</span>
                            </div>
                        </div>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="media">
                            <img class="d-flex mr-2 rounded-circle" src="assets/images/users/avatar-5.jpg"
                                 alt="Generic placeholder image" height="32">
                            <div class="media-body">
                                <h5 class="m-0 font-14">Jacob Deo</h5>
                                <span class="font-12 mb-0">Developer</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Topbar -->

<!-- Start Content-->
<div class="container-fluid mm-active">

    <!-- Begin page -->
    <div class="wrapper mm-show">

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu left-side-menu-detached mm-active">

            <div class="leftbar-user">
                <a href="javascript: void(0);">
                    @if (isset(Auth::user()->student->avatar))
                        <img src="{{ asset('images/students/' . Auth::user()->student->avatar) }}"
                             alt="user-image" height="42" class="rounded-circle shadow-sm">
                    @else
                        <img src="{{ asset('images/default/meme-meo-like-trong-dau-kho.jpg') }}"
                             alt="user-image" height="42" class="rounded-circle shadow-sm">
                    @endif
                    <span class="leftbar-user-name">{{ Auth::user()->name }}</span>
                </a>
            </div>

            <!--- Sidemenu -->
            <ul class="metismenu side-nav mm-show">

                <li class="side-nav-title side-nav-item">{{ __('Navigation') }}</li>

                <li class="side-nav-item">
                    <a href="javascript: void(0);" class="side-nav-link">
                        <i class="uil-home-alt"></i>
                        <span class="badge badge-success float-right">5</span>
                        <span> {{ __('Dashboards') }}</span>
                    </a>
                    <ul class="side-nav-second-level mm-collapse" aria-expanded="false">
                        @include('layouts.sidebar')
                    </ul>
                </li>
                <li>
                    <a class="side-nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       id="nav_sidebar">
                        <i class="mdi mdi-logout mdi-24px"></i>
                        <span> {{ __('Logout') }} </span>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Left Sidebar End -->

        <div class="content-page">
            <div class="content">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('edu.home') }}">{{ __('Home') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="@yield('action')">@yield('title')</a></li>
                                    <li class="breadcrumb-item active">@yield('subTitle')</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                @yield('home')
                <div class="row">
                    <div class="col-lg-12">
                        @yield('content')
                    </div>
                </div>
            </div> <!-- End Content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            2018 - 2020 © Hyper - Coderthemes.com
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-right footer-links d-none d-md-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div> <!-- content-page -->

    </div> <!-- end wrapper-->
</div>
<!-- END Container -->


<!-- Right Sidebar -->
<div class="right-bar">

    <div class="rightbar-title">
        <a href="javascript:void(0);" class="right-bar-toggle float-right">
            <i class="dripicons-cross noti-icon"></i>
        </a>
        <h5 class="m-0">Settings</h5>
    </div>

    <div class="rightbar-content h-100" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">

                            <div class="p-3">
                                <div class="alert alert-warning" role="alert">
                                    <strong>Customize </strong> the overall color scheme, layout width, etc.
                                </div>

                                <!-- Settings -->
                                <h5 class="mt-3">Color Scheme</h5>
                                <hr class="mt-1">

                                <div class="custom-control custom-switch mb-1">
                                    <input type="radio" class="custom-control-input" name="color-scheme-mode"
                                           value="light" id="light-mode-check" checked="">
                                    <label class="custom-control-label" for="light-mode-check">Light Mode</label>
                                </div>

                                <div class="custom-control custom-switch mb-1">
                                    <input type="radio" class="custom-control-input" name="color-scheme-mode"
                                           value="dark" id="dark-mode-check">
                                    <label class="custom-control-label" for="dark-mode-check">Dark Mode</label>
                                </div>

                                <!-- Width -->
                                <h5 class="mt-4">Width</h5>
                                <hr class="mt-1">
                                <div class="custom-control custom-switch mb-1">
                                    <input type="radio" class="custom-control-input" name="width" value="fluid"
                                           id="fluid-check" checked="">
                                    <label class="custom-control-label" for="fluid-check">Fluid</label>
                                </div>
                                <div class="custom-control custom-switch mb-1">
                                    <input type="radio" class="custom-control-input" name="width" value="boxed"
                                           id="boxed-check">
                                    <label class="custom-control-label" for="boxed-check">Boxed</label>
                                </div>


                                <button class="btn btn-primary btn-block mt-4" id="resetBtn">Reset to Default</button>

                                <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                                   class="btn btn-danger btn-block mt-3" target="_blank"><i
                                        class="mdi mdi-basket mr-1"></i> Purchase Now</a>
                            </div> <!-- end padding-->

                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: auto; height: 492px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar"
                 style="height: 256px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
        </div>
    </div>
</div>

<div class="rightbar-overlay"></div>
<!-- /Right-bar -->


<!-- bundle -->
<script src="{{ asset('js/vendor.min.js') }}"></script>
<script src="{{ asset('js/app.min.js') }}"></script>

<!-- Apex js -->
<script src="{{ asset('js/vendor/apexcharts.min.js') }}"></script>

<!-- Todo js -->
<script src="{{ asset('js/ui/component.todo.js') }}"></script>

<!-- demo app -->
<script src="{{ asset('js/pages/demo.dashboard-crm.js') }}"></script>
<!-- end demo js-->
@stack('scripts')
<script>
    $(document).ready(function () {
        var userName = "{{ Session::has('check_admin')}}";
        if (userName > 0) {
            $.toast({
                heading: 'Error',
                text: '<h6>{{ Session::get("check_admin") }}</h6>',
                showHideTransition: 'slide',
                icon: 'error',
                position: 'top-right',
            })
        }
    });
</script>

</body>

</html>
