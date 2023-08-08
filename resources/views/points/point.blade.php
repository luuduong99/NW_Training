@extends('layouts.master')
@section('content')
    <table class="table table-striped table-centered mb-0">
        <div class="col-sm-2" style="padding: 0">
            <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#exampleModal">
                <i class="mdi mdi-plus-circle mr-2"></i>
                Add Multiple Point
            </button>
        </div>
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
                    {{ $student->user->name }}
                </td>
                <td>
                    {{ $result->name  }}
                    {{--                    @foreach ( $student->subjects as $subject)--}}
                    {{--                        @if($result->subject_id == $subject->id && $result->student_id == $student->id)--}}
                    {{--                            {{ $subject->name }}--}}
                    {{--                        @endif--}}
                    {{--                    @endforeach--}}
                </td>
                <td>{{ $result->faculty_id  }}</td>
                <td>
                    @if($result->pivot->point)
                        {{ $result->pivot->point  }}
                    @else
                        <span>Chưa có kết quả</span>
                    @endif
                </td>
                <td>
                    @if(!$result->point && Auth::user()->role->role == 'admin')
                        <form action="{{ route('edu.points.add_point_student', $id) }}" method="post">
                            @csrf
                            <input type="hidden" name="student_id" value="{{$student->id}}">
                            <input type="hidden" name="subject_id" value="{{$result->id}}">
                            <input type="hidden" name="faculty_id" value="{{$result->faculty_id}}">
                            <input type="number" step="0.01" required min="0" max="10" name="point">
                            <input type="submit" class="btn btn-primary" value="Add Point">
                        </form>
                    @elseif($result->point && Auth::user()->role->role == 'admin')
                        <form action="{{ route('edu.points.add_point_student', $id) }}" method="post">
                            @csrf
                            <input type="hidden" name="student_id" value="{{$student->id}}">
                            <input type="hidden" name="subject_id" value="{{$result->id}}">
                            <input type="hidden" name="faculty_id" value="{{$result->faculty_id}}">
                            <input type="hidden" step="0.01" required min="0" max="10" name="point">
                            <input type="submit" class="btn btn-primary" value="Update Point">
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $data->links() }}

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('edu.points.multiple_add_point', $id)  }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Point</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row" style="display: flex; justify-content: end;">
                            <button type="button" class="btn btn-success add">
                                <i class="mdi mdi-tray-plus" title="Add point"></i>
                            </button>
                        </div>
                        <div class="select-point">
                            <div class="form-row input-point">
                                <div class="form-group col-md-6">
                                    <label for="subject" class="col-form-label">Subject</label>
                                    <select id="subject" name="subject[]" class="form-control subject">
                                        <option value="">Choose Subject</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="point" class="col-form-label">Point</label>
                                    <input type="number" step="0.01" required min="0" max="10" name="point[]"
                                           class="form-control" id="point">
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="button" class="btn btn-danger minus" style="margin-top: 37px;">
                                        <i class="mdi mdi-tray-minus" title="Delete"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Add Point">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            var clickCount = 1;
            var clickLimit = {{ count($subjects)  }};
            $('.add').on('click', function (e) {
                clickCount++;
                if (clickCount === clickLimit) {
                    $('.add').prop('disabled', true);
                }

                var html = `<div class="form-row input-point">
                        <div class="form-group col-md-6">
                            <label for="subject" class="col-form-label">Subject</label>` + `
                            <select id="subject" name="subject[]" class="form-control subject">
                                <option value="">Choose Subject</option>` +
                                `@foreach ($subjects as $subject)` +
                                `<option value="{{ $subject->id }}">{{ $subject->name }}</option>` +
                                ` @endforeach`
                            + `</select>
                                 </div>
                            <div class="form-group col-md-4">
                                <label for="point" class="col-form-label">Point</label>
                                <input type="number" step="0.01" required min="0" max="10" name="point[]"
                                       class="form-control" id="point">
                            </div>
                             <div class="form-group col-md-2">
                                            <button type="button" class="btn btn-danger minus" style="margin-top: 37px;">
                                                <i class="mdi mdi-tray-minus" title="Delete"></i>
                                            </button>
                                        </div>
                            </div>`;
                $('.select-point').append(html);

                var array = [];
                $('.select-point').on('change', '.subject', function () {
                    var selectedValue = $(this).val();
                    array.push(selectedValue);
                    console.log(array);
                    console.log(selectedValue);
                    $('.subject').each(function () {
                        var select = $(this);
                        select.find('option').each(function () {
                            var option = $(this);

                            if (!$.inArray(option.val(), array)) {
                                // Ẩn option này đi
                                option.hide();
                            } else {
                                // Hiển thị lại các option khác
                                option.show();
                            }
                        });
                    });
                });
            });

            $('.select-point').on('click', '.minus', function () {
                // Xử lý sự kiện click trên phần tử mới
                $(this).closest('.input-point').remove();
                clickLimit += 1;
                $('.add').removeAttr('disabled');
            });

        });
    </script>
@endsection
