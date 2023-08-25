<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Log In | Hyper - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <!-- App css -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <!-- third party css -->
    <!-- third party css end -->
    <!-- App css -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app-creative.min.css') }}" rel="stylesheet" type="text/css" id="light-style"/>
    <link href="{{ asset('css/app-creative-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style"/>

</head>

<body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

<div class="auth-fluid">
    <!--Auth fluid left content -->

    <div class="auth-fluid-form-box">
        <ul class="list-unstyled topbar-right-menu float-right mb-0">
            <li class="dropdown" style="margin-top: 22px;">
                <a class=" dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    @if (Session::get('website_language') == 'vi')
                        <span><img src="{{ asset('images/flags/vn.png') }}" style="width: 20px; margin-right: 5px;"
                                   alt="">
                        Việt Nam</span>
                    @else
                        <span><img src="{{ asset('images/flags/us.jpg') }}" style="width: 20px; margin-right: 5px;"
                                   alt="">
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
        </ul>
        <div class="align-items-center d-flex h-100">
            <div class="card-body">
                <!-- Logo -->
                <div class="auth-brand text-center text-lg-left">
                    <a href="index.html" class="logo-dark">
                        <span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
                    </a>
                    <a href="index.html" class="logo-light">
                        <span><img src="assets/images/logo.png" alt="" height="18"></span>
                    </a>
                </div>
                <!-- title-->
                <h4 class="mt-0">{{ __('Sign In') }}</h4> <p>{{ Auth::user() ?: ''}}</p>
                <p class="text-muted mb-4">Enter your email address and password to access account.</p>
                <!-- form -->
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="emailaddress">Email address</label>
                        <input class="form-control @error('email') is-invalid @enderror" type=" email" id="emailaddress"
                               value="{{ old('email') ?  old('email') : ''}}" name="email"
                               placeholder="Enter your email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <a href="pages-recoverpw-2.html" class="text-muted float-right"><small>Forgot your
                                password?</small></a>
                        <label for="password">Password</label>
                        <input class="form-control  @error('password') is-invalid @enderror" type="password"
                               name="password" id="password" placeholder="Enter your password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="remember"
                                   {{ old('remember') ? 'checked' : '' }} class="custom-control-input"
                                   id="checkbox-remember">
                            <label class="custom-control-label" for="checkbox-remember">Remember me</label>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-center">
                        <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-login"></i> Log In
                        </button>
                    </div>
                    <!-- social-->
                    <div class="text-center mt-4">
                        <p class="text-muted font-16">Sign in with</p>
                        <ul class="social-list list-inline mt-3">
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i
                                        class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i
                                        class="mdi mdi-google"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                        class="mdi mdi-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i
                                        class="mdi mdi-github-circle"></i></a>
                            </li>
                        </ul>
                    </div>
                </form>
                <!-- end form-->

                <!-- Footer-->
                <footer class="footer footer-alt">
                    <p class="text-muted">Don't have an account? <a href="pages-register-2.html"
                                                                    class="text-muted ml-1"><b>Sign Up</b></a></p>
                </footer>

            </div> <!-- end .card-body -->
        </div> <!-- end .align-items-center.d-flex.h-100-->
    </div>
    <!-- end auth-fluid-form-box-->

    <!-- Auth fluid right content -->
    <div class="auth-fluid-right text-center">
        <div class="auth-user-testimonial">
            <h2 class="mb-3">I love the color!</h2>
            <p class="lead"><i class="mdi mdi-format-quote-open"></i> It's a elegent templete. I love it very much!
                . <i class="mdi mdi-format-quote-close"></i>
            </p>
            <p>
                - Hyper Admin User
            </p>
        </div> <!-- end auth-user-testimonial-->
    </div>
    <!-- end Auth fluid right content -->
</div>
<!-- end auth-fluid-->

<!-- bundle -->
<script src="{{ asset('js/vendor.min.js') }}"></script>
<script src="{{ asset('js/app.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $login_failed = "{{ Session::has('login_failed') }}";

        if ($login_failed) {
            $.toast({
                heading: 'Login Failed',
                text: '<h6>{{ Session::get("login_failed") }}</h6>',
                showHideTransition: 'slide',
                icon: 'error',
                position: 'top-left',
            })
        }
    });
</script>

</body>

</html>
