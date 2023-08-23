@extends('layouts.master')
@section('title', 'Points')
@section('subTitle', 'List point of student')
@section('content')

    {!! Form::open(['route' => ['students.add_point_multiple', $id], 'method' => 'post', 'id' => 'add-point']) !!}
    <div class="form-row" style="display: flex; margin-bottom: 15px;">
        {!! Form::button('<i class="mdi mdi-tray-plus"></i>', ['class' => 'btn btn-success add']) !!}
        {!! Form::submit(__('Add Point'), ['class' => 'btn btn-primary ml-2', 'id' => 'btn-addPoint']) !!}
    </div>
        <span class="btn-errors" style="color: red;">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </span>
    <div class="select-point">
        @foreach($subjectsWithPoint as $index => $subjectWithPoint)
            <div class="form-row input-point">
                <div class="form-group col-md-6">
                    {!! Form::label('subject', __('Subject'), ['class' => 'col-form-label']) !!}
                    {{-- null is value default--}}
                    {!! Form::select('subject[]', ['' => __('Choose Subject')]
                    + collect($student->subjects)->mapWithKeys(function ($subject) {
                        return [$subject->id => __($subject->name)];
                        })->toArray(), $subjectWithPoint->id,
                    ['class' => 'form-control subject']) !!}
                    <span class="text-danger error-text error-subject"></span>
                </div>
                <div class="form-group col-md-4">
                    {!! Form::label('point', __('Point'), ['class' => 'col-form-label']) !!}
                    {!! Form::number('point[]', isset($subjectWithPoint->pivot->point) ? $subjectWithPoint->pivot->point : '',
                    ['class' => 'form-control point']) !!}
                    <span class="text-danger error-text error-point"></span>
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
            $(document).ready(function () {
                var limit = "{{ count($student->subjects)  }}";
                var clickLimit = $('.select-point .subject').length;
                var optionValue = getOptionSelected();


                addIdInput();
                addIdSelect();
                filterSubject(optionValue);
                disableButton(clickLimit, limit);
                disableAddPoint(clickLimit);

                function getOptionSelected() {
                    return $('.select-point .subject option:selected').map(function () {
                        return $(this).val();
                    }).get();
                }

                function disableButton(clickLimit, limit) {
                    if (clickLimit == limit) {
                        $('.add').prop('disabled', true);
                    }
                }

                function disableAddPoint(clickLimit) {
                    if (clickLimit == 0) {
                        $('#btn-addPoint').prop('disabled', true);
                    } else {
                        $('#btn-addPoint').prop('disabled', false);
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
                    $(this).closest('.input-point').remove();
                    $('.add').removeAttr('disabled');
                    clickLimit--;
                    optionValue = getOptionSelected();
                    filterSubject(optionValue);
                    addIdInput();
                    addIdSelect();
                    disableAddPoint(clickLimit);
                });

                $('.add').on('click', function (e) {
                    ++clickLimit;
                    disableButton(clickLimit, limit);
                    disableAddPoint(clickLimit);

                    console.log(clickLimit);
                    let html = `
                        <div class="form-row input-point">
                            <div class="form-group col-md-6">
                                {!! Form::label('subject', __('Subject'), ['class' => 'col-form-label']) !!}
                    {!! Form::select('subject[]', ['' => __('Choose Subject')] +
                    collect($student->subjects)->mapWithKeys(function ($subject) {
                        return [$subject->id => __($subject->name)];
                        })->toArray(), null,
                    ['class' => 'form-control subject']) !!}
                    <span class="text-danger error-text error-subject"></span>
                    </div>
                    <div class="form-group col-md-4">
                    {!! Form::label('point', __('Point'), ['class' => 'col-form-label']) !!}
                    {!! Form::number('point[]', null, ['class' => 'form-control point']) !!}
                    <span class="text-danger error-text error-point"></span>
                    </div>
                    <div class="form-group col-md-2">
                    {!! Form::button('<i class="mdi mdi-tray-minus"></i>', ['class' => 'btn btn-danger minus',
                                            'style' => 'margin-top: 37px;']) !!}
                    </div>`;
                    $('.select-point').append(html)

                    optionValue = getOptionSelected()
                    filterSubject(optionValue)
                    addIdInput()
                    addIdSelect()
                });

                $('.select-point').on('change', '.subject', function () {
                    optionValue = getOptionSelected()
                    filterSubject(optionValue)
                    let data = {
                        student_id: "{{ $id }}",
                        subject_id: $(this).val(),
                    };

                    $.ajax({
                        type: "post",
                        url: '{{ route('students.get_point') }}',
                        data: JSON.stringify(data),
                        processData: false,
                        cache: false,
                        contentType: 'application/json',
                        success: function (response) {
                            console.log(response);
                            $(this).parents('.input-point').find('.point').val(response)
                        }
                    });
                });

                function addIdInput() {
                    $('.select-point .error-point').each(function (index) {
                        let uniqueId = 'point.' + index
                        $(this).attr('id', uniqueId)
                    });
                }

                function addIdSelect() {
                    $('.select-point .error-subject').each(function (index) {
                        let uniqueId = 'subject.' + index
                        $(this).attr('id', uniqueId)
                    });
                }

                @php
                    $errorMessages = $errors->all();
                @endphp

                var test = @json($errorMessages);

                console.log(test);
            });
        </script>
    @endpush
@endsection
