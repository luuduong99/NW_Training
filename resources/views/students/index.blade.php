@extends('layouts.master')
@section('content')

    <div style="width: 100%; display: flex;">
        <div class="col-sm-2" style="padding: 0">
            <a href="{{ route('edu.students.create') }}" class="btn btn-success mb-2"><i
                    class="mdi mdi-plus-circle mr-2"></i>
                {{  __('Add Student') }}
            </a>
        </div>
        <div class="col-sm-6">
            <div class="form-row">
                <div class="form-group row col-sm-6">
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

        </div>
        <div class="col-sm-6">
            <div class="form-row">
                <div class="form-group row col-sm-6">
                    <label for="fromOld" class="col-sm-4 col-form-label">{{ __('Point From') }}</label>
                    <div class="col-sm-8">
                        <input type="number" step="0.01" min="0" max="10" name="fromPoint"
                               class="form-control" id="fromPoint">
                    </div>
                </div>
                <div class="form-group row col-sm-5">
                    <label for="toOld" class="col-sm-4 col-form-label">{{ __('Point To') }}</label>
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
                        <img src="{{ asset('images/students/'. $student->avatar) }}" alt="{{ $student->user->email }}"
                             class="mr-2 rounded-circle"/>
                    @else
                        <img src="{{ asset('images/default/meme-meo-like-trong-dau-kho.jpg') }}"
                             alt="{{ $student->user->email }}" class="mr-2 rounded-circle"/>
                    @endif
                </td>
                <td><a title="{{ $student->user->name }}"
                       style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 13ch;"
                       href="{{ route('edu.students.profile', $student->id) }}">{{ $student->user->name }}</a>
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
                    <a href="{{ route('edu.points.list_point_student', $student->id)  }}"
                       title="Preview courses and score of student">
                        {{ count($student->subjects->pluck('id')->toArray()) }}
                    </a>
                </td>
                <td>{{ $student->average_point  }}</td>
                <td title="{{ $student->created_at }}"
                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 13ch;">{{ $student->created_at }}</td>
                <td title="{{ $student->updated_at }}"
                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 13ch;">{{ $student->updated_at }}</td>
                <td class="table-action">
                    <button href="" class="btn btn-warning send-mail" value="{{ $student->id }}">
                        <i class="mdi mdi-email-send"></i>
                    </button>
                    <a href="{{ route('edu.students.edit', $student->id) }}" class="btn btn-primary">
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

    <div id="modalCSV" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{  __('Import Data') }}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body form-horizontal">
                    {{ Form::open(['route' => 'edu.students.import', 'method' => 'post']) }}
                    <div class="form-group">
                        {{ Form::label('example-file-input', __('File')) }}
                        {{ Form::file('excel_file', ['id' => 'example-file-input'])  }}
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

    {!! Form::open(['route' => ['edu.students.notification', $student->id], 'method' => 'post', 'id' => 'send-form']) !!}
    {!! Form::hidden('email', $student->user->email) !!}
    {!! Form::hidden('user_id', $student->user_id) !!}
    {!! Form::close() !!}

    {!! Form::open(['route' => ['edu.students.destroy', $student->id], 'method' => 'delete', 'id' => 'delete-form']) !!}
    {!! Form::close() !!}

    @push('scripts')
        <script>
            $(document).ready(function () {
                $(".send-mail").click(function (e) {
                    e.preventDefault();

                    var studentId = $(this).val();
                    var newAction = "{{ route('edu.students.notification', ':id')  }}";
                    var action = newAction.replace(':id', studentId);
                    $("#send-form").attr("action", action);
                    $("#send-form").submit();
                });
            });

            $(".delete-student").click(function (e) {
                e.preventDefault();

                var studentId = $(this).val();
                var newAction = "{{ route('edu.students.destroy', ':id') }}";
                var action = newAction.replace(':id', studentId);
                $("#delete-form").attr("action", action);
                var confirmDelete = confirm('Are you sure?');

                if (confirmDelete) {
                    $("#delete-form").submit();
                }
            });
        </script>

        <script>
            $(document).ready(function () {
                $sucess = "{{ Session::has('add_student') }}";
                $update = "{{ Session::has('update_student') }}";
                $delete = "{{ Session::has('delete_student') }}";
                $sendMailSuccess = "{{ Session::has('send_mail_success') }}";
                $sendMailFalse = "{{ Session::has('send_mail_false') }}";

                if ($sucess) {
                    $.toast({
                        heading: 'Add student',
                        text: '<h6>{{ Session::get("add_student") }}</h6>',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right',
                    })
                }

                if ($update) {
                    $.toast({
                        heading: 'Update student',
                        text: '<h6>{{ Session::get("update_student") }}</h6>',
                        showHideTransition: 'slide',
                        icon: 'info',
                        position: 'top-right',
                    })
                }

                if ($delete) {
                    $.toast({
                        heading: 'Delete student',
                        text: '<h6>{{ Session::get("delete_student") }}</h6>',
                        showHideTransition: 'slide',
                        icon: 'error',
                        position: 'top-right',
                    })
                }

                if ($sendMailSuccess) {
                    $.toast({
                        heading: 'Send success',
                        text: '<h6>{{ Session::get("send_mail_success") }}</h6>',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right',
                    })
                }

                if ($sendMailFalse) {
                    $.toast({
                        heading: 'Send false',
                        text: '<h6>{{ Session::get("send_mail_false") }}</h6>',
                        showHideTransition: 'slide',
                        icon: 'warring',
                        position: 'top-right',
                    })
                }
            });
        </script>
    @endpush
@endsection
