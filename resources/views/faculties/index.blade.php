@extends('layouts.master')
@section('content')

<div style="width: 100%; display: flex;justify-content: space-between">
    <div class="col-sm-4" style="padding: 0">
        <a href="{{ route('edu.faculties.create_faculty') }}" class="btn btn-success mb-2"><i class="mdi mdi-plus-circle mr-2"></i>
            Add Faculty
        </a>
    </div>
</div>
<table class="table table-striped table-centered mb-0">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($faculties as $faculty)
        <tr>
            <td><a href="">{{ $faculty->name }}</a>
            </td>
            <td>{{ $faculty->description }}</td>
            <td>{{ $faculty->created_at }}</td>
            <td>{{ $faculty->updated_at }}</td>
            <td class="table-action">
                <form action="{{ route('edu.faculties.delete_faculty', $faculty->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <a class="btn btn-primary" style="width:70px;" href="{{ route('edu.faculties.edit_faculty', $faculty->id) }}">Edit</a>
                    <input style="width:70px;" class="btn btn-danger" type="submit" onclick=" return window.confirm('Are you sure?');" value="Delete" />
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div style="padding-top: 10px;">
    {{ $faculties->links() }}
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $sucess = "{{ Session::has('add_department') }}";
        $update = "{{ Session::has('update_department') }}";
        $delete = "{{ Session::has('delete_department') }}";

        if ($sucess) {
            $.toast({
                heading: 'Add department',
                text: '<h6>{{ Session::get("add_department") }}</h6>',
                showHideTransition: 'slide',
                icon: 'success',
                position: 'top-right',
            })
        }

        if ($update) {
            $.toast({
                heading: 'Update department',
                text: '<h6>{{ Session::get("update_department") }}</h6>',
                showHideTransition: 'slide',
                icon: 'info',
                position: 'top-right',
            })
        }

        if ($delete) {
            $.toast({
                heading: 'Delete department',
                text: '<h6>{{ Session::get("delete_department") }}</h6>',
                showHideTransition: 'slide',
                icon: 'error',
                position: 'top-right',
            })
        }
    });
</script>
@endpush
@endsection