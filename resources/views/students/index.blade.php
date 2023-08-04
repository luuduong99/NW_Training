@extends('layouts.master')
@section('content')

    <div style="width: 100%; display: flex;">
        <div class="col-sm-2" style="padding: 0">
            <a href="{{ route('edu.students.create_student') }}" class="btn btn-success mb-2"><i
                    class="mdi mdi-plus-circle mr-2"></i>
                Add User
            </a>
        </div>
        <div class="col-sm-6">
            <div class="form-row">
                <div class="form-group row col-sm-6">
                    <label for="fromOld" class="col-sm-4 col-form-label">Old From</label>
                    <div class="col-sm-8">
                        <input type="number" name="fromOld" class="form-control" id="fromOld">
                    </div>
                </div>
                <div class="form-group row col-sm-5">
                    <label for="toOld" class="col-sm-4 col-form-label">Old To</label>
                    <div class="col-sm-8">
                        <input type="number" name="toOld" class="form-control" id="toOld">
                    </div>
                </div>
                <i class="mdi mdi-magnify search-icon" type="button"
                   onclick="location.href = '{{ url()->current() }}?fromOld=' + document.getElementById('fromOld').value + '&toOld=' + document.getElementById('toOld').value;"
                   style="font-size: 23px;">
                </i>
            </div>
        </div>


    </div>
    <table class="table table-striped table-centered mb-0">
        <thead>
        <tr>
            <th>Avatar</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Faculty</th>
            <th>Subjects</th>
            <th>Average</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Action</th>
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
                       href="{{ route('edu.students.profile_student', $student->id) }}">{{ $student->user->name }}</a>
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
                    {{ $student->faculty->name }}</td>
                <td>
                    <a href="{{ route('edu.points.list_point_students', $student->id)  }}"
                       title="Preview courses and score of student">
                        {{ count($student->subjects->pluck('id')->toArray()) }}
                    </a>
                </td>
                <td></td>
                <td title="{{ $student->created_at }}"
                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 13ch;">{{ $student->created_at }}</td>
                <td title="{{ $student->updated_at }}"
                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 13ch;">{{ $student->updated_at }}</td>
                <td class="table-action">
                    <form action="{{ route('edu.students.delete_student', $student->id) }}" method="POST">
                        @method('delete')
                        @csrf
                        <a class="btn btn-primary" style="width: 70px;"
                           href="{{ route('edu.students.edit_student', $student->id) }}">Edit</a>
                        <input class="btn btn-danger" style="width: 70px;" type="submit"
                               onclick="return window.confirm('Are you sure?');" value="Delete"/>
                    </form>
                    @foreach($faculties as $faculty)
                        @if ($student->faculty_id == $faculty->id)
                            @if(count($student->subjects->pluck('id')->toArray())
                                < count($faculty->subjects->pluck('id')->toArray()))
                                <form action="{{ route('edu.students.notification', $student->id)  }}" method="post">
                                    @csrf
                                    <input type="hidden" name="email" value="{{ $student->user->email }}">
                                    <input type="hidden" name="user_id" value="{{ $student->user_id }}">
                                    <input class="btn btn-warning" style="width: 70px;" type="submit" value="Send"/>
                                </form>

                            @endif
                        @endif
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ $students->links() }}
    </div>

    @push('scripts')
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
