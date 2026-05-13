@extends('layouts.app')

@section('content')

<section class="page-header">
    <h1>About Us</h1>
    <p>Crafting unforgettable African adventures since 2025</p>
</section>

<section class="about-section">
    <!-- Welcome Section -->
    <div class="about-welcome">
        <div class="welcome-content">
            <h2>Welcome to De-Champs Tour and Travel</h2>
            <p>We are a Ugandan-based travel agency dedicated to showcasing the authentic beauty and raw wonder of Uganda. With deep roots in the local community and years of experience, we curate extraordinary travel experiences that connect you with Africa in its most genuine form.</p>
            <p>Every journey with us is more than a vacation—it's a transformation, an adventure, and a story you'll tell for a lifetime.</p>
        </div>
        <div class="welcome-stats">
            <div class="stat-box">
                <h3>500+</h3>
                <p>Happy Travelers</p>
            </div>
            <div class="stat-box">
                <h3>15+</h3>
                <p>Years Experience</p>
            </div>
            <div class="stat-box">
                <h3>100%</h3>
                <p>Client Satisfaction</p>
            </div>
            <div class="stat-box">
                <h3>24/7</h3>
                <p>Support</p>
            </div>
        </div>
    </div>

    <!-- Mission & Vision -->
    <div class="mission-vision">
        <div class="mission-card">
            <h3>🎯 Our Mission</h3>
            <p>To promote sustainable tourism in Uganda while providing exceptional, personalized travel experiences that authentically connect our guests with Africa's natural wonders, wildlife, and vibrant cultures.</p>
        </div>
        <div class="vision-card">
            <h3>🌟 Our Vision</h3>
            <p>To be Uganda's most trusted travel partner, known for our expertise, integrity, and commitment to creating transformative travel experiences that benefit both travelers and local communities.</p>
        </div>
        <div class="values-card">
            <h3>💎 Our Values</h3>
            <ul>
                <li><strong>Authenticity:</strong> Real experiences, real connections</li>
                <li><strong>Sustainability:</strong> Protecting Uganda's natural heritage</li>
                <li><strong>Excellence:</strong> Exceeding expectations always</li>
                <li><strong>Community:</strong> Supporting local economies</li>
            </ul>
        </div>
    </div>

    <!-- Travel Tips -->
    <div class="travel-tips-section">
        <h2>Essential Travel Tips</h2>
        <p class="section-subtitle">Prepare for your Ugandan adventure with these important guidelines</p>
        
        <div class="tips-grid">
            <div class="tip-card">
                <div class="tip-icon">🗓️</div>
                <h4>Best Time to Visit</h4>
                <p>June-September and December-February offer the best wildlife viewing. Rainy seasons (March-May, October-November) feature fewer tourists and lush landscapes.</p>
            </div>

            <div class="tip-card">
                <div class="tip-icon">🛂</div>
                <h4>Visa Requirements</h4>
                <p>Most nationalities can obtain a 30-day tourist visa on arrival or online. Ensure your passport is valid for at least 6 months beyond your travel dates.</p>
            </div>

            <div class="tip-card">
                <div class="tip-icon">🎒</div>
                <h4>What to Pack</h4>
                <p>Lightweight, neutral-colored clothing for safaris, rain jacket, sturdy hiking boots, sun protection, insect repellent, and any personal medications.</p>
            </div>

            <div class="tip-card">
                <div class="tip-icon">⚕️</div>
                <h4>Health & Safety</h4>
                <p>Consult your doctor about vaccinations (Yellow Fever recommended). Uganda is generally safe for tourists. We provide 24/7 emergency support.</p>
            </div>
        </div>
    </div>

    <!-- Meet Our Team -->
    <div class="team-section">
        <h2>Meet Our Team</h2>
            <p class="section-subtitle">The experts who bring your adventure to life</p>
        
            <div class="team-grid-simple">
                <div class="team-member-simple">
                    <div class="member-image-simple" style="background-image: url('{{ asset('assets/images/guides.png') }}');"></div>
                    <h4>Samuel Kyambadde</h4>
                    <p>Senior Safari Guide</p>
                </div>

                <div class="team-member-simple">
                    <div class="member-image-simple" style="background-image: url('{{ asset('assets/images/safari-planning.png') }}');"></div>
                    <h4>Amina Nakamya</h4>
                    <p>Gorilla Trekking Specialist</p>
                </div>

                <div class="team-member-simple">
                    <div class="member-image-simple" style="background-image: url('{{ asset('assets/images/cultural-insights.png') }}');"></div>
                    <h4>Kasim Mukwaya</h4>
                    <p>Cultural Guide</p>
                </div>

                <div class="team-member-simple">
                    <div class="member-image-simple" style="background-image: url('{{ asset('assets/images/guides.png') }}');"></div>
                    <h4>Patricia Namutebi</h4>
                    <p>Adventure Coordinator</p>
                </div>

                <div class="team-member-simple">
                    <div class="member-image-simple" style="background-image: url('{{ asset('assets/images/safari-planning.png') }}');"></div>
                    <h4>Peter Ochieng</h4>
                    <p>Professional Driver</p>
                </div>

                <div class="team-member-simple">
                    <div class="member-image-simple" style="background-image: url('{{ asset('assets/images/cultural-insights.png') }}');"></div>
                    <h4>Grace Mwangi</h4>
                    <p>Customer Support Manager</p>
                </div>
        </div>
    </div>

    <!-- Testimonials -->
    <h2 style="margin-top: 50px; text-align: center;">What Our Guests Say</h2>
    <p style="text-align: center; margin-bottom: 35px; color: #666;">Hear from travelers who've experienced the magic of Uganda with us</p>
    <div class="testimonials-window">
        <div class="testimonials">
            <div class="testimonial-item">
                <img src="{{ asset('assets/images/testimonial-1.jpg') }}" alt="Jane D.">
                <blockquote>
                    "Dechamps Tours made our trip to Uganda unforgettable! Highly recommend their services." - Jane D.
                </blockquote>
            </div>
            <div class="testimonial-item">
                <img src="{{ asset('assets/images/testimonial-1.jpg') }}" alt="Jane D.">
                <blockquote>
                    "Dechamps Tours made our trip to Uganda unforgettable! Highly recommend their services." - Jane D.
                </blockquote>
            </div>
            <div class="testimonial-item">
                <img src="{{ asset('assets/images/testimonial-2.jpg') }}" alt="John D.">
                <blockquote>
                    "The guides were knowledgeable and friendly. Highly recommend Dechamps Tours!" - John D.
                </blockquote>
            </div>
            <div class="testimonial-item">
                <img src="{{ asset('assets/images/testimonial-2.jpg') }}" alt="John D.">
                <blockquote>
                    "The guides were knowledgeable and friendly. Highly recommend Dechamps Tours!" - John D.
                </blockquote>
            </div>
        </div>
    </div>
</section>

@endsection