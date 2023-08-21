@extends('layouts.master')
@section('title', 'Faculties')
@section('subTitle', 'Create Faculty')
@section('content')
    {!! Form::open(['route' => 'edu.faculties.store', 'method' => 'POST',
        'enctype' => 'multipart/form-data', 'id' => 'ajax-form']) !!}
    <div class="form-group">
        {!! Form::label('name', __('Faculty Name'), ['class' => 'col-form-label']) !!}
        <span>:<span class="text-danger">(*)</span></span>
        {!! Form::text('name', old('name') ?: '', ['class' => 'form-control', 'id' => 'name']) !!}
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        {{ Form::label('description', __('Description'), ['class' => 'col-form-label']) }}
        {{ Form::textarea('description', old('description') ? old('description') : '',
        ['class' => 'form-control', 'id' => 'description']) }}
        <script>
            CKEDITOR.replace('description');
        </script>
        @error('description')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    {!! Form::button(__('Add Faculty'), ['class' => 'btn btn-primary', 'id' => 'btn-submit', 'type' => 'submit']) !!}

    {!! Form::close() !!}
@endsection
