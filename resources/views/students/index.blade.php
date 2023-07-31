@extends('layouts.master')
@section('content')

<div style="width: 100%; display: flex;justify-content: space-between">
    <div class="col-sm-4" style="padding: 0">
        <a href="{{ route('edu.students.create_student') }}" class="btn btn-success mb-2"><i class="mdi mdi-plus-circle mr-2"></i>
            Add User
        </a>
    </div>
    <div class="col-sm-4" style="padding: 0">
        <li class="dropdown" style="margin-top: 22px;">
            <a class=" dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                Lọc theo tuổi
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ url()->current() }}?toOld=20">Dưới 20</a>
                <a class="dropdown-item" href="{{ url()->current() }}?fromOld=21&toOld=40">21 - 40</a>
                <a class="dropdown-item" href="{{ url()->current() }}?fromOld=40">Trên 40</a>
            </div>
        </li>
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
            <th>Number Of Subjects</th>
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
                <img src="{{ asset('images/students/'. $student->avatar) }}" alt="{{ $student->user->email }}" class="mr-2 rounded-circle" />
                @else
                <img src="{{ asset('images/default/meme-meo-like-trong-dau-kho.jpg') }}" alt="{{ $student->user->email }}" class="mr-2 rounded-circle" />
                @endif
            </td>
            <td><a title="" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 13ch;" href="">{{ $student->user->name }}</a></td>
            <td title="" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 13ch;">{{ $student->user->email }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->address }}</td>
            <td>{{ $student->gend }}</td>
            <td>{{ $student->age }}</td>
            <td> <a href="" title="Preview courses and score of student"></a></td>
            <td title="{{ $student->created_at }}" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 13ch;">{{ $student->created_at }}</td>
            <td title="{{ $student->updated_at }}" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 13ch;">{{ $student->updated_at }}</td>
            <td class="table-action">
                <form action="" method="POST">
                    @method('delete')
                    @csrf
                    <a class="btn btn-primary" style="width: 70px;" href="{{ route('edu.students.edit_student', $student->id) }}">Edit</a>
                    <input class="btn btn-danger" style="width: 70px;" type="submit" onclick="return window.confirm('Are you sure?');" value="Delete" />
                </form>

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
    $(document).ready(function() {
        $sucess = "{{ Session::has('add_student') }}";
        $update = "{{ Session::has('update_student') }}";
        $delete = "{{ Session::has('delete_student') }}";

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
    });
</script>
@endpush
@endsection