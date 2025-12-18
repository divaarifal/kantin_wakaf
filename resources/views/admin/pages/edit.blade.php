@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4 text-capitalize">Edit {{ $page }} Page Content</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.pages.update', $page) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @foreach($contents as $section => $items)
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0 text-capitalize">{{ $section == 'null' ? 'General' : $section }} Section</h5>
                </div>
                <div class="card-body">
                    @foreach($items as $item)
                        <div class="mb-3">
                            <label class="form-label text-capitalize fw-bold">{{ str_replace('_', ' ', $item->key) }}</label>
                            
                            @if($item->type == 'text')
                                <input type="text" name="content_{{ $item->id }}" class="form-control" value="{{ $item->content }}">
                            @elseif($item->type == 'textarea')
                                <textarea name="content_{{ $item->id }}" class="form-control" rows="3">{{ $item->content }}</textarea>
                            @elseif($item->type == 'image')
                                <div class="mb-2">
                                    <img src="{{ Str::startsWith($item->content, 'http') ? $item->content : asset('storage/' . $item->content) }}" alt="Preview" style="height: 100px; object-fit: cover;" class="d-block mb-2 rounded border">
                                </div>
                                <input type="file" name="files[{{ $item->id }}]" class="form-control">
                                <small class="text-muted">Upload new image to replace (Top limit: 5MB)</small>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-save"></i> Save Changes</button>
    </form>
</div>
@endsection
