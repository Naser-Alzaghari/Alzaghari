@extends('user.layouts.master')

@section('content')
<div class="container py-5">
    <!-- Hero Section -->
    <div class="row align-items-center mb-5 pt--150">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <h1 class="display-4 fw-bold mb-4">About Our Story</h1>
            <p class="lead text-secondary mb-4">Welcome to our store! We pride ourselves on offering a wide range of high-quality products to meet all your needs. Our journey started with a simple mission: to provide exceptional value to our customers.</p>
        </div>
        <div class="col-lg-6 text-center">
            <img src="{{ asset('user_assets/img/about/about-bg1.jpg') }}" alt="about" class="img-fluid rounded shadow" style="height: 55vh;">
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="row align-items-center my-5">
        <div class="col-lg-6 order-lg-2 mb-4 mb-lg-0">
            <h2 class="fw-bold mb-4">Why Choose Us?</h2>
            <div class="d-flex align-items-start mb-4">
                <div class="bg-primary p-3 rounded text-white me-3">
                    <i class="fas fa-clock fa-2x"></i>
                </div>
                <div>
                    <h5 class="fw-bold">Fast Delivery</h5>
                    <p class="text-secondary">Same day delivery inside Amman & 24 Hour outside Amman.</p>
                </div>
            </div>
            <div class="d-flex align-items-start mb-4">
                <div class="bg-primary p-3 rounded text-white me-3">
                    <i class="fas fa-shield-alt fa-2x"></i>
                </div>
                <div>
                    <h5 class="fw-bold">Quality Guaranteed</h5>
                    <p class="text-secondary">All products are guaranteed for a minimum one year.</p>
                </div>
            </div>
            <div class="d-flex align-items-start">
                <div class="bg-primary p-3 rounded text-white me-3">
                    <i class="fas fa-headset fa-2x"></i>
                </div>
                <div>
                    <h5 class="fw-bold">24/7 Support</h5>
                    <p class="text-secondary">Our customer service team is always here to help you.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 order-lg-1">
            <a href="{{route('landing_page')}}" class="d-flex justify-content-center shadow ptb--40">
                <img src="{{asset('user_assets/img/logo/logo.svg')}}" alt="about" class="img-fluid w-75">
                
            </a>
        </div>
    </div>

   
    <!-- Testimonials Section -->
    <div class="row justify-content-center my-5">
        <div class="col-lg-8">
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card border-0 shadow-sm p-4">
                            <div class="text-center mb-4">
                                <img src="{{ asset('user_assets/img/others/happy-client-1.jpg') }}" alt="Client" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                            </div>
                            <p class="text-center mb-4">"I found everything I needed for my construction project at great prices. Highly recommend!"</p>
                            <div class="text-center">
                                <h5 class="fw-bold mb-1">Lura Frazier</h5>
                                <p class="text-secondary">Happy Client</p>
                            </div>
                        </div>
                    </div>
                    <!-- Add more testimonials as needed -->
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection