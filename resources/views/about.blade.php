@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="container py-5">
    <div class="row align-items-center mb-5">
        <div class="col-md-6 mb-4 mb-md-0 fade-in">
            <img src="{{ (isset($content['main_image']) && Str::startsWith($content['main_image']->content, 'http')) ? $content['main_image']->content : asset('storage/' . ($content['main_image']->content ?? '')) }}" class="img-fluid rounded-4 shadow-lg hover-scale" alt="About Us">
        </div>
        <div class="col-md-6 fade-in" style="animation-delay: 0.2s;">
            <h2 class="fw-bold mb-4 text-success">{{ $content['main_title']->content ?? 'About Kantin Wakaf' }}</h2>
            <p class="lead text-secondary mb-4">
                {{ $content['main_description']->content ?? 'A modern canteen dedicated to serving healthy, affordable, and delicious meals.' }}
            </p>
            
            <div class="bg-light p-4 rounded-4 border-start border-4 border-success mb-4">
                <h5 class="fw-bold text-dark d-flex align-items-center">
                    <i class="bi bi-bullseye text-success me-2 fs-4"></i> Our Mission
                </h5>
                <p class="mb-0 text-secondary">
                    {{ $content['mission_text']->content ?? 'To serve high-quality food with speed, hygiene, and affordability.' }}
                </p>
            </div>
            <h4 class="mt-4 text-warning fw-bold">Why We Are Different?</h4>
            <ul class="list-unstyled">
                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Clean & Hygienic Kitchen</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Affordable Student-Friendly Prices</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Fast & Friendly Service</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Comfortable Seating Area</li>
            </ul>
        </div>
        <div class="col-md-6">
            <img src="https://placehold.co/600x600?text=About+Kantin" class="img-fluid rounded shadow" alt="About Us">
        </div>
    </div>

    <!-- Map Section -->
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="text-center mb-4">Find Us Here</h3>
            <div class="ratio ratio-21x9 shadow rounded overflow-hidden">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.466453472064!2d106.827153314769!3d-6.175110395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2db8c5617%3A0x4e446b7ac891d847!2sMonas!5e0!3m2!1sen!2sid!4v1625565555555" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
