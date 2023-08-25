@extends('layouts.master')
@section('title', 'Students')
@section('subTitle', 'Create Student')
@section('content')
    {!! Form::model(isset($student) ?: '' ,
        ['route' => isset($student) ? ['students.update', $student->id] : 'students.store',
        'method' => isset($student) ? 'PUT' : 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('name', __('Student Name'), ['class' => 'col-form-label']) !!}
        {!! Form::text('name', isset($student) ? old('name', __($student->user->name)) : old('name'),
        ['class' => 'form-control']) !!}
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            {!! Form::label('email', __('Email'), ['class' => 'col-form-label']) !!}
            {!! Form::email('email', isset($student) ? old('email', __($student->user->email)) : old('email'),
            ['class' => 'form-control']) !!}
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('address', __('Address'), ['class' => 'col-form-label']) !!}
        {!! Form::text('address', isset($student) ? old('address', __($student->address)) : old('address'),
        ['class' => 'form-control']) !!}
        @error('address')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            {!! Form::label('phone', __('Phone'), ['class' => 'col-form-label']) !!}
            {!! Form::text('phone', isset($student) ? old('phone', __($student->phone)) : old('phone'),
            ['class' => 'form-control']) !!}
            @error('phone')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-4">
            {!! Form::label('gender', __('Gender'), ['class' => 'col-form-label']) !!}
            {!! Form::select('gender', ['0' => __('Other'), '1' => __('Male'), '2' => __('Female')],
            isset($student) ? __($student->gender) : null, ['class' => 'form-control']) !!}
            @error('gender')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-4">
            {!! Form::label('birthday', __('BirthDay'), ['class' => 'col-form-label']) !!}
            {!! Form::date('birthday',
            isset($student) ? Carbon\Carbon::parse($student->birthday)->format('Y-m-d') : '',
            ['class' => 'form-control']) !!}
            @error('birthday')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            {!! Form::label('role', __('Role'), ['class' => 'col-form-label']) !!}
            {!! Form::select('role', ['1' => __('Student'), '0' => __('Admin')],
            isset($student) ? __($student->role) : null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-4">
            {!! Form::label('faculty_id', __('Faculty'), ['class' => 'col-form-label']) !!}
            {!! Form::select('faculty_id',
            $faculties->mapWithkeys(function ($faculty) {
                return [$faculty->id => __($faculty->name)];
            })->toArray(),
            null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('avatar', __('Choose Avatar')) !!}
        {!! Form::file('avatar', ['accept' => '.jpg, .png, .jpeg',
        'id' => 'example-fileinput', 'class' => 'form-control-file']) !!}
        @error('avatar')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    {!! Form::submit(__('Add Student'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
