@extends('layouts.master')
@section('content')

<div style="width: 100%; display: flex;justify-content: space-between">
    <div class="col-sm-4" style="padding: 0">
        <a href="" class="btn btn-success mb-2"><i class="mdi mdi-plus-circle mr-2"></i>
            Add Subject
        </a>
    </div>
</div>
<table class="table table-striped table-centered mb-0">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Status</th>
            <th>Course Code</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>
<div style="padding-top: 10px;">
</div>
@endsection