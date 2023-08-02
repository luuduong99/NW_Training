@extends('layouts.master')
@section('content')
<form action="{{ route('edu.subjects.store_subject') }}" method="post" enctype="multipart/form-data" id="ajax-form">
    @csrf
    <div class="form-group">
        <label for="name" class="col-form-label">Subject Name</label>
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

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="faculty_id" class="col-form-label">Choose Faculty</label>
            <select id="faculty_id" name="faculty_id" class="form-control">
                @foreach ($faculties as $faculty)
                <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <button class="btn btn-primary" id="btn-submit" type="submit">Add Subject</button>
</form>
@endsection
