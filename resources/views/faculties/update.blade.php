@extends('layouts.master')
@section('content')

    {!! Form::open(['route' => ['edu.faculties.destroy', $faculty->id], 'method' => 'delete',
    'style' => 'margin-bottom: 10px;']) !!}
    {!! Form::submit(__('Delete Faculty'), ['class' => 'btn btn-danger', 'style' => 'float: right;',
    'onclick' => 'return window.confirm(\'Are you sure?\');']) !!}
    {!! Form::close() !!}

    {!! Form::open(['route' => ['edu.faculties.update', $faculty->id],
    'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        <label for="inputName" class="col-form-label">{{ __('Faculty Name') }}</label>
        {!! Form::text('name', old('name', $faculty->name), ['class' => 'form-control', 'id' => 'inputName']) !!}
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">{{ __('Description') }}</label>
        {!! Form::textarea('description', old('description', $faculty->description), ['id' => 'description']) !!}
        <script>
            CKEDITOR.replace('description');
        </script>
        @error('description')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    {!! Form::submit(__('Update Faculty'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
