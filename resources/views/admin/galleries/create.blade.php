@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Add New Gallery Photo</h2>
    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Title (Optional)</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label>Photo</label>
            <input type="file" name="image" class="form-control" required accept="image/*">
        </div>
        <button type="submit" class="btn btn-success">Upload Photo</button>
        <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
