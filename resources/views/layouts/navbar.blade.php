<div class="navbar-custom">
    <ul class="list-unstyled topbar-right-menu float-right mb-0">
        <li class="dropdown notification-list d-lg-none">
            <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-search noti-icon"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                <form class="p-3">
                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                </form>
            </div>
        </li>
        <li class="dropdown" style="margin-top: 22px;">
            <a class=" dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                @if (Session::get('website_language') == 'vi')
                    <span><img src="{{ asset('images/flags/vn.png') }}" style="width: 20px; margin-right: 5px;" alt="">
                        Việt Nam</span>
                @else
                    <span><img src="{{ asset('images/flags/us.jpg') }}" style="width: 20px; margin-right: 5px;" alt="">
                        English</span>
                @endif
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('change_language', ['en']) }}"><img
                        src="{{ asset('images/flags/us.jpg') }}" style="width: 20px; margin-right: 5px;"
                        alt="">English</a>
                <a class="dropdown-item" href="{{ route('change_language', ['vi']) }}"><img
                        src="{{ asset('images/flags/vn.png') }}" style="width: 20px; margin-right: 5px;" alt="">Việt
                    Nam</a>
            </div>
        </li>
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none mr-0"
               href="{{ route('students.profile', Auth::user()->id) }}">
                <span class="account-user-avatar">
                    <img src="{{ asset('images/default/meme-meo-like-trong-dau-kho.jpg') }}" alt=""
                         class="rounded-circle">
                </span>
                <span>
                    <span class="account-user-name">{{ Auth::user()->name }}</span>
                    <span class="account-position">{{ __('Role') }}: {{ Auth::user()->role->role }}</span>
                </span>
            </a>

        </li>
    </ul>
</div>
