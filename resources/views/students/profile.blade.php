@extends('layouts.master')
@section('title', 'Students')
@section('subTitle', 'Profile Student')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">{{ __('Profile') }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {!! Form::model($student,
                        ['route' => ['students.profile_update', $student->id],
                        'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                        <div class="row">
                            <div class="col-lg-4">
                                <!-- Product image -->
                                <a href="javascript: void(0);" class="d-block mb-4" id="imagePreview">

                                    @if(isset($student->avatar))
                                        <img src="{{ asset('storage/students/'. $student->avatar) }}"
                                             alt="{{ $student->user->email }}" class="img-fluid"
                                             style="max-width: 280px;" id="oldImage"/>
                                    @else
                                        <img src="{{ asset('images/default/meme-meo-like-trong-dau-kho.jpg') }}"
                                             alt="{{ $student->user->email }}" class="img-fluid"
                                             style="max-width: 280px;" id="oldImage"/>
                                    @endif
                                </a>
                                {!! Form::file('avatar', ['accept' => 'image/*',
                                'id' => 'imageInput', 'class' => 'form-control-file']) !!}
                            </div> <!-- end col -->
                            <div class="col-lg-7">
                                <div class="mt-4">
                                    <div class="row">
                                        {!! Form::label('name', __('Student Name'),
                                           ['class' => 'col-sm-3 col-form-label font-20']) !!}
                                        <div class="col-sm-9">
                                            {!! Form::text('name', isset($student) ? old('name', __($student->user->name))
                                                : old('name'),
                                                ['class' => 'form-control-plaintext font-20', 'id' => 'name',
                                                 'style' => 'outline:none', 'disabled']) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        {!! Form::label('email', __('Email'),
                                           ['class' => 'col-sm-3 col-form-label font-20']) !!}
                                        <div class="col-sm-9">
                                            {!! Form::text('email', isset($student) ? old('email', __($student->user->email))
                                                : old('email'),
                                                ['class' => 'form-control-plaintext font-20', 'id' => 'email',
                                                 'style' => 'outline:none', 'disabled']) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        {!! Form::label('address', __('Address'),
                                           ['class' => 'col-sm-3 col-form-label font-20']) !!}
                                        <div class="col-sm-9">
                                            {!! Form::text('address', isset($student) ? old('address', __($student->address))
                                                : old('address'),
                                                ['class' => 'form-control-plaintext font-20', 'id' => 'address',
                                                 'style' => 'outline:none', 'disabled']) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        {!! Form::label('phone', __('Phone'),
                                           ['class' => 'col-sm-3 col-form-label font-20']) !!}
                                        <div class="col-sm-9">
                                            {!! Form::text('phone', isset($student) ? old('phone', __($student->phone))
                                                : old('phone'),
                                                ['class' => 'form-control-plaintext font-20', 'id' => 'phone',
                                                 'style' => 'outline:none', 'disabled']) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        {!! Form::label('gender', __('Gender'),
                                           ['class' => 'col-sm-3 col-form-label font-20']) !!}
                                        <div class="col-sm-9">
                                            {!! Form::text('gender', isset($student) ? old('gender', __($student->gend))
                                                : old('gender'),
                                                ['class' => 'form-control-plaintext font-20', 'id' => 'gender',
                                                 'style' => 'outline:none', 'disabled']) !!}

                                            {!! Form::select('gender', ['0' => __('Other'), '1' => __('Male'),
                                            '2' => __('Female')], isset($student) ? __($student->gender) : null,
                                             ['class' => 'form-control-plaintext font-20', 'id' => 'gender-select',
                                             'style' => 'outline:none']) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        {!! Form::label('birthDay', __('BirthDay'),
                                           ['class' => 'col-sm-3 col-form-label font-20']) !!}
                                        <div class="col-sm-9">
                                            {!! Form::date('birthday',isset($student) ?
                                            Carbon\Carbon::parse($student->birthday)->format('Y-m-d') : '',
                                            ['class' => 'form-control-plaintext font-20',
                                            'id' => 'birthday', 'style' => 'outline:none', 'disabled']) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        {!! Form::submit(__('Update'), ['class' => 'btn btn-primary update']) !!}
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-1">
                                <button type="button" class="btn btn-light edit">
                                    <i class="mdi mdi-account-edit font-20"></i>
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
        <!-- end row-->

    </div>
    <!-- container -->

    @push('scripts')
        <script>
            $(document).ready(function () {
                let imageInput = $('#imageInput');
                let updateInput = $('.update');
                let address = $('#address');
                let phone = $('#phone');
                let gender = $('#gender');
                let selectGender = $('#gender-select');
                let birthday = $('#birthday');
                let success = "{{ Session::has('success') }}";
                let errors = "{{ Session::has('errors') }}"

                imageInput.hide();
                updateInput.hide();
                selectGender.hide();
                imageInput.on('change', function (e) {
                    // e.preventDefault();
                    let fileInput = this;
                    if (fileInput.files && fileInput.files[0]) {
                        let reader = new FileReader();
                        reader.onload = function (e) {
                            // console.log(e.target.result);
                            $('#oldImage').hide();
                            $('#imagePreview').html('<img src="' + e.target.result +
                                '" alt="Preview Image" class="img-fluid" style="max-width: 280px;" >'
                            );
                        }
                        reader.readAsDataURL(fileInput.files[0]);
                    }
                });

                let isEditMode = false;
                $('.edit').on('click', function (e) {
                    e.preventDefault();
                    if (isEditMode === false) {
                        address.prop('disabled', false);
                        phone.prop('disabled', false);
                        gender.hide();
                        selectGender.show();
                        birthday.prop('disabled', false);
                        imageInput.show();
                        updateInput.show();
                        updateInput.prop('disabled', false);
                        imageInput.prop('disabled', false);
                        isEditMode = true;
                    } else {
                        address.prop('disabled', true);
                        phone.prop('disabled', true);
                        gender.prop('disabled', true);
                        birthday.prop('disabled', true);
                        gender.show();
                        selectGender.hide();
                        imageInput.hide();
                        updateInput.hide();
                        isEditMode = false;
                    }
                });

                if (success) {
                    $.toast({
                        heading: '{{ __('Student') }}',
                        text: '<h6>{{ __(Session::get("success")) }}</h6>',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right',
                    })
                }

                if (errors) {
                    $.toast({
                        heading: '{{ __('Student') }}',
                        text: '<h6>{{ __(Session::get("errors")) }}</h6>',
                        showHideTransition: 'slide',
                        icon: 'warning',
                        position: 'top-right',
                    })
                }
            });
        </script>
    @endpush
@endsection
