@extends('admin.layouts.app')

@section('content')

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f5f7fa;
        padding: 40px;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .page-header h1 {
        margin: 0;
        font-size: 1.8rem;
    }

    .card {
        background: white;
        padding: 25px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
    }

    input, textarea {
        width: 100%;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #ddd;
    }

    textarea {
        resize: vertical;
    }

    .btn {
        background: #111827;
        color: white;
        padding: 10px 15px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
    }

    .btn:hover {
        background: #30f551;
    }

    .grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .success {
        background: #d1fae5;
        padding: 10px;
        border-radius: 6px;
        margin-bottom: 15px;
        color: #065f46;
    }
</style>

<div class="page-header">
    <h1>Edit About Page</h1>
</div>

@if(session('success'))
    <div class="success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('admin.about.update') }}" method="POST">
    @csrf

    <!-- HERO SECTION -->
    <div class="card">
        <h3>Hero Section</h3>

        <div class="form-group">
            <label>Hero Title</label>
            <input type="text" name="hero_title" value="{{ $about->hero_title ?? '' }}">
        </div>

        <div class="form-group">
            <label>Hero Subtitle</label>
            <input type="text" name="hero_subtitle" value="{{ $about->hero_subtitle ?? '' }}">
        </div>
    </div>

    <!-- STORY SECTION -->
    <div class="card">
        <h3>Our Story</h3>

        <div class="form-group">
            <label>Story Title</label>
            <input type="text" name="story_title" value="{{ $about->story_title ?? '' }}">
        </div>

        <div class="form-group">
            <label>Story Content</label>
            <textarea name="story_content" rows="6">{{ $about->story_content ?? '' }}</textarea>
        </div>
    </div>

    <!-- MISSION / VISION -->
    <div class="card">
        <h3>Mission & Vision</h3>

        <div class="grid">
            <div class="form-group">
                <label>Mission</label>
                <textarea name="mission" rows="5">{{ $about->mission ?? '' }}</textarea>
            </div>

            <div class="form-group">
                <label>Vision</label>
                <textarea name="vision" rows="5">{{ $about->vision ?? '' }}</textarea>
            </div>
        </div>
    </div>

    <!-- STATS -->
    <div class="card">
        <h3>Stats Section</h3>

        <div class="grid">
            <div class="form-group">
                <label>Years Experience</label>
                <input type="number" name="years_experience" value="{{ $about->years_experience ?? '' }}">
            </div>

            <div class="form-group">
                <label>Happy Travelers</label>
                <input type="number" name="happy_travelers" value="{{ $about->happy_travelers ?? '' }}">
            </div>

            <div class="form-group">
                <label>Destinations</label>
                <input type="number" name="destinations_count" value="{{ $about->destinations_count ?? '' }}">
            </div>

            <div class="form-group">
                <label>Tour Guides</label>
                <input type="number" name="tour_guides" value="{{ $about->tour_guides ?? '' }}">
            </div>
        </div>
    </div>

    <button type="submit" class="btn">Save Changes</button>
</form>

@endsection