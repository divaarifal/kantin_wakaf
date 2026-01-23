@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="hero-modern d-flex align-items-center justify-content-center min-vh-100 position-relative text-white">
        <div class="container text-center z-1">
            <h1 class="display-2 fw-bold mb-4 tracking-tight reveal active">
                {{ $content['hero_title']->content ?? 'Welcome to Kantin Wakaf' }}
            </h1>
            <p class="lead mb-5 fs-3 opacity-90 reveal active" style="transition-delay: 0.2s;">
                {{ $content['hero_description']->content ?? 'Delicious food, affordable prices.' }}
            </p>
            <a href="{{ route('menu.index') }}" class="btn btn-modern btn-lg shadow-lg reveal active" style="transition-delay: 0.4s;">
                <i class="bi bi-cart2 me-2"></i> Lihat Menu
            </a>
        </div>
        <!-- Decorative Shape -->
        <div class="position-absolute bottom-0 w-100" style="height: 150px; background: linear-gradient(to top, var(--soft-yellow), transparent);"></div>
    </section>

    <!-- Promo Section 1: Image Left -->
    <section class="section-promo d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0 reveal">
                    <div class="position-relative">
                        <div class="position-absolute top-0 start-0 translate-middle bg-warning rounded-circle shadow blur-lg" style="width: 100px; height: 100px; z-index: -1;"></div>
                        <img src="{{ (isset($content['promo_1_image']) && Str::startsWith($content['promo_1_image']->content, 'http')) ? $content['promo_1_image']->content : asset('storage/' . ($content['promo_1_image']->content ?? '')) }}" 
                             class="img-fluid rounded-5 shadow-lg glass-panel p-2" alt="Promo 1">
                    </div>
                </div>
                <div class="col-lg-6 ps-lg-5 reveal" style="transition-delay: 0.2s;">
                    <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2 mb-3">Signature Choice</span>
                    <h2 class="display-5 fw-bold mb-4 text-gradient">{{ $content['promo_1_title']->content ?? 'Signature Wakaf Bowl' }}</h2>
                    <p class="lead text-secondary mb-4">{{ $content['promo_1_description']->content ?? 'Experience the blend of nutrition and taste.' }}</p>
                    <a href="{{ route('menu.index') }}" class="btn btn-outline-modern">View Details <i class="bi bi-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Promo Section 2: Image Right -->
    <section class="section-promo d-flex align-items-center bg-white">
        <div class="container">
            <div class="row align-items-center flex-lg-row-reverse">
                <div class="col-lg-6 mb-5 mb-lg-0 reveal">
                    <img src="{{ (isset($content['promo_2_image']) && Str::startsWith($content['promo_2_image']->content, 'http')) ? $content['promo_2_image']->content : asset('storage/' . ($content['promo_2_image']->content ?? '')) }}" 
                         class="img-fluid rounded-5 shadow-lg glass-panel p-2" alt="Promo 2">
                </div>
                <div class="col-lg-6 pe-lg-5 reveal" style="transition-delay: 0.2s;">
                    <span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3 py-2 mb-3">Healthy & Fresh</span>
                    <h2 class="display-5 fw-bold mb-4 text-gradient">{{ $content['promo_2_title']->content ?? 'Prioritize Your Health' }}</h2>
                    <p class="lead text-secondary mb-4">{{ $content['promo_2_description']->content ?? 'Fresh ingredients, zero preservatives.' }}</p>
                    <a href="{{ route('menu.index') }}" class="btn btn-outline-modern">Discover Menu <i class="bi bi-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Promo Section 3: Image Left -->
    <section class="section-promo d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0 reveal">
                    <img src="{{ (isset($content['promo_3_image']) && Str::startsWith($content['promo_3_image']->content, 'http')) ? $content['promo_3_image']->content : asset('storage/' . ($content['promo_3_image']->content ?? '')) }}" 
                         class="img-fluid rounded-5 shadow-lg glass-panel p-2" alt="Promo 3">
                </div>
                <div class="col-lg-6 ps-lg-5 reveal" style="transition-delay: 0.2s;">
                    <span class="badge bg-info bg-opacity-10 text-info rounded-pill px-3 py-2 mb-3">Student Friendly</span>
                    <h2 class="display-5 fw-bold mb-4 text-gradient">{{ $content['promo_3_title']->content ?? 'Wallet Friendly' }}</h2>
                    <p class="lead text-secondary mb-4">{{ $content['promo_3_description']->content ?? 'Premium quality at student prices.' }}</p>
                    <a href="{{ route('menu.index') }}" class="btn btn-outline-modern">Check Prices <i class="bi bi-tag ms-2"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Promo Section 4: Image Right -->
    <section class="section-promo d-flex align-items-center bg-white">
        <div class="container">
            <div class="row align-items-center flex-lg-row-reverse">
                <div class="col-lg-6 mb-5 mb-lg-0 reveal">
                    <img src="{{ (isset($content['promo_4_image']) && Str::startsWith($content['promo_4_image']->content, 'http')) ? $content['promo_4_image']->content : asset('storage/' . ($content['promo_4_image']->content ?? '')) }}" 
                         class="img-fluid rounded-5 shadow-lg glass-panel p-2" alt="Promo 4">
                </div>
                <div class="col-lg-6 pe-lg-5 reveal" style="transition-delay: 0.2s;">
                    <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3 py-2 mb-3">Community</span>
                    <h2 class="display-5 fw-bold mb-4 text-gradient">{{ $content['promo_4_title']->content ?? 'Events & Gatherings' }}</h2>
                    <p class="lead text-secondary mb-4">{{ $content['promo_4_description']->content ?? 'Join our weekly events.' }}</p>
                    <a href="{{ route('contact') }}" class="btn btn-outline-modern">Join Us <i class="bi bi-people ms-2"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Operating Hours -->
    <section class="py-5 text-center" style="background-color: var(--primary-green); color: var(--soft-yellow);">
        <div class="container reveal">
            <h2 class="display-6 fw-bold mb-5"><i class="bi bi-clock-history me-2"></i> Operating Hours</h2>
            <div class="row justify-content-center g-4">
                <div class="col-md-4">
                    <div class="p-4 rounded-4 glass-panel border-0 h-100" style="background: rgba(255,255,255,0.05);">
                        <h4 class="fw-bold mb-1">Mon - Fri</h4>
                        <p class="fs-5 mb-0 opacity-75">{{ $content['hours_mon_fri']->content ?? '08:00 AM - 04:00 PM' }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 rounded-4 glass-panel border-0 h-100" style="background: rgba(255,255,255,0.05);">
                        <h4 class="fw-bold mb-1">Saturday</h4>
                        <p class="fs-5 mb-0 opacity-75">{{ $content['hours_saturday']->content ?? '08:00 AM - 02:00 PM' }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 rounded-4 glass-panel border-0 h-100" style="background: rgba(255,255,255,0.05);">
                        <h4 class="fw-bold mb-1 text-danger">Sunday</h4>
                        <p class="fs-5 mb-0 opacity-75">{{ $content['hours_sunday']->content ?? 'Closed' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const reveals = document.querySelectorAll('.reveal');

        function revealOnScroll() {
            const windowHeight = window.innerHeight;
            const elementVisible = 150;

            reveals.forEach((reveal) => {
                const elementTop = reveal.getBoundingClientRect().top;
                if (elementTop < windowHeight - elementVisible) {
                    reveal.classList.add('active');
                }
            });
        }

        window.addEventListener('scroll', revealOnScroll);
        // Trigger once on load
        revealOnScroll();
    });
</script>
@endpush
