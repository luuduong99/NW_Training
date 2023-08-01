@extends('layouts.master')
@section('content')
<div style="width: 100%; display: flex;justify-content: space-between">
    <div class="col-sm-4" style="padding: 0">
        <a href="{{ route('edu.subjects.create_subject') }}" class="btn btn-success mb-2"><i class="mdi mdi-plus-circle mr-2"></i>
            Add Subject
        </a>
    </div>
</div>
<table class="table table-striped table-centered mb-0">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Faculty</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subjects as $subject)
        <tr>
            <td><a href="">{{ $subject->name }}</a>
            </td>
            <td>{{ $subject->description }}</td>
            <td>{{ $subject->faculty->name }}</td>
            <td>{{ $subject->created_at }}</td>
            <td>{{ $subject->updated_at }}</td>
            <td class="table-action">
                <form action="{{ route('edu.subjects.delete_subject', $subject->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <a class="btn btn-primary" style="width:70px;" href="{{ route('edu.subjects.edit_subject', $subject->id) }}">Edit</a>
                    <input style="width:70px;" class="btn btn-danger" type="submit" onclick=" return window.confirm('Are you sure?');" value="Delete" />
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div style="padding-top: 10px;">
    {{ $subjects->links() }}
</div>


<script>
    $(document).ready(function() {
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