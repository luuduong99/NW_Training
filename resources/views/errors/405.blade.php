@extends('errors.layout')
@section('title', __('Url Not Found'))
@section('code', '405')
@section('message')
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card">
                        <!-- Logo -->
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="" onclick="history.back(); return false;">
                                <span><img src="{{ asset('images/logo.png') }}" alt="" height="18"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">
                            <div class="text-center">
                                <h1 class="text-error">4<i class="mdi mdi-emoticon-sad"></i>5</h1>
                                <h4 class="text-uppercase text-danger mt-3">Url Not Found</h4>
                                <h5 class="text-uppercase text-danger mt-3">
                                    Please review the url or the passed parameters
                                </h5>
                                <p class="text-muted mt-3">It's looking like you may have taken a wrong turn.
                                    Don't worry... it happens to the best of us.
                                    Here's a little tip that might help you get back on track.</p>

                                <a class="btn btn-info mt-3" href="" onclick="history.back(); return false;">
                                    <i class="mdi mdi-reply"></i> Return Back</a>
                            </div>
                        </div> <!-- end card-body-->
                    </div>
                    <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
        2018 - 2020 © Hyper - Coderthemes.com
    </footer>
@endsection
