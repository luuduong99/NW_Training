@extends('layouts.master')
@section('title', 'Students')
@section('subTitle', 'List')
@section('content')

    <div style="width: 100%; display: flex;">
        <div class="col-sm-2" style="padding: 0">
            <a href="{{ route('students.create') }}" class="btn btn-success mb-2"><i
                    class="mdi mdi-plus-circle mr-2"></i>
                {{  __('Add Student') }}
            </a>
        </div>
        <div class="col-sm-6">
            <div class="form-row">
                <div class="form-group row col-sm-5">
                    <label for="fromAge" class="col-sm-4 col-form-label">{{ __('Age From') }}</label>
                    <div class="col-sm-8">
                        <input type="number" name="fromAge" class="form-control" id="fromAge">
                    </div>
                </div>
                <div class="form-group row col-sm-5">
                    <label for="toAge" class="col-sm-4 col-form-label">{{ __('Age To') }}</label>
                    <div class="col-sm-8">
                        <input type="number" name="toAge" class="form-control" id="toAge">
                    </div>
                </div>
                <i class="mdi mdi-magnify search-icon" type="button"
                   onclick="location.href = '{{ url()->current() }}?fromAge='
                   + document.getElementById('fromAge').value
                   + '&toAge=' + document.getElementById('toAge').value;"
                   style="font-size: 23px;">
                </i>
            </div>
        </div>
        <div class="col-sm-2" style="padding: 0">

        </div>
        <div class="col-sm-2" style="padding: 0">
            <div>
                <button type="button" class="btn btn-info mb-2" data-toggle="modal" data-target="#modalCSV">
                    {{  __('Import Data') }}
                </button>
            </div>
        </div>
    </div>
    <div style="width: 100%; display: flex;">
        <div class="col-sm-2" style="padding: 0">
            <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#modal-student">
                <i class="mdi mdi-plus-circle mr-2"></i> {{  __('Fast Add Student') }}
            </button>
        </div>
        <div class="col-sm-6">
            <div class="form-row">
                <div class="form-group row col-sm-6">
                    <label for="fromPoint" class="col-sm-4 col-form-label">{{ __('Point From') }}</label>
                    <div class="col-sm-8">
                        <input type="number" step="0.01" min="0" max="10" name="fromPoint"
                               class="form-control" id="fromPoint">
                    </div>
                </div>
                <div class="form-group row col-sm-5">
                    <label for="toPoint" class="col-sm-4 col-form-label">{{ __('Point To') }}</label>
                    <div class="col-sm-8">
                        <input type="number" step="0.01" min="0" max="10" name="toPoint"
                               class="form-control" id="toPoint">
                    </div>
                </div>
                <i class="mdi mdi-magnify search-icon" type="button"
                   onclick="location.href = '{{ url()->current() }}?fromPoint='
                   + document.getElementById('fromPoint').value
                   + '&toPoint=' + document.getElementById('toPoint').value;"
                   style="font-size: 23px;">
                </i>
            </div>
        </div>
        <div class="col-sm-2" style="padding: 0">
        </div>
        <div class="col-sm-2" style="padding: 0">
        </div>
    </div>
    @if(!isset($students))
        <h1 style="text-align: center;"> NOT DATA </h1>
    @else
        <table class="table table-striped table-centered mb-0">
            <thead>
            <tr>
                <th>{{ __('Avatar') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Phone') }}</th>
                <th>{{ __('Address') }}</th>
                <th>{{ __('Gender') }}</th>
                <th>{{ __('Age') }}</th>
                <th>{{ __('Faculty') }}</th>
                <th>{{ __('Subjects') }}</th>
                <th>{{ __('Average') }}</th>
                <th>{{ __('Created_at') }}</th>
                <th>{{ __('Updated_at') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($students as $student)
                <tr>
                    <td class="table-user">
                        @if(isset($student->avatar))
                            <img src="{{ asset('storage/students/'. $student->avatar) }}"
                                 alt=""
                                 class="mr-2 rounded-circle"/>
                        @else
                            <img src="{{ asset('images/default/meme-meo-like-trong-dau-kho.jpg') }}"
                                 alt="{{ $student->user->email }}" class="mr-2 rounded-circle"/>
                        @endif
                    </td>
                    <td><a title="{{ $student->user->name }}"
                           style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 13ch;"
                           href="{{ route('students.profile', $student->id) }}">{{ $student->user->name }}</a>
                    </td>
                    <td title="{{ $student->user->email }}"
                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 13ch;">
                        {{ $student->user->email }}
                    </td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->gend }}</td>
                    <td>{{ $student->age }}</td>
                    <td title="{{ $student->faculty->name }}"
                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 13ch;">
                        {{ __($student->faculty->name) }}</td>
                    <td>
                        <a href="{{ route('students.subject', $student->id)  }}"
                           title="Preview courses and score of student">
                            {{ count($student->subjects->pluck('id')->toArray()) }}
                        </a>
                    </td>
                    <td>{{ isset($student->average) ? $student->average : __('Not point yet') }}</td>
                    <td title="{{ $student->created_at }}"
                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 13ch;">{{ $student->created_at }}</td>
                    <td title="{{ $student->updated_at }}"
                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 13ch;">{{ $student->updated_at }}</td>
                    <td class="table-action">
                        @if (count($student->subjects) < count($student->faculty->subjects))
                            <button href="" class="btn btn-warning send-mail" value="{{ $student->id }}">
                                <i class="mdi mdi-email-send"></i>
                            </button>
                        @endif
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">
                            <i class="mdi mdi-square-edit-outline"></i></a>
                        <button class="btn btn-danger delete-student" value="{{ $student->id }}">
                            <i class="mdi mdi-delete"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div>
            {{ $students->links() }}
        </div>

        {{--    Form import students--}}
        <div id="modalCSV" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{  __('Import Data') }}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body form-horizontal">
                        {{ Form::open(['route' => 'students.import', 'method' => 'post',
                        'enctype' => 'multipart/form-data']) }}
                        <div class="form-group">
                            {{ Form::label('example-file-input', __('File')) }}
                            {{ Form::file('excel_file', ['id' => 'example-file-input',
                            'accept' => '.csv, .xlsx, .xls'])  }}
                        </div>
                        <div class="form-group">
                            {{ Form::submit(__('Import Data'), ['class' => 'btn btn-success']) }}
                        </div>
                        {{ Form::close()}}

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{  __('Close') }}</button>
                    </div>
                </div>

            </div>
        </div>

        {{--    Popup fast add student--}}
        <div id="modal-student" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{  __('Add Student') }}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body form-horizontal">
                        {!! Form::open(['route' => 'students.store', 'method' => 'post',
                                        'enctype' => 'multipart/form-data', 'id' => 'ajax-form']) !!}
                        <div class="form-group">
                            {!! Form::label('name', __('Student Name'), ['class' => 'col-form-label']) !!}
                            <span>:<span class="text-danger">(*)</span></span>
                            {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'inputName']) !!}
                            <span class="text-danger error-text name_error"></span>
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', __('Email'), ['class' => 'col-form-label']) !!}
                            <span>:<span class="text-danger">(*)</span></span>
                            {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'inputEmail4']) !!}
                            <span class="text-danger error-text email_error"></span>
                        </div>

                        <div class="form-group">
                            {!! Form::label('address', __('Address'), ['class' => 'col-form-label']) !!}
                            <span>:<span class="text-danger">(*)</span></span>
                            {!! Form::text('address', null, ['class' => 'form-control', 'id' => 'inputAddress']) !!}
                            <span class="text-danger error-text address_error"></span>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                {!! Form::label('phone', __('Phone'), ['class' => 'col-form-label']) !!}
                                <span>:<span class="text-danger">(*)</span></span>
                                {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'inputPhone']) !!}
                                <span class="text-danger error-text phone_error"></span>
                            </div>

                            <div class="form-group col-md-4">
                                {!! Form::label('gender', __('Gender'), ['class' => 'col-form-label']) !!}
                                <span>:<span class="text-danger">(*)</span></span>
                                {!! Form::select('gender', ['0' => __('Other'), '1' => __('Male'), '2' => __('Female')],
                                null, ['class' => 'form-control', 'id' => 'inputGender']) !!}
                            </div>

                            <div class="form-group col-md-4">
                                {!! Form::label('birthday', __('BirthDay'), ['class' => 'col-form-label']) !!}
                                <span>:<span class="text-danger">(*)</span></span>
                                {!! Form::date('birthday', null, ['class' => 'form-control', 'id' => 'inputDate']) !!}
                                <span class="text-danger error-text birthday_error"></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                {!! Form::label('role', __('Role'), ['class' => 'col-form-label']) !!}
                                <span>:<span class="text-danger">(*)</span></span>
                                {!! Form::select('role', ['1' => __('Student'), '0' => __('Admin')],
                                null, ['class' => 'form-control', 'id' => 'role']) !!}
                            </div>

                            <div class="form-group col-md-8">
                                {!! Form::label('faculty_id', __('Faculty'), ['class' => 'col-form-label']) !!}
                                <span>:<span class="text-danger">(*)</span></span>
                                {!! Form::select('faculty_id', $faculties->mapWithKeys(function ($faculty) {
                                    return [$faculty->id => __($faculty->name)];
                                }), null,
                                ['class' => 'form-control', 'id' => 'faculty']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('avatar', __('Choose Avatar')) !!}
                            {!! Form::file('avatar', ['accept' => '.jpg, .png, .jpeg',
                            'id' => 'example-file', 'class' => 'form-control-file']) !!}
                            <span class="text-danger error-text avatar_error"></span>
                            <span class="pip"></span>
                            <div class='btn btn-primary' id='remove' style="display: none">
                                Clear
                            </div>
                        </div>

                        {!! Form::submit(__('Add Student'), ['class' => 'btn btn-primary', 'id' => 'btn-submit']) !!}
                        {!! Form::close() !!}
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{  __('Close') }}</button>
                    </div>
                </div>
            </div>
        </div>

        @if(isset($student))
            {{--    Form send notifiication student--}}
            {!! Form::open(['route' => ['students.notification', $student->id], 'method' => 'post', 'id' => 'send-form']) !!}
            {!! Form::hidden('email', $student->user->email) !!}
            {!! Form::hidden('user_id', $student->user_id) !!}
            {!! Form::close() !!}

            {{--    Form delete student--}}
            {!! Form::open(['route' => ['students.destroy', $student->id], 'method' => 'delete', 'id' => 'delete-form']) !!}
            {!! Form::close() !!}
        @endif
    @endif


    @push('scripts')
        <script>
            $(document).ready(function () {
                if (window.File && window.FileList && window.FileReader) {
                    $('#example-file').change(function (e) {
                        e.preventDefault();
                        let fileInput = this;
                        if (fileInput.files && fileInput.files[0]) {
                            let reader = new FileReader();
                            reader.onload = function (e) {
                                $('.pip').html('<img src="' + e.target.result +
                                    '" alt="Preview Image" class="imageThumb" ' +
                                    'style="max-width: 150px; margin-top: 10px;" >'
                                );
                            }
                            reader.readAsDataURL(fileInput.files[0]);
                        }
                        $('#remove').css('display', 'inline-block');
                    });
                }
                $("#remove").click(function () {
                    $(".pip").remove();
                    $('#example-file').val("");
                    $("#remove").hide();
                });
            });
        </script>

        <script>
            $(document).ready(function () {
                $(".send-mail").click(function (e) {
                    e.preventDefault();

                    let studentId = $(this).val();
                    let newAction = "{{ route('students.notification', ':id')  }}";
                    let action = newAction.replace(':id', studentId);
                    $("#send-form").attr("action", action).submit();
                });
            });

            $(".delete-student").click(function (e) {
                e.preventDefault();

                let studentId = $(this).val();
                let newAction = "{{ route('students.destroy', ':id') }}";
                let action = newAction.replace(':id', studentId);
                let confirmDelete = confirm('Are you sure?');

                if (confirmDelete) {
                    $("#delete-form").attr("action", action).submit();
                }
            });
        </script>

        <script>
            $(document).ready(function () {
                $('#btn-submit').click(function (e) {
                    e.preventDefault();
                    let formData = new FormData($('#ajax-form')[0]);
                    $.ajax({
                        type: "POST",
                        url: "{{ route('students.store') }}",
                        data: formData,
                        processData: false,
                        cache: false,
                        contentType: false,
                        beforeSend: function () {
                            $(document).find('span.error-text').html('');
                        },
                        success: function (data) {
                            console.log(data)
                            $.toast({
                                heading: 'Student',
                                text: '<h6>data.success</h6>',
                                showHideTransition: 'slide',
                                icon: 'success',
                                position: 'top-right',
                            })
                            setTimeout(function () {
                                window.location.href = "{{ route('students.index') }}";
                            }, 500);
                        },
                        error: function (data) {
                            console.log(data.responseJSON.errors);
                            $.each(data.responseJSON.errors, function (prefix, val) {
                                $('span.' + prefix + '_error').html(val[0]);
                            });
                        }
                    });
                });
            });

            $(document).ready(function () {
                let studentSuccess = "{{ Session::has('success') }}"
                let studentErrors = "{{ Session::has('errors') }}"

                if (studentSuccess) {
                    $.toast({
                        heading: '{{ __('Student') }}',
                        text: '<h6>{{ __(Session::get("success")) }}</h6>',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right',
                    })
                }

                if (studentErrors) {
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
