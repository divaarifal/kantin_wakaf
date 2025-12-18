@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold text-success">Get in Touch</h1>
        <p class="text-muted">Have questions or suggestions? We'd love to hear from you!</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-5 mb-4 mb-md-0">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h4 class="mb-4">Contact Information</h4>
                    
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-success text-white rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="bi bi-whatsapp"></i>
                        </div>
                        <div>
                            <p class="mb-0 fw-bold">WhatsApp</p>
                            <p class="mb-0 text-muted">+62 812-3456-7890</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-warning text-dark rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="bi bi-instagram"></i>
                        </div>
                        <div>
                            <p class="mb-0 fw-bold">Instagram</p>
                            <p class="mb-0 text-muted">@kantinwakaf</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-3">
        <div class="col-md-6 mb-4">
            <div class="p-4 bg-light rounded-4 h-100 shadow-sm hover-cards">
                <i class="bi bi-geo-alt-fill text-success fs-2 mb-3"></i>
                <h4 class="fw-bold">Our Location</h4>
                <p class="text-muted">{{ $content['info_address']->content ?? 'Jl. Sejahtera No. 123, Jakarta Selatan, Indonesia' }}</p>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="p-4 bg-light rounded-4 h-100 shadow-sm hover-cards">
                <i class="bi bi-whatsapp text-success fs-2 mb-3"></i>
                <h4 class="fw-bold">WhatsApp</h4>
                <p class="text-muted">{{ $content['info_whatsapp']->content ?? '+62 812-3456-7890' }}</p>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="p-4 bg-light rounded-4 h-100 shadow-sm hover-cards">
                <i class="bi bi-instagram text-danger fs-2 mb-3"></i>
                <h4 class="fw-bold">Instagram</h4>
                <p class="text-muted">{{ $content['info_instagram']->content ?? '@kantinwakaf' }}</p>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="p-4 bg-light rounded-4 h-100 shadow-sm hover-cards">
                <i class="bi bi-envelope-fill text-primary fs-2 mb-3"></i>
                <h4 class="fw-bold">Email Us</h4>
                <p class="text-muted">{{ $content['info_email']->content ?? 'info@kantinwakaf.com' }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h4 class="mb-4">Send us a Message</h4>
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Your Name</label>
                            <input type="text" class="form-control" placeholder="John Doe">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" placeholder="john@example.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" rows="4" placeholder="Your message here..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection
