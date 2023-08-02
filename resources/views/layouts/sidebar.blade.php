<div class="left-side-menu mm-show">

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('images/logo.png') }}" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('images/logo_sm.png') }}" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <div class="h-100 mm-active" id="left-side-menu-container" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden;">
                        <div class="simplebar-content" style="padding: 0px;">

                            <!--- Sidemenu -->
                            <ul class="metismenu side-nav mm-show">
                                <li class="side-nav-item">
                                    <a href="{{ route('edu.home') }}" class="side-nav-link">
                                        <i class="mdi mdi-home mdi-24px"></i>
                                        <span> Home </span>
                                    </a>
                                </li>

                                <li class="side-nav-item">
                                    <a href="{{ route('edu.students.list_students') }}" class="side-nav-link">
                                        <i class="mdi mdi-account-details-outline mdi-24px"></i>
                                        <span> Students </span>
                                    </a>
                                </li>

                                <li class="side-nav-item">
                                    <a href="{{ route('edu.faculties.list_faculties') }}" class="side-nav-link">
                                        <i class="mdi mdi-clipboard-file-outline mdi-24px"></i>
                                        <span> Faculties </span>
                                    </a>
                                </li>

                                <li class="side-nav-item">
                                    <a href="{{ route('edu.subjects.list_subjects') }}" class="side-nav-link">
                                        <i class="mdi mdi-battery-high mdi-24px"></i>
                                        <span> Subjects </span>
                                    </a>
                                </li>

                                <li class="side-nav-item">
                                    <a href="{{ route('edu.points.list_point_all')  }}" class="side-nav-link">
                                        <i class="mdi mdi-battery-high mdi-24px"></i>
                                        <span> Points </span>
                                    </a>
                                </li>

                                <li class="side-nav-item">
                                    <a class="side-nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" id="nav_sidebar">
                                        <i class="mdi mdi-logout mdi-24px"></i>
                                        <span> Logout </span>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </a>
                                </li>
                            </ul>

                            <!-- Help Box -->

                            <!-- end Help Box -->
                            <!-- End Sidebar -->

                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: auto; height: 100px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="height: 0px; transform: translate3d(0px, 0px, 0px); display: none;">
            </div>
        </div>
    </div>
    <!-- Sidebar -left -->

</div>
