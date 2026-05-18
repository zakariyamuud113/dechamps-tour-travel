@extends('layouts.app')

@section('content')

<section class="page-header">
    <h1>Gallery</h1>
    <p>Explore the breathtaking beauty of Uganda through our travelers' experiences</p>
</section>

<section class="gallery-section">
    <div class="gallery-filters">
        <button class="filter-btn active" data-filter="all">All</button>
        <button class="filter-btn" data-filter="wildlife">Wildlife</button>
        <button class="filter-btn" data-filter="landscapes">Landscapes</button>
        <button class="filter-btn" data-filter="culture">Cultural Experiences</button>
    </div>

    <div class="gallery-grid">

    @foreach($galleries as $index => $gallery)
        <div class="gallery-item {{ $gallery->category }}" data-category="{{ strtolower($gallery->category) }}">
            
            <div class="gallery-image" 
                 style="background-image: url('{{ asset('storage/' . $gallery->image) }}');">
                
                <div class="gallery-overlay">
                    
                    <h3>{{ $gallery->title }}</h3>

                    <p>{{ ucfirst($gallery->category) }}</p>

                    <button class="lightbox-btn" onclick="openLightbox({{ $index }})">
                        View Full
                    </button>

                </div>
            </div>

        </div>
    @endforeach

</div>
</section>

<!-- Lightbox Modal -->
<div id="lightbox" class="lightbox">
    <button class="lightbox-close" onclick="closeLightbox()">&times;</button>
    <button class="lightbox-prev" onclick="prevImage()">&#10094;</button>
    <img id="lightbox-image" src="" alt="Gallery Image">
    <button class="lightbox-next" onclick="nextImage()">&#10095;</button>
    <div id="lightbox-caption"></div>
</div>

<script>
    let currentImageIndex = 0;

    function openLightbox(index) {
        currentImageIndex = index;
        const images = document.querySelectorAll('.gallery-image');
        const image = images[index];
        const bgImage = window.getComputedStyle(image).backgroundImage;
        const imageUrl = bgImage.slice(5, -2); // Extract URL from url(...)
        
        document.getElementById('lightbox-image').src = imageUrl;
        document.getElementById('lightbox-caption').textContent = image.querySelector('h3').textContent;
        document.getElementById('lightbox').style.display = 'flex';
    }

    function closeLightbox() {
        document.getElementById('lightbox').style.display = 'none';
    }

    function nextImage() {
        const images = document.querySelectorAll('.gallery-image');
        currentImageIndex = (currentImageIndex + 1) % images.length;
        openLightbox(currentImageIndex);
    }

    function prevImage() {
        const images = document.querySelectorAll('.gallery-image');
        currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
        openLightbox(currentImageIndex);
    }

    // Filter functionality
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const filter = this.dataset.filter;
            document.querySelectorAll('.gallery-item').forEach(item => {
                if (filter === 'all' || item.dataset.category === filter) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    // Close lightbox on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowRight') nextImage();
        if (e.key === 'ArrowLeft') prevImage();
    });
</script>

@endsection