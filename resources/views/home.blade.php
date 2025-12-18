@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section text-white d-flex align-items-center" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ (isset($content['hero_bg_image']) && Str::startsWith($content['hero_bg_image']->content, 'http')) ? $content['hero_bg_image']->content : asset('storage/' . ($content['hero_bg_image']->content ?? '')) }}'); background-size: cover; background-position: center; min-height: 80vh;">
        <div class="container text-center fade-in">
            <h1 class="display-3 fw-bold mb-4">{{ $content['hero_title']->content ?? 'Welcome to Kantin Wakaf' }}</h1>
            <p class="lead mb-5 fs-4">{{ $content['hero_description']->content ?? 'Delicious food, affordable prices.' }}</p>
        </div>
    </section>

    <!-- Intro Section -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0 fade-in">
                    <img src="{{ (isset($content['intro_image']) && Str::startsWith($content['intro_image']->content, 'http')) ? $content['intro_image']->content : asset('storage/' . ($content['intro_image']->content ?? '')) }}" class="img-fluid rounded-4 shadow-lg hover-scale" alt="About Us">
                </div>
                <div class="col-md-6 fade-in" style="animation-delay: 0.2s;">
                    <h2 class="fw-bold mb-4 text-success">{{ $content['intro_title']->content ?? 'Why Choose Us?' }}</h2>
                    <p class="lead text-secondary">{{ $content['intro_description']->content ?? 'We provide quality food.' }}</p>
                    <a href="{{ route('about') }}" class="btn btn-outline-success rounded-pill px-4 mt-3">Learn More</a>
                </div>
            </div>
        </div>
    </section>

<!-- Featured Menu Section -->
<section class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-5">Beberapa menu kami</h2>
        <div class="row">
            @forelse($featuredMenus as $menu)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 border-top border-4 border-success">
                    <img src="{{ $menu->image ? asset('storage/' . $menu->image) : 'https://placehold.co/400x300?text=No+Image' }}" class="card-img-top" alt="{{ $menu->name }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $menu->name }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit($menu->description, 50) }}</p>
                        <h6 class="text-success fw-bold">Rp {{ number_format($menu->price, 0, ',', '.') }}</h6>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>No featured items available yet.</p>
            </div>
            @endforelse
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('menu.index') }}" class="btn btn-outline-success">Lihat menu selengkapnya</a>
        </div>
    </div>
</section>

<!-- Operating Hours -->
<section class="py-5 bg-success text-white text-center">
    <div class="container">
        <h2 class="mb-4">Operating Hours</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <p class="fs-5">Monday - Friday: 08:00 AM - 04:00 PM</p>
                <p class="fs-5">Saturday: 08:00 AM - 02:00 PM</p>
                <p class="mb-0">Sunday: Closed</p>
            </div>
        </div>
    </div>
</section>
@endsection
