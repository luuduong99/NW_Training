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
                                <input type="file" id="imageInput" accept="image/*">
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
                                        </div>
                                    </div>
                                    <div class="row">
                                        {!! Form::label('birthDay', __('BirthDay'),
                                           ['class' => 'col-sm-3 col-form-label font-20']) !!}
                                        <div class="col-sm-9">
                                            {!! Form::text('birthday', isset($student) ?
                                                old('birthday',Carbon\Carbon::parse($student->birthdate)->format('d-m-Y'))
                                                : old('birthday'),
                                                ['class' => 'form-control-plaintext font-20', 'id' => 'birthday',
                                                 'style' => 'outline:none', 'disabled']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-1">
                                <button type="button" class="btn btn-light edit">
                                    <i class="mdi mdi-account-edit font-20"></i>
                                </button>
                            </div>
                        </div> <!-- end row-->
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
                $('#imageInput').hide();

                $('#imageInput').change(function (e) {
                    // e.preventDefault();
                    var fileInput = this;
                    if (fileInput.files && fileInput.files[0]) {
                        var reader = new FileReader();
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

                $('.edit').on('click', function (e) {
                    e.preventDefault();
                    $('input').each(function() {
                        if ($(this).prop('disabled')) {
                            $(this).prop('disabled', false);
                            $('#imageInput').hide();
                        } else {
                            $(this).prop('disabled', true);
                            $('#imageInput').show();
                            $('#imageInput').prop('disabled', false);
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
