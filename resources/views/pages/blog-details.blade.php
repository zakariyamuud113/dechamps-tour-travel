@extends('layouts.app')
@section('content')

<style>
    .blogdetails-section {
        max-width: 1100px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    .blog-details-wrapper {
        display: flex;
        gap: 40px;
        align-items: flex-start;
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }

    .blog-details-image {
        flex: 1;
        min-height: 450px;
    }

    .blog-details-image img {
        width: 100%;
        height: 200%;
        object-fit: cover;
        display: block;
        
    }

    .blog-details-content {
        flex: 1;
        padding: 40px;
    }

    .blog-details-content h1 {
        font-size: 2.2rem;
        margin-bottom: 15px;
        color: #111827;
    }

    .blog-meta {
        color: #6b7280;
        font-size: 0.9rem;
        margin-bottom: 25px;
    }

    .blog-text p {
        line-height: 1.8;
        font-size: 1.1rem;
        color: #111827;
    }

    .back-btn {
        display: inline-block;
        margin-top: 30px;
        padding: 10px 16px;
        background: #111827;
        color: #fff;
        border-radius: 6px;
        text-decoration: none;
        transition: 0.3s;
    }

    .back-btn:hover {
        background: #374151;
    }

    @media(max-width: 900px){
        .blog-details-wrapper {
            flex-direction: column;
        }

        .blog-details-image {
            min-height: 300px;
        }
    }
</style>

<section class="blogdetails-section">

    <div class="blog-details-wrapper">

        <div class="blog-details-image">
            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
        </div>

        <div class="blog-details-content">

            <h1>{{ $blog['title'] }}</h1>

            <p class="blog-meta">
                {{ $blog['date'] }} · by {{ $blog['author'] }}
            </p>

            <div class="blog-text">
                <p>{{ $blog['content'] }}</p>
            </div>

            <a href="{{ url('/blogs') }}" class="back-btn">
                ← Back to Blogs
            </a>

        </div>

    </div>

</section>

@endsection