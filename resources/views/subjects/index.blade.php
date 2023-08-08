@extends('layouts.master')
@section('content')
    <div style="width: 100%; display: flex;justify-content: space-between">
        <div class="col-sm-4" style="padding: 0">
            <a href="{{ route('edu.subjects.create') }}" class="btn btn-success mb-2"><i
                    class="mdi mdi-plus-circle mr-2"></i>
                Add Subject
            </a>
        </div>
    </div>
    <table class="table table-striped table-centered mb-0">
        <thead>
        <tr>
            @if (Auth::user()->role->role == 'student')
                <th></th>
            @endif
            <th>Name</th>
            <th>Description</th>
            <th>Faculty</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <form action="{{ route('edu.students.register_multiple_subject')  }}" method="post"
              id="multiple_submit">
            @csrf
            @if (Auth::user()->role->role == 'student')
                <input style="float: right" class="btn btn-primary" type="submit"
                       value="Register Multiple Subject"/>
            @endif
            @foreach ($subjects as $subject)
                <tr>
                    @if (Auth::user()->role->role == 'student')
                        <td>
                            <input name="subject_id[]"
                                   {{ in_array($subject->id, $results) ? 'checked disabled' : '' }}
                                   type="checkbox" value="{{ $subject->id }}">
                        </td>
                    @endif
                    <td><a href="">{{ $subject->name }}</a>
                    </td>
                    <td>{{ $subject->description }}</td>
                    <td>{{ $subject->faculty->name }}</td>
                    <td>{{ $subject->created_at }}</td>
                    <td>{{ $subject->updated_at }}</td>
                    <td class="table-action">
                        @if(Auth::user()->role->role == 'admin')
                            <a class="btn btn-primary" style="width:70px;"
                               href="{{ route('edu.subjects.edit', $subject->id) }}">Edit</a>
                            @if(!in_array($subject->id, $array))
                                <button style="width:70px;" value="{{ $subject->id }}"
                                        class="btn btn-danger delete-link">Xóa
                                </button>
                            @else
                                <span style="width:70px;" class="btn btn-danger"
                                      onclick=" return window.alert('It is not possible to delete a subject'
                                      +'that has already been registered');">Delete</span>
                            @endif
                        @else
                            @if (in_array($subject->id, $results))
                                <span>Đã đăng kí</span>
                            @else
                                <span>Chưa đăng kí</span>
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
        </form>
        </tbody>
    </table>
    <div style="padding-top: 10px;">
        {{ $subjects->links() }}
    </div>
    <script>
        $(document).ready(function () {
            $(".delete-link").click(function (e) {
                e.preventDefault();

                var subjectId = $(this).val();
                var newAction = "{{ route('edu.subjects.destroy', ':id') }}";
                var action = newAction.replace(':id', subjectId);
                $("#delete-form").attr("action", action);
                var confirmDelete = confirm('Are you sure?');

                if (confirmDelete) {
                    $("#delete-form").submit();
                }
            });
        });
    </script>
    <form action="{{ route('edu.subjects.destroy', $subject->id) }}" method="POST" id="delete-form">
        @method('delete')
        @csrf
    </form>

    {{--    <form action="{{ route('edu.subjects.delete', $subject->id) }}" method="POST">--}}
    {{--        @method('delete')--}}
    {{--        @csrf--}}
    {{--        <a class="btn btn-primary" style="width:70px;"--}}
    {{--           href="{{ route('edu.subjects.edit', $subject->id) }}">Edit</a>--}}
    {{--        @if(!in_array($subject->id, $array))--}}
    {{--            <input style="width:70px;" class="btn btn-danger" type="submit"--}}
    {{--                   onclick=" return window.confirm('Are you sure?');" value="Delete"/>--}}
    {{--        @else--}}
    {{--            <span style="width:70px;" class="btn btn-danger"--}}
    {{--                  onclick=" return window.alert('It is not possible to delete a subject ' +--}}
    {{--                                                       'that has already been registered');">Delete</span>--}}
    {{--        @endif--}}

    {{--    </form>--}}


    <script>
        $(document).ready(function () {
            $success = "{{ Session::has('add_subject') }}";
            $update = "{{ Session::has('update_subject') }}";
            $delete = "{{ Session::has('delete_subject') }}";

            if ($success) {
                $.toast({
                    heading: 'Add subject',
                    text: '<h6>{{ Session::get("add_subject") }}</h6>',
                    showHideTransition: 'slide',
                    icon: 'success',
                    position: 'top-right',
                })
            }

            if ($update) {
                $.toast({
                    heading: 'Update subject',
                    text: '<h6>{{ Session::get("update_subject") }}</h6>',
                    showHideTransition: 'slide',
                    icon: 'info',
                    position: 'top-right',
                })
            }

            if ($delete) {
                $.toast({
                    heading: 'Delete subject',
                    text: '<h6>{{ Session::get("delete_subject") }}</h6>',
                    showHideTransition: 'slide',
                    icon: 'error',
                    position: 'top-right',
                })
            }
        });
    </script>
@endsection
