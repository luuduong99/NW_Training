@extends('layouts.master')
@section('title', 'Faculties')
@section('subTitle', 'List')
@section('content')

    <div style="width: 100%; display: flex;justify-content: space-between">
        <div class="col-sm-4" style="padding: 0">
            <a href="{{ route('edu.faculties.create') }}" class="btn btn-success mb-2"><i
                    class="mdi mdi-plus-circle mr-2"></i>
                {{ __('Add Faculty') }}
            </a>
        </div>
    </div>
    @if(!isset($faculties))
        <h1 style="text-align: center;">Not Data</h1>
    @else
        <table class="table table-striped table-centered mb-0">
            <thead>
            <tr>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Description') }}</th>
                <th>{{ __('Created_at') }}</th>
                <th>{{ __('Updated_at') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($faculties as $faculty)
                <tr>
                    <td><a href="">{{ __($faculty->name) }}</a>
                    </td>
                    <td>{{ $faculty->description }}</td>
                    <td>{{ $faculty->created_at }}</td>
                    <td>{{ $faculty->updated_at }}</td>
                    <td class="table-action">
                        <a href="{{ route('edu.faculties.edit', $faculty->id) }}" class="btn btn-primary">
                            <i class="mdi mdi-square-edit-outline"></i></a>
                        <button class="btn btn-danger delete-faculty" value="{{ $faculty->id }}">
                            <i class="mdi mdi-delete"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div style="padding-top: 10px;">
            {{ $faculties->links() }}
        </div>

        {!! Form::open(['route' => ['edu.faculties.destroy', $faculty->id], 'method' => 'DELETE', 'id' => 'delete-form']) !!}
        {!! Form::close() !!}
    @endif


    @push('scripts')
        <script>
            $(document).ready(function () {
                $(".delete-faculty").click(function (e) {
                    e.preventDefault();

                    var facultyId = $(this).val();
                    var newAction = "{{ route('edu.faculties.destroy', ':id') }}";
                    var action = newAction.replace(':id', facultyId);
                    $("#delete-form").attr("action", action);
                    var confirmDelete = confirm('Are you sure?');

                    if (confirmDelete) {
                        $("#delete-form").submit();
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function () {
                var successFaculty = "{{ Session::has('add_faculty') }}";
                var updateFaculty = "{{ Session::has('update_faculty') }}";
                var deleteFaculty = "{{ Session::has('delete_faculty') }}";
                var deleteFalse = "{{ Session::has('delete_false') }}";

                if (successFaculty) {
                    $.toast({
                        heading: '{{ __('Add faculty') }}',
                        text: '<h6>{{ __(Session::get("add_faculty")) }}</h6>',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right',
                    })
                }

                if (updateFaculty) {
                    $.toast({
                        heading: '{{ __('Update faculty') }}',
                        text: '<h6>{{ __(Session::get("update_faculty")) }}</h6>',
                        showHideTransition: 'slide',
                        icon: 'info',
                        position: 'top-right',
                    })
                }

                if (deleteFaculty) {
                    $.toast({
                        heading: '{{ __('Delete faculty') }}',
                        text: '<h6>{{ __(Session::get("delete_faculty")) }}</h6>',
                        showHideTransition: 'slide',
                        icon: 'error',
                        position: 'top-right',
                    })
                }

                if (deleteFalse) {
                    $.toast({
                        heading: '{{ __('Delete faculty false') }}',
                        text: '<h6>{{ __(Session::get("delete_false")) }}</h6>',
                        showHideTransition: 'slide',
                        icon: 'warning',
                        position: 'top-right',
                    })
                }
            });
        </script>
    @endpush
@endsection
