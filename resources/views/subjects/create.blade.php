@extends('layout.master')
@section('content')
<form action="{{ route('edu.courses.store_course') }}" method="post" enctype="multipart/form-data" id="ajax-form">
    @csrf
    <div class="form-group">
        <label for="name" class="col-form-label">Course Name</label>
        <input type="text" value="{{ old('name') ?  old('name') : ''}}" name="name" class="form-control" id="name">
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputStatus" class="col-form-label">Status</label>
            <select id="inputStatus" name="status" class="form-control">
                <option value="0">Active</option>
                <option value="1">Deactive</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="example-fileinput">Choose Image</label>
        <input type="file" name="image" accept=".jpg, .png, .jpeg" id="example-fileinput" class="form-control-file">
        @error('image')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button class="btn btn-primary" id="btn-submit" type="submit">Add Course</button>
</form>

<!-- @push('scripts')
<script src="{{ asset('js/departments/create.js') }}"></script>
@endpush -->
@endsection