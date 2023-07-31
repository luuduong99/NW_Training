@extends('layouts.master')
@section('content')
<form action="{{ route('edu.faculties.delete_faculty', $faculty->id) }}" method="POST" style="margin-bottom: 10px;">
    @method('delete')
    @csrf
    <input class="btn btn-danger" type="submit" style="float: right;" onclick=" return window.confirm('Are you sure?');" value="Delete Department" />
</form>
<form action="{{ route('edu.faculties.update_faculty', $faculty->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="inputName" class="col-form-label">Faculty Name</label>
        <input type="text" name="name" value="{{ old('name') ? old('name') : $faculty->name }}" class="form-control" id="inputName">
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description">{{ isset($faculty->description) ? $department->description : '' }}</textarea>
        <script>
            CKEDITOR.replace('description');
        </script>
        @error('description')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <button class="btn btn-primary" type="submit">Update Faculty</button>
</form>

@endsection