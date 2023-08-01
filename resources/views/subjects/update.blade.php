@extends('layout.master')
@section('content')
<form action="{{ route('edu.courses.delete_course', $course->id)  }}" method="POST" style="margin-bottom: 10px;">
    @method('delete')
    @csrf
    <input style="float: right;" class="btn btn-danger" type="submit" onclick=" return window.confirm('Are you sure?');"
        value="Delete Course" />
</form>

<form action="{{ route('edu.courses.update_course', $course->id) }}" method="post" enctype="multipart/form-data"
    id="ajax-form">
    @method('put')
    @csrf
    <div class="form-group">
        <label for="name" class="col-form-label">Course Name</label>
        <input type="text" value="{{ old('name') ? old('name') : $course->name }}" name="name" class="form-control">
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputStatus" class="col-form-label">Status</label>
            <select id="inputStatus" name="status" class="form-control">
                <option {{ $course->status == '0' ? 'selected' : ''  }} value="0">Active</option>
                <option {{ $course->status == '1' ? 'selected' : ''  }} value="1">Deactive</option>
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
    <button class="btn btn-primary" id="btn-submit" type="submit">Update Course</button>
</form>

@endsection