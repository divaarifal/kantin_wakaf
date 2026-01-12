@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5 fade-in">
        <h1 class="fw-bold text-success">Get in Touch</h1>
        <p class="text-muted">Have questions or suggestions? We'd love to hear from you!</p>
    </div>

    <div class="row g-5">
        <!-- Contact Info Column -->
        <div class="col-lg-5 mb-4 mb-lg-0 fade-in">
            <div class="card border-0 shadow-lg rounded-4 h-100 bg-success text-white">
                <div class="card-body p-4 p-md-5">
                    <h3 class="fw-bold mb-4 text-white">Contact Information</h3>
                    <p class="mb-5 text-white-50">Fill up the form and our team will get back to you within 24 hours.</p>
                    
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-white bg-opacity-25 rounded-circle p-3 me-3">
                            <i class="bi bi-telephone-fill fs-4 text-white"></i>
                        </div>
                        <div>
                            <div class="small text-uppercase text-white-50 fw-bold">Phone / WhatsApp</div>
                            <div class="fs-5">{{ $content['info_whatsapp']->content ?? '+62 812-3456-7890' }}</div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-white bg-opacity-25 rounded-circle p-3 me-3">
                            <i class="bi bi-instagram fs-4 text-white"></i>
                        </div>
                        <div>
                            <div class="small text-uppercase text-white-50 fw-bold">Instagram</div>
                            <div class="fs-5">{{ $content['info_instagram']->content ?? '@kantinwakaf' }}</div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-white bg-opacity-25 rounded-circle p-3 me-3">
                            <i class="bi bi-envelope-fill fs-4 text-white"></i>
                        </div>
                        <div>
                            <div class="small text-uppercase text-white-50 fw-bold">Email Address</div>
                            <div class="fs-5">{{ $content['info_email']->content ?? 'info@kantinwakaf.com' }}</div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-white bg-opacity-25 rounded-circle p-3 me-3">
                            <i class="bi bi-geo-alt-fill fs-4 text-white"></i>
                        </div>
                        <div>
                            <div class="small text-uppercase text-white-50 fw-bold">Location</div>
                            <div class="fs-5">{{ $content['info_address']->content ?? 'Jl. Sejahtera No. 123, Jakarta' }}</div>
                        </div>
                    </div>

                    <div class="mt-auto pt-4">
                        <div class="d-flex gap-3">
                            <a href="#" class="btn btn-outline-light rounded-circle"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="btn btn-outline-light rounded-circle"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="btn btn-outline-light rounded-circle"><i class="bi bi-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Column -->
        <div class="col-lg-7 fade-in" style="animation-delay: 0.2s;">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4 p-md-5">
                    <h3 class="fw-bold text-success mb-4">Send us a Message</h3>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-muted">YOUR NAME</label>
                                <input type="text" class="form-control form-control-lg bg-light border-0" placeholder="John Doe">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-muted">EMAIL ADDRESS</label>
                                <input type="email" class="form-control form-control-lg bg-light border-0" placeholder="john@example.com">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold small text-muted">SUBJECT</label>
                                <input type="text" class="form-control form-control-lg bg-light border-0" placeholder="Question regarding menu...">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold small text-muted">MESSAGE</label>
                                <textarea class="form-control form-control-lg bg-light border-0" rows="5" placeholder="Write your message here..."></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-warning btn-lg px-5 rounded-pill fw-bold w-100 hover-scale">Send Message <i class="bi bi-send-fill ms-2"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection
