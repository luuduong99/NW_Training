@extends('layouts.master')
@section('title', 'Subjects')
@section('subTitle', 'List')
@section('content')
    <div style="width: 100%; display: flex; justify-content: space-between">
        @if (Auth::user()->role->role == '0')
            <div class="col-sm-4" style="padding: 0">
                <a href="{{ route('subjects.create') }}" class="btn btn-success mb-2"><i
                        class="mdi mdi-plus-circle mr-2"></i>
                    {{ __('Add Subject') }}
                </a>
            </div>
        @endif
    </div>
    @if(!isset($subjects))
        <h1 style="text-align: center;">Not data</h1>
    @else
        <table class="table table-striped table-centered mb-0">
            <thead>
            <tr>
                @if (Auth::user()->role->role == '1')
                    <th></th>
                @endif
                <th>{{ __('Name') }}</th>
                <th>{{ __('Description') }}</th>
                <th>{{ __('Faculty') }}</th>
                @if (Auth::user()->role->role == '1')
                    <th>{{ __('Point') }}</th>
                @endif
                <th>{{ __('Created_at') }}</th>
                <th>{{ __('Updated_at') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
            </thead>
            <tbody>
            {!! Form::open(['route' => 'students.register-multiple-subject',
            'method' => 'post', 'id' => 'multiple_submit']) !!}
            @if (Auth::user()->role->role == '1' &&
            count(Auth::user()->student->faculty->subjects) > count(Auth::user()->student->subjects))
                {!! Form::submit(__('Register Multiple Subject'),
                ['class' => 'btn btn-primary', 'style' => 'float: right']) !!}
            @endif
            @foreach ($subjects as $subject)
                <tr>
                    @if (Auth::user()->role->role == '1')
                        <td>
                            @if(isset($results))
                                {!! Form::checkbox('subject_id[]', $subject->id,
                                in_array($subject->id, $results), ['disabled' => in_array($subject->id, $results)]) !!}
                            @endif
                        </td>
                    @endif
                    <td><a href="">{{ __($subject->name) }}</a></td>
                    <td>{{ __($subject->description) }}</td>
                    <td>{{ __($subject->faculty->name) }}</td>
                    @if (Auth::user()->role->role == '1')
                        <td>
                            @if (Auth::user()->student->subjects->pluck('pivot.point')->first() != [])
                            {{Auth::user()->student->subjects->pluck('pivot.point')->first() }}
                            @else
                                <span>{{ __('Chưa Có Điểm') }}</span>
                            @endif
                        </td>
                    @endif
                    <td>{{ $subject->created_at }}</td>
                    <td>{{ $subject->updated_at }}</td>
                    <td class="table-action">
                        @if (Auth::user()->role->role == '0')
                            <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-primary">
                                <i class="mdi mdi-square-edit-outline"></i>
                            </a>
                            @if (count($subject->students) == 0)
                                <button value="{{ $subject->id }}" class="btn btn-danger delete-link">
                                    <i class="mdi mdi-delete"></i>
                                </button>
                            @else
                                <span class="btn btn-danger"
                                      onclick="return window.alert('It is not possible ' +
                               'to delete a subject that has already been registered');">
                        <i class="mdi mdi-delete"></i>
                    </span>
                            @endif
                        @else
                            @if (isset($results) && in_array($subject->id, $results ))
                                <span>{{ __('Đã Đăng Kí') }}</span>
                            @else
                                <span>{{ __('Chưa Đăng Kí') }}</span>
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
            {!! Form::close() !!}
            </tbody>
        </table>

        <div style="padding-top: 10px;">
            {{ $subjects->links() }}
        </div>

        {!! Form::open(['route' => ['subjects.destroy', $subject->id], 'method' => 'delete', 'id' => 'delete-form']) !!}
        {!! Form::close() !!}
    @endif

    @push('scripts')
        <script>
            $(document).ready(function () {
                $(".delete-link").click(function (e) {
                    e.preventDefault();

                    var subjectId = $(this).val();
                    var newAction = "{{ route('subjects.destroy', ':id') }}";
                    var action = newAction.replace(':id', subjectId);
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
                        heading: '{{ __('Subject') }}',
                        text: '<h6>{{ __(Session::get("success")) }}</h6>',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right',
                    })
                }

                if (errors) {
                    $.toast({
                        heading: '{{ __('Delete subject false') }}',
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
