@extends('layouts.master')
@section('content')
    <table class="table table-striped table-centered mb-0">
        <thead>
        <tr>
            <th>Student Name</th>
            <th>Subject Name</th>
            <th>Faculty</th>
            <th>Point</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $result)
            <tr>
                <td>
                    @foreach ($students as $student)
                        @if($result->student_id == $student->id)
                            {{ $student->user->name }}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($students as $student)
                        @foreach ( $student->subjects as $subject)
                            @if($result->subject_id == $subject->id && $result->student_id == $student->id)
                                {{ $subject->name }}
                            @endif
                        @endforeach
                    @endforeach
                </td>
                <td>{{ $result->faculty_id  }}</td>
                <td>
                    @if($result->point)
                        {{ $result->point  }}
                    @else
                        <span>Chưa có kết quả</span>
                    @endif
                </td>
                <td>
                    @if(!$result->point && Auth::user()->role->role == 'admin')
                        <form action="{{ route('edu.points.add_point_student', $id) }}" method="post">
                            @csrf
                            <input type="hidden" name="student_id" value="{{$result->student_id}}">
                            <input type="hidden" name="subject_id" value="{{$result->subject_id}}">
                            <input type="hidden" name="faculty_id" value="{{$result->faculty_id}}">
                            <input type="number" step="0.01" required min="0" max="10" name="point">
                            <input type="submit" class="btn btn-primary" value="Add Point">
                        </form>
                    @elseif($result->point && Auth::user()->role->role == 'admin')
                        <form action="{{ route('edu.points.add_point_student', $id) }}" method="post">
                            @csrf
                            <input type="hidden" name="student_id" value="{{$result->student_id}}">
                            <input type="hidden" name="subject_id" value="{{$result->subject_id}}">
                            <input type="hidden" name="faculty_id" value="{{$result->faculty_id}}">
                            <input type="number" step="0.01" required min="0" max="10" name="point">
                            <input type="submit" class="btn btn-primary" value="Update Point">
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
