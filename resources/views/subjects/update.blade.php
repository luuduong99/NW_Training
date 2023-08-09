@extends('layouts.master')
@section('content')
    {!! Form::open(['route' => ['edu.subjects.destroy', $subject->id], 'method' => 'DELETE',
    'style' => 'margin-bottom: 10px;']) !!}
    {!! Form::button(__('Delete Subject'), ['class' => 'btn btn-danger', 'type' => 'submit',
    'style' => 'float: right;', 'onclick' => "return window.confirm('Are you sure?');"]) !!}
    {!! Form::close() !!}

    {!! Form::open(['route' => ['edu.subjects.update', $subject->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'id' => 'ajax-form']) !!}
    @csrf
    <div class="form-group">
        <label for="name" class="col-form-label">{{ __('Subject Name') }}</label>
        {!! Form::text('name', old('name') ? old('name') : $subject->name, ['class' => 'form-control']) !!}
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="faculty_id" class="col-form-label">{{ __('Choose Faculty') }}</label>
            {!! Form::select('faculty_id', $faculties->pluck('name', 'id'), $subject->faculty_id, ['class' => 'form-control', 'id' => 'faculty_id']) !!}
        </div>
    </div>

    {!! Form::submit(__('Update Subject'), ['class' => 'btn btn-primary', 'id' => 'btn-submit']) !!}
    {!! Form::close() !!}

@endsection
