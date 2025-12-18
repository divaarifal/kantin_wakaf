@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5 fw-bold text-success">Kantin Gallery</h1>
    <p class="text-center text-muted mb-5">A glimpse into our atmosphere and delicious offerings.</p>

    <div class="row">
        @forelse($galleries as $gallery)
        <div class="col-md-4 mb-4 fade-in">
            <a href="#" data-bs-toggle="modal" data-bs-target="#galleryModal{{ $gallery->id }}">
                <div class="card shadow-sm border-0 overflow-hidden">
                    <img src="{{ asset('storage/' . $gallery->image) }}" class="card-img-top zoom-effect" alt="{{ $gallery->title }}" style="height: 300px; object-fit: cover; transition: transform 0.3s;">
                </div>
            </a>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="galleryModal{{ $gallery->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <img src="{{ asset('storage/' . $gallery->image) }}" class="w-100" alt="{{ $gallery->title }}">
                    </div>
                    @if($gallery->title)
                    <div class="modal-footer bg-light border-0">
                        <p class="mb-0 fw-bold">{{ $gallery->title }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <h3>No photos available yet.</h3>
        </div>
        @endforelse
    </div>
</div>

@push('styles')
<style>
    .zoom-effect:hover { transform: scale(1.05); }
</style>
@endpush
@endsection
