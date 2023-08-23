@extends('layouts.master')
@section('title', 'Faculties')
@section('subTitle', 'List')
@section('content')

    <div style="width: 100%; display: flex;justify-content: space-between">
        <div class="col-sm-4" style="padding: 0">
            <a href="{{ route('faculties.create') }}" class="btn btn-success mb-2"><i
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
                        <a href="{{ route('faculties.edit', $faculty->id) }}" class="btn btn-primary">
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

        {!! Form::open(['route' => ['faculties.destroy', $faculty->id], 'method' => 'DELETE', 'id' => 'delete-form']) !!}
        {!! Form::close() !!}
    @endif


    @push('scripts')
        <script>
            $(document).ready(function () {
                $(".delete-faculty").click(function (e) {
                    e.preventDefault();

                    var facultyId = $(this).val();
                    var newAction = "{{ route('faculties.destroy', ':id') }}";
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
                var success = "{{ Session::has('success') }}";
                var errors = "{{ Session::has('errors') }}";

                if (success) {
                    $.toast({
                        heading: '{{ __('Faculty') }}',
                        text: '<h6>{{ __(Session::get("success")) }}</h6>',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right',
                    })
                }

                if (errors) {
                    $.toast({
                        heading: '{{ __('Delete faculty false') }}',
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
