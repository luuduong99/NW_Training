@extends('layouts.master')
@section('title', 'Subjects')
@section('subTitle', 'Create Subject')
@section('content')
    {!! Form::open(['route' => 'edu.subjects.store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'ajax-form']) !!}
    @csrf
    <div class="form-group">
        <label for="name" class="col-form-label">{{ __('Subject Name') }}</label>
        {!! Form::text('name', old('name'), ['class' => 'form-control', 'id' => 'name']) !!}
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">{{ __('Description') }}</label>
        {!! Form::textarea('description', old('description'), ['id' => 'description']) !!}
        <script>
            CKEDITOR.replace('description');
        </script>
        @error('description')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="faculty_id" class="col-form-label">{{ __('Choose Faculty') }}</label>
            {!! Form::select('faculty_id', $faculties->pluck('name', 'id'), null, ['class' => 'form-control', 'id' => 'faculty_id']) !!}
        </div>
    </div>
    {!! Form::submit(__('Add Subject'), ['class' => 'btn btn-primary', 'id' => 'btn-submit']) !!}
    {!! Form::close() !!}
@endsection
