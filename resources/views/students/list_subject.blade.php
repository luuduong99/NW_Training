@extends('layouts.master')
@section('title', 'Points')
@section('subTitle', 'List point of student')
@section('content')
    <div style="width: 100%; display: flex;">
        <div class="col-sm-2" style="padding: 0">
            <a href="{{ route('students.point', $id) }}" class="btn btn-success mb-2">
                <i class="mdi mdi-plus-circle mr-2"></i>
                {{ __('Add Multiple Point') }}
            </a>
        </div>
    </div>
    @if($errors->any())
        <span class="btn-errors" style="color: red;">
        @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
    </span>
    @endif
    <table class="table table-striped table-centered mb-0">
        <thead>
        <tr>
            <th>{{ __('Student Name') }}</th>
            <th>{{ __('Subject Name') }}</th>
            <th>{{ __('Faculty') }}</th>
            <th>{{ __('Point') }}</th>
            <th>{{ __('Action') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $result)
            <tr>
                <td>
                    {{ $student->user->name }}
                </td>
                <td>
                    {{ __($result->name) }}
                </td>
                <td>{{ $result->faculty_id  }}</td>
                <td>
                    @if(!isset($result->pivot->point))
                        <span>{{ __('Chưa Có Điểm') }}</span>
                    @else
                        {{ $result->pivot->point  }}
                    @endif
                </td>
                <td>
                    {!! Form::open(['route' => ['students.add_point', $id], 'method' => 'post']) !!}
                    {!! Form::hidden('student_id', $student->id) !!}
                    {!! Form::hidden('subject_id', $result->id) !!}
                    {!! Form::hidden('faculty_id', $result->faculty_id) !!}
                    {!! Form::number('point', null) !!}

                    @if(!$result->point && Auth::user()->role->role == '0')
                        {!! Form::submit(__('Add Point'), ['class' => 'btn btn-primary']) !!}
                    @else
                        {!! Form::submit(__('Update Point'), ['class' => 'btn btn-primary']) !!}
                    @endif
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $data->links() }}

    @push('scripts')
        <script>
            $(document).ready(function () {
                var successPoint = "{{ Session::has('success') }}";
                var falsePoint = "{{ Session::has('errors') }}";

                if (successPoint) {
                    $.toast({
                        heading: '{{ __('Add point') }}',
                        text: '<h6>{{ __(Session::get("success")) }}</h6>',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right',
                    })
                }

                if (falsePoint) {
                    $.toast({
                        heading: '{{ __('Add point') }}',
                        text: '<h6>{{ __(Session::get("errors")) }}</h6>',
                        showHideTransition: 'slide',
                        icon: 'error',
                        position: 'top-right',
                    })
                }
            });
        </script>
    @endpush
@endsection
