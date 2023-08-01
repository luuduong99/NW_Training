@extends('layouts.master')
@section('content')
<form action="{{ route('edu.faculties.store_faculty') }}" method="post" enctype="multipart/form-data" id="ajax-form">
    @csrf
    <div class="form-group">
        <label for="name" class="col-form-label">Faculty Name</label>
        <input type="text" value="{{ old('name') ?  old('name') : ''}}" name="name" class="form-control" id="name">
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description">{{ old('description') ?  old('description') : ''}}</textarea>
        <script>
            CKEDITOR.replace('description');
        </script>
        @error('description')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <button class="btn btn-primary" id="btn-submit" type="submit">Add Faculty</button>
</form>

@endsection