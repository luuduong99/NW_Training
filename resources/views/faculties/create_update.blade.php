@extends('layouts.master')
@section('title', 'Faculties')
@section('subTitle', 'Create Faculty')
@section('content')
    {!! Form::model(isset($id) ? $faculty : '', ['route' =>
    isset($id) ? ['faculties.update', $id] : 'faculties.store',
        'method' => isset($id) ? 'PUT' : 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('name', __('Faculty Name'), ['class' => 'col-form-label']) !!}
        <span>:<span class="text-danger">(*)</span></span>
        {!! Form::text('name', isset($id) ? old('name', __($faculty->name)) : old('name'),
        ['class' => 'form-control']) !!}
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        {{ Form::label('description', __('Description'), ['class' => 'col-form-label']) }}
        {{ Form::textarea('description', isset($id) ? old('description', __($faculty->description)) : old('description'),
        ['class' => 'form-control', 'id' => 'description']) }}
        <script>
            CKEDITOR.replace('description');
        </script>
        @error('description')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    {!! Form::button(isset($id) ? __('Update Faculty') : __('Add Faculty'),
    ['class' => 'btn btn-primary', 'type' => 'submit']) !!}

    {!! Form::close() !!}
@endsection
