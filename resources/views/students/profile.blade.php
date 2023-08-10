@extends('layouts.master')
@section('title', 'Students')
@section('subTitle', 'Profile Student')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <div class="row">
                        <div class="col-6">
                            <a class="btn btn-primary" href="{{ route('edu.students.edit', $student->id) }}">
                                {{ __('Edit') }}</a>
                        </div>
                        <div class="col-6">
                            {!! Form::open(['route' => ['edu.students.destroy', $student->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Are you sure?")']) !!}
                            {!! Form::button(__('Delete'), ['type' => 'submit', 'class' => 'btn btn-danger', 'style' => 'float: right;']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
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
                        <div class="col-lg-5">
                            <!-- Product image -->

                            <a href="javascript: void(0);" class="text-center d-block mb-4" id="imagePreview">

                                @if(isset($student->avatar))
                                <img src="{{ asset('images/students/'. $student->avatar) }}"
                                     alt="{{ $student->user->email }}" class="img-fluid" style="max-width: 280px;" id="oldImage" />
                                @else
                                <img src="{{ asset('images/default/meme-meo-like-trong-dau-kho.jpg') }}"
                                     alt="{{ $student->user->email }}" class="img-fluid" style="max-width: 280px;" id="oldImage" />
                                @endif
                            </a>
                            <input type="file" id="imageInput" accept="image/*">
                        </div> <!-- end col -->
                        <div class="col-lg-7">
                            <div class="mt-4">
                                <h6 class="font-20">{{ __('Name') }}: {{ $student->user->name }}</h6>
                                <h6 class="font-20">{{ __('Email') }}: {{ $student->user->email }}</h6>
                                <h6 class="font-20">{{ __('Address') }}: {{ $student->address }}</h6>
                                <h6 class="font-20">{{ __('Phone') }}: {{ $student->phone }}</h6>
                                <h6 class="font-20">{{ __('Gender') }}: {{ $student->gend }}</h6>
                                <h6 class="font-20">
                                    {{ __('BirthDay') }}:
                                    {{ Carbon\Carbon::parse($student->birthdate)->format('d-m-Y') }}
                                </h6>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->

</div>
<!-- container -->

</div>
<!-- content -->
</div>
<script>
    $(document).ready(function() {
        $('#imageInput').change(function(e) {
            // e.preventDefault();
            var fileInput = this;
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    // console.log(e.target.result);
                    $('#oldImage').hide();
                    $('#imagePreview').html('<img src="' + e.target.result +
                        '" alt="Preview Image" class="img-fluid" style="max-width: 280px;" >'
                    );
                }
                reader.readAsDataURL(fileInput.files[0]);
            }
        });
    });
</script>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->
@endsection
