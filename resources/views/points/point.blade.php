@extends('layouts.master')
@section('content')
    <div style="width: 100%; display: flex;">
        <div class="col-sm-2" style="padding: 0">
            <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#exampleModal">
                <i class="mdi mdi-plus-circle mr-2"></i>
                {{ __('Add Multiple Point') }}
            </button>
        </div>
    </div>
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
                    @if($result->pivot->point)
                        {{ $result->pivot->point  }}
                    @else
                        <span>{{ __('Chưa Có Điểm') }}</span>
                    @endif
                </td>
                <td>
                    {!! Form::open(['route' => ['edu.points.add_point_student', $id], 'method' => 'post']) !!}
                    {!! Form::hidden('student_id', $student->id) !!}
                    {!! Form::hidden('subject_id', $result->id) !!}
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
    {{ $data->links() }}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            {!! Form::open(['route' => ['edu.points.multiple_add_point', $id], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Add Point') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row" style="display: flex; justify-content: end;">
                        <button type="button" class="btn btn-success add">
                            <i class="mdi mdi-tray-plus" title="{{ __('Add point') }}"></i>
                        </button>
                    </div>
                    <div class="select-point">
                        <div class="form-row input-point">
                            <div class="form-group col-md-6">
                                {!! Form::label('subject', __('Subject'), ['class' => 'col-form-label']) !!}
                                {!! Form::select('subject[]', ['' => __('Choose Subject')] + $subjects->pluck('name', 'id')->toArray(), null, ['class' => 'form-control subject']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('point', __('Point'), ['class' => 'col-form-label']) !!}
                                {!! Form::number('point[]', null, ['step' => '0.01', 'required', 'min' => '0', 'max' => '10', 'class' => 'form-control', 'id' => 'point']) !!}
                            </div>
                            <div class="form-group col-md-2">
                                <button type="button" class="btn btn-danger minus" style="margin-top: 37px;">
                                    <i class="mdi mdi-tray-minus" title="{{ __('Delete') }}"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    {!! Form::submit(__('Add Point'), ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <script>
        $(document).ready(function () {
            var clickCount = 0;
            var clickLimit = {{ count($subjects)  }};
            if (clickLimit != 0) {
                $('.add').on('click', function (e) {
                    clickCount++;
                    if (clickCount === clickLimit) {
                        $('.add').prop('disabled', true);
                    }

                    var html = `<div class="form-row input-point">
                                    <div class="form-group col-md-6">
                                        {!! Form::label('subject', __('Subject'), ['class' => 'col-form-label']) !!}
                                        {!! Form::select('subject[]', ['' => __('Choose Subject')] +
                                        $subjects->pluck('name', 'id')->toArray(), null,
                                        ['class' => 'form-control subject']) !!}
                                    </div>
                                    <div class="form-group col-md-4">
                                        {!! Form::label('point', __('Point'), ['class' => 'col-form-label']) !!}
                                        {!! Form::number('point[]', null, ['step' => '0.01', 'required',
                                        'min' => '0', 'max' => '10', 'class' => 'form-control', 'id' => 'point']) !!}
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button type="button" class="btn btn-danger minus" style="margin-top: 37px;">
                                            <i class="mdi mdi-tray-minus" title="{{ __('Delete') }}"></i>
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
            }


            $('.select-point').on('click', '.minus', function () {
                // Xử lý sự kiện click trên phần tử mới
                $(this).closest('.input-point').remove();
                clickLimit += 1;
                $('.add').removeAttr('disabled');
            });

        });
    </script>
@endsection
