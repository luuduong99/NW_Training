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
                <td >{{ $result->faculty_id  }}</td>
                <td>
                    @if($result->point)
                        {{ $result->point  }}
                    @else
                        <span>Chưa có kết quả</span>
                    @endif
                </td>
                <td class="parent">
{{--                    <button value="{{ $result->id  }}"  type="button" class="btn btn-primary add-point" data-toggle="modal" data-target="#exampleModal">--}}
{{--                        Launch demo modal--}}
{{--                    </button>--}}

                    @if(!$result->point && Auth::user()->role->role == 'admin')
                        <form action="{{ route('edu.points.add_point') }}" method="post">
                            @csrf
                            <input type="hidden" name="student_id" value="{{$result->student_id}}">
                            <input type="hidden" name="subject_id" value="{{$result->subject_id}}">
                            <input type="hidden" name="faculty_id" value="{{$result->faculty_id}}">
                            <input type="number" step="0.01" required min="0" max="10" name="point">
                            <input type="submit" class="btn btn-primary" value="Add Point">
                        </form>
                    @elseif($result->point && Auth::user()->role->role == 'admin')
                        <form action="{{ route('edu.points.add_point') }}" method="post">
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
    <div>
        {{ $data->links() }}
    </div>

    <!-- Modal -->
{{--    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    ...--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <script>
        $(document).ready(function (e) {
            $('.add-point').on('click', function () {

                // var parentElement = $(this).parent('.parent');
                // var a = parentElement.find('.add-point').val();
                console.log($(this).val());
                // var buttonId = $(this).data('button-id');
                // console.log('Button clicked with ID: ' + buttonId);
                //
                // var parentElement = $(this).closest('.parent');
                // var parentId = parentElement.data('parent-id');
                // console.log('Parent element with ID:', parentId);
            });
        });
    </script>
@endsection
