@extends('layouts.app')

@section('content')

<section class="page-header" style="background-image: url('{{ asset('assets/images/traveldesti.png') }}');">
    <h1>Travel Destinations</h1>
</section>


<section class="destinations-section">
    <div class="cards">
        @foreach($destinations as $destination)
            <div class="card">
                <div class="card-image" style="background-image: url('{{ asset('assets/images/' . $destination->image) }}');">
                    @if($destination->featured)
                        <span class="card-badge">{{ $destination->category }}</span>
                    @endif
                </div>
                <div class="card-content">
                    <h3>{{ $destination->name }}</h3>
                    <p class="card-description">{{ $destination->description }}</p>
                    <div class="card-details">
                        <div class="detail-item">
                            <span class="detail-label">Location</span>
                            <span class="detail-value">{{ $destination->location }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Elevation</span>
                            <span class="detail-value">{{ $destination->elevation }}</span>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="detail-item">
                            <span class="detail-label">Best Time</span>
                            <span class="detail-value">{{ $destination->best_time }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Wildlife</span>
                            <span class="detail-value">{{ $destination->wildlife }}</span>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="detail-item">
                            <span class="detail-label">Package Price</span>
                            <span class="detail-value">${{ number_format($destination->price, 0) }}</span>
                        </div>
                    </div>
                    <div class="card-highlights">
                        <p><strong>Highlights:</strong></p>
                        <ul>
                            @if($destination->highlights)
                                @foreach(explode(',', $destination->highlights) as $highlight)
                                    <li>{{ trim($highlight) }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="/booking" class="card-btn">Explore Destination</a>
                    </div>
                </div>
            </div>

        @endforeach
    </div>

    @if($destinations->hasMorePages())
        <div style="text-align: center; margin: 40px 0;">
            <a href="{{ $destinations->nextPageUrl() }}" class="card-btn">Load More Destinations</a>
        </div>
    @endif
</section>

@endsection