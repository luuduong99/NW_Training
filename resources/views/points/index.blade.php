@extends('layouts.master')
@section('content')
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
                    @foreach ($students as $student)
                        @if($result->student_id == $student->id)
                            {{ __($student->user->name) }}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($students as $student)
                        @foreach ( $student->subjects as $subject)
                            @if($result->subject_id == $subject->id && $result->student_id == $student->id)
                                {{ __($subject->name) }}
                            @endif
                        @endforeach
                    @endforeach
                </td>
                <td >{{ $result->faculty_id  }}</td>
                <td>
                    @if($result->point)
                        {{ $result->point  }}
                    @else
                        <span>{{ __('Chưa Có Điểm') }}</span>
                    @endif
                </td>
                <td>
                    {!! Form::open(['route' => ['edu.points.add_point'], 'method' => 'post']) !!}
                    {!! Form::hidden('student_id', $result->student_id) !!}
                    {!! Form::hidden('subject_id', $result->subject_id) !!}
                    {!! Form::hidden('faculty_id', $result->faculty_id) !!}
                    {!! Form::number('point', null, ['step' => '0.01', 'required', 'min' => '0', 'max' => '10']) !!}

                    @if(!$result->point && Auth::user()->role->role == 'admin')
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
    <div>
        {{ $data->links() }}
    </div>
@endsection
