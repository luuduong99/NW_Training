@extends('layouts.master')
@section('content')
    <form action="{{ route('edu.subjects.delete_subject', $subject->id) }}" method="POST" style="margin-bottom: 10px;">
        @method('delete')
        @csrf
        <input class="btn btn-danger" type="submit" style="float: right;"
               onclick=" return window.confirm('Are you sure?');" value="Delete Subject"/>
    </form>
    <form action="{{ route('edu.subjects.update_subject', $subject->id) }}" method="post" enctype="multipart/form-data"
          id="ajax-form">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="name" class="col-form-label">Course Name</label>
            <input type="text" value="{{ old('name') ? old('name') : $subject->name }}" name="name"
                   class="form-control">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="faculty_id" class="col-form-label">Choose Faculty</label>
                <select id="faculty_id" name="faculty_id" class="form-control">
                    @foreach ($faculties as $faculty)
                        <option
                            {{ $faculty->id == $subject->faculty_id ? 'selected' : ''  }} value="{{ $faculty->id }}">
                            {{ $faculty->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <button class="btn btn-primary" id="btn-submit" type="submit">Update Course</button>
    </form>

@endsection
