@extends('layouts.master')
@section('title', 'Students')
@section('subTitle', 'Edit Student')
@section('content')
    {!! Form::open(['route' => ['edu.students.destroy', $student->id],
        'method' => 'delete', 'style' => 'margin-bottom: 10px;']) !!}
    {!! Form::submit('Delete Student', ['class' => 'btn btn-danger',
        'style' => 'float: right;', 'onclick' => 'return window.confirm("Are you sure?");']) !!}
    {!! Form::close() !!}

    {!! Form::model($student, ['route' => ['edu.students.update', $student->id],
        'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('name', __('Student Name'), ['class' => 'col-form-label']) !!}
        {!! Form::text('name', old('name', $student->user->name), ['class' => 'form-control', 'id' => 'inputName']) !!}
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            {!! Form::label('email', __('Email'), ['class' => 'col-form-label']) !!}
            {!! Form::email('email', old('email', $student->user->email), ['class' => 'form-control', 'id' => 'inputEmail4', 'readonly']) !!}
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('address', __('Address'), ['class' => 'col-form-label']) !!}
        {!! Form::text('address', old('address', $student->address), ['class' => 'form-control', 'id' => 'inputAddress']) !!}
        @error('address')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            {!! Form::label('phone', __('Phone'), ['class' => 'col-form-label']) !!}
            {!! Form::text('phone', old('phone', $student->phone), ['class' => 'form-control', 'id' => 'inputPhone']) !!}
            @error('phone')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-md-4">
            {!! Form::label('gender', __('Gender'), ['class' => 'col-form-label']) !!}
            {!! Form::select('gender', ['0' => __('Other'), '1' => __('Male'), '2' => __('Female')],
            $student->gender, ['class' => 'form-control', 'id' => 'inputGender']) !!}
            @error('gender')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-md-4">
            {!! Form::label('birthday', __('Birthday'), ['class' => 'col-form-label']) !!}
            {!! Form::date('birthday', Carbon\Carbon::parse($student->birthday)->format('Y-m-d'), ['class' => 'form-control', 'id' => 'inputDate']) !!}
            @error('birthday')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            {!! Form::label('role', __('Role'), ['class' => 'col-form-label']) !!}
            {!! Form::select('role', ['1' => __('Student'), '0' => __('Admin')],
            $student->user->role, ['class' => 'form-control', 'id' => 'role']) !!}
        </div>

        <div class="form-group col-md-4">
            {!! Form::label('faculty', __('Faculty'), ['class' => 'col-form-label']) !!}
            {!! Form::select('faculty_id', $faculties->pluck('name', 'id'),
            $student->faculty_id, ['class' => 'form-control', 'id' => 'faculty']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('avatar', __('Choose Avatar')) !!}
        {!! Form::hidden('old_avatar', isset($student->avatar) ? $student->avatar : '') !!}
        {!! Form::file('avatar', ['accept' => '.jpg, .png, .jpeg', 'class' => 'form-control-file', 'id' => 'example-fileinput']) !!}
    </div>

    <button class="btn btn-primary" type="submit">{{ __('Update Student') }}</button>

    {!! Form::close() !!}
@endsection
