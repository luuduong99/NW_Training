@extends('layouts.master')
@section('title', 'Subjects')
@section('subTitle', 'Create Subject')
@section('content')
    {!! Form::model(isset($id) ? $subject : '',
        ['route' => isset($id) ? ['subjects.update', $id] : 'subjects.store',
        'method' => isset($id) ? 'PUT' : 'POST', 'enctype' => 'multipart/form-data']) !!}
    @csrf
    <div class="form-group">
        <label for="name" class="col-form-label">{{ __('Subject Name') }}</label>
        <span>:<span class="text-danger">(*)</span></span>
        {!! Form::text('name', isset($id) ? old('name', __($subject->name)) : old('name'),
        ['class' => 'form-control', 'id' => 'name']) !!}
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">{{ __('Description') }}</label>
        {!! Form::textarea('description',
        isset($id) ? old('description', __($subject->description)) : old('description'),
        ['id' => 'description']) !!}
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
            {!! Form::select('faculty_id', $faculties->mapWithKeys(function ($faculty) {
                   return [$faculty->id => __($faculty->name)];
                })->toArray(), null,
            ['class' => 'form-control', 'id' => 'faculty_id']) !!}
        </div>
    </div>
    {!! Form::submit(isset($id) ? __('Update Faculty') : __('Add Faculty'),
    ['class' => 'btn btn-primary', 'id' => 'btn-submit']) !!}
    {!! Form::close() !!}
@endsection
