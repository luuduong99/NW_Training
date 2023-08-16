@extends('layouts.master')
@section('title', 'Students')
@section('subTitle', 'Create Student')
@section('content')
    {!! Form::open(['route' => 'edu.students.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('name', __('Student Name'), ['class' => 'col-form-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'inputName']) !!}
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            {!! Form::label('email', __('Email'), ['class' => 'col-form-label']) !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'inputEmail4']) !!}
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('address', __('Address'), ['class' => 'col-form-label']) !!}
        {!! Form::text('address', null, ['class' => 'form-control', 'id' => 'inputAddress']) !!}
        @error('address')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            {!! Form::label('phone', __('Phone'), ['class' => 'col-form-label']) !!}
            {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'inputPhone']) !!}
            @error('phone')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-4">
            {!! Form::label('gender', __('Gender'), ['class' => 'col-form-label']) !!}
            {!! Form::select('gender', ['0' => __('Other'), '1' => __('Male'), '2' => __('Female')], null, ['class' => 'form-control', 'id' => 'inputGender']) !!}
            @error('gender')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-4">
            {!! Form::label('birthday', __('BirthDay'), ['class' => 'col-form-label']) !!}
            {!! Form::date('birthday', null, ['class' => 'form-control', 'id' => 'inputDate']) !!}
            @error('birthday')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class="form-row">
        <div class="form-group col-md-4">
            {!! Form::label('role', __('Role'), ['class' => 'col-form-label']) !!}
            {!! Form::select('role', ['1' => __('Student'), '0' => __('Admin')], null, ['class' => 'form-control', 'id' => 'role']) !!}
        </div>

        <div class="form-group col-md-4">
            {!! Form::label('faculty_id', __('Faculty'), ['class' => 'col-form-label']) !!}
            {!! Form::select('faculty_id', $faculties->pluck('name', 'id'), null, ['class' => 'form-control', 'id' => 'faculty']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('avatar', __('Choose Avatar')) !!}
        {!! Form::file('avatar', ['accept' => '.jpg, .png, .jpeg', 'id' => 'example-fileinput', 'class' => 'form-control-file']) !!}
        @error('avatar')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    {!! Form::submit(__('Add Student'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
