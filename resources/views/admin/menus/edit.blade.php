@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Edit Menu Item</h2>
    <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $menu->name }}" required>
        </div>
        <div class="mb-3">
            <label>Category</label>
            <select name="category" class="form-control" required>
                <option value="food" {{ $menu->category == 'food' ? 'selected' : '' }}>Food</option>
                <option value="drinks" {{ $menu->category == 'drinks' ? 'selected' : '' }}>Drinks</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" class="form-control" value="{{ $menu->price }}" required>
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            @if($menu->image)
                <small>Current Image:</small> <img src="{{ asset('storage/' . $menu->image) }}" width="50">
            @endif
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $menu->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update Menu</button>
        <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
