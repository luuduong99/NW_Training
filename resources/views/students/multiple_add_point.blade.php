@extends('layouts.master')
@section('title', 'Points')
@section('subTitle', 'List point of student')
@section('content')

    {!! Form::open(['method' => 'post', 'id' => 'add-point']) !!}
    <div class="form-row" style="display: flex; margin-bottom: 15px;">
        {!! Form::button('<i class="mdi mdi-tray-plus"></i>', ['class' => 'btn btn-success add']) !!}
        {!! Form::submit(__('Add Point'), ['class' => 'btn btn-primary ml-2', 'id' => 'btn-addPoint']) !!}
    </div>
    <div class="select-point">
        @foreach($subjectsWithPoint as $subjectWithPoint)
            <div class="form-row input-point">
                <div class="form-group col-md-6">
                    {!! Form::label('subject', __('Subject'), ['class' => 'col-form-label']) !!}
                    {{-- null is value default--}}
                    {!! Form::select('subject[]', ['' => __('Choose Subject')]
                    + $student->subjects->pluck('name', 'id')->toArray(), $subjectWithPoint->id,
                    ['class' => 'form-control subject']) !!}
                </div>
                <div class="form-group col-md-4">
                    {!! Form::label('point', __('Point'), ['class' => 'col-form-label']) !!}
                    {!! Form::number('point[]', $subjectWithPoint->pivot->point ? $subjectWithPoint->pivot->point : '',
                    ['step' => '0.01', 'required', 'min' => '0', 'max' => '10',
                    'class' => 'form-control point']) !!}
                </div>
                <div class="form-group col-md-2">
                    {!! Form::button('<i class="mdi mdi-tray-minus"></i>', ['class' => 'btn btn-danger minus',
                    'style' => 'margin-top: 37px;']) !!}
                </div>
            </div>
        @endforeach
    </div>
    {!! Form::close() !!}

    @push('scripts')
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function () {
                var limit = "{{ count($student->subjects)  }}";
                var clickLimit = $('.select-point .subject').length;
                var optionValue = getOptionSelected();

                filterSubject(optionValue);
                disableButton(clickLimit, limit)

                function getOptionSelected() {
                    var selectedValues = $('.select-point .subject option:selected').map(function () {
                        return $(this).val();
                    }).get();

                    return selectedValues;
                }

                function disableButton(clickLimit, limit) {
                    if (clickLimit == limit) {
                        $('.add').prop('disabled', true);
                    }
                }

                function filterSubject(e) {
                    $('.subject').each(function () {
                        $(this).find('option').each(function () {
                            if ($.inArray($(this).val(), e) !== -1) {
                                $(this).hide();
                            } else {
                                $(this).show();
                            }
                        });
                    });
                }

                $('.select-point').on('click', '.minus', function () {
                    // Xử lý sự kiện click trên phần tử mới
                    $(this).closest('.input-point').remove();
                    $('.add').removeAttr('disabled');
                    clickLimit--;
                    optionValue = getOptionSelected()
                    filterSubject(optionValue);
                });

                $('.add').on('click', function (e) {
                    ++clickLimit;
                    disableButton(clickLimit, limit);

                    var html = `
                        <div class="form-row input-point">
                            <div class="form-group col-md-6">
                                {!! Form::label('subject', __('Subject'), ['class' => 'col-form-label']) !!}
                    {!! Form::select('subject[]', ['' => __('Choose Subject')] +
                    $student->subjects->pluck('name', 'id')->toArray(), null,
                    ['class' => 'form-control subject']) !!}
                    </div>
                    <div class="form-group col-md-4">
                    {!! Form::label('point', __('Point'), ['class' => 'col-form-label']) !!}
                    {!! Form::number('point[]', null, ['step' => '0.01', 'required',
                    'min' => '0', 'max' => '10', 'class' => 'form-control point']) !!}
                    </div>
                    <div class="form-group col-md-2">
                    {!! Form::button('<i class="mdi mdi-tray-minus"></i>', ['class' => 'btn btn-danger minus',
                                'style' => 'margin-top: 37px;']) !!}
                    </div>`;
                    $('.select-point').append(html);

                    optionValue = getOptionSelected();
                    filterSubject(optionValue);

                });

                $('.select-point').on('change', '.subject', function () {
                    optionValue = getOptionSelected();
                    filterSubject(optionValue);
                    var data = {
                        student_id: "{{ $id }}",
                        subject_id: $(this).val(),
                    };

                    var $this = $(this);

                    $.ajax({
                        type: "post",
                        url: '{{ route('edu.students.get-point') }}',
                        data: JSON.stringify(data),
                        processData: false,
                        cache: false,
                        contentType: 'application/json',
                        success: function (response) {
                            console.log(response);
                            $this.parents('.input-point').find('.point').val(response);
                        }
                    });
                });

                $('#btn-addPoint').on('click', function (e) {
                    e.preventDefault();

                    let data = new FormData($('#add-point')[0]);
                    data.append('student_id', {{ $id }});

                    $.ajax({
                        type: "post",
                        url: "{{ route('edu.students.add-point') }}",
                        data: data,
                        processData: false,
                        cache: false,
                        contentType: false,
                        success: function (response) {
                            console.log(response);
                        },
                        error: function (xhr, status, error) {
                            console.log(xhr, status, error);
                        }
                    });
                });
            });


        </script>
    @endpush
@endsection
