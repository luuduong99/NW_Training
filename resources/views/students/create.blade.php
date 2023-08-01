@extends('layouts.master')
@section('content')
<form action="{{ route('edu.students.store_student') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="inputName" class="col-form-label">Student Name</label>
        <input type="text" name="name" class="form-control" id="inputName">
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4" class="col-form-label">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail4">
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress" class="col-form-label">Address</label>
        <input type="text" class="form-control" name="address" id="inputAddress">
        @error('address')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputPhone" class="col-form-label">Phone</label>
            <input type="text" name="phone" class="form-control" id="inputPhone">
            @error('phone')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-md-4">
            <label for="inputGender" class="col-form-label">Gender</label>
            <select id="inputGender" name="gender" class="form-control">
                <option value="0">Other</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
            </select>
            @error('gender')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-md-4">
            <label for="inputDate" class="col-form-label">BirthDay</label>
            <input type="date" name="birthday" class="form-control" id="inputDate">
            @error('birthday')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-4">
        <label for="role" class="col-form-label">Role</label>
        <select id="role" name="role" class="form-control">
            <option value="student" value="1">Student</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <!-- <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputRole" class="col-form-label">Role</label>
            <select id="inputRole" name="is_admin" class="form-control">
                <option value="1">Student</option>
                <option value="0">Admin</option>
            </select>
        </div>
    </div> -->

    <div class="form-group">
        <label for="example-fileinput">Choose Avatar</label>
        <input type="file" name="avatar" accept=".jpg, .png, .jpeg" id="example-fileinput" class="form-control-file">
        @error('avatar')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <button class="btn btn-primary" type="submit">Add Student</button>
</form>
@endsection