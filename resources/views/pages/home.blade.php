@extends('layouts.app')

@section('content')

<section class="hero" style="background-image: url('{{ asset('assets/images/explore-uganda.jpg') }}');">
    <h1>Explore the Pearl of Africa</h1>
    <p>Discover unforgettable experiences across Uganda</p>
    <a href="/destinations" class="btn">View Packages</a>
</section>

<section class="featured">
    <h2>Featured Travel Packages</h2>
    <div class="cards">
    @foreach($featuredDestinations as $destination)
        <div class="card">

            <!-- IMAGE -->
            <div class="card-image" 
                 style="background-image: url('{{ asset('assets/images/' . $destination->image) }}');">

                <!-- CATEGORY BADGE -->
                <span class="card-badge">
                    {{ $destination->category ?? 'Featured' }}
                </span>
            </div>

            <div class="card-content">

                <!-- TITLE -->
                <h3>{{ $destination->name }}</h3>

                <!-- DESCRIPTION -->
                <p class="card-description">
                    {{ $destination->description }}
                </p>

                <!-- DETAILS ROW 1 -->
                <div class="card-details">
                    <div class="detail-item">
                        <span class="detail-label">Duration</span>
                        <span class="detail-value">{{ $destination->duration }}</span>
                    </div>

                    <div class="detail-item">
                        <span class="detail-label">Group Size</span>
                        <span class="detail-value">{{ $destination->group_size }}</span>
                    </div>
                </div>

                <!-- DETAILS ROW 2 -->
                <div class="card-details">
                    <div class="detail-item">
                        <span class="detail-label">Best Season</span>
                        <span class="detail-value">{{ $destination->best_season }}</span>
                    </div>

                    <div class="detail-item">
                        <span class="detail-label">Difficulty</span>
                        <span class="detail-value">{{ $destination->difficulty }}</span>
                    </div>
                </div>

                <!-- FOOTER -->
                <div class="card-footer">
                    <span class="price">
                        From ${{ number_format($destination->price) }}
                    </span>

                    <a href="/booking" class="card-btn">
                        Book now
                    </a>
                </div>

            </div>
        </div>
    @endforeach
</div>


    <h2>Testimonials</h2>
    <p style="text-align: center;">Hear from our satisfied travelers about their unforgettable experiences with us.</p>
    <div class="testimonials-window">
        <div class="testimonials">
            @foreach($testimonials as $testimonial)
            <div class="testimonial-item">

                <img src="{{ asset('assets/images/' . $testimonial->image) }}" 
                     alt="{{ $testimonial->name }}">

                <blockquote>
                    "{{ $testimonial->message }}" - {{ $testimonial->name }}
                </blockquote>

            </div>
        @endforeach
        </div>
    </div>
</section>
@endsection