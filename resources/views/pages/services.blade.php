@extends('layouts.app')

@section('content')

<section class="page-header" style="background-image: url('{{ asset('assets/images/services.png') }}'); no-repeat center center; background-size: cover;">
    <h1>Our Services</h1>
    <p>Comprehensive travel solutions for your unforgettable Uganda adventure</p>
</section>

<section class="services-section">
    <div class="services-intro">
        <h2>What We Offer</h2>
        <p>From thrilling wildlife safaris to immersive cultural experiences, we provide end-to-end travel services designed to make your journey seamless and unforgettable.</p>
    </div>

    <div class="services-grid">
        <div class="service-card">
            <div class="service-icon">🦁</div>
            <h3>Safari and Wildlife Tours</h3>
            <p class="service-description">Experience the wild beauty of Africa on a guided safari tour. Witness the Big Five and countless other species in their natural habitat.</p>
            <div class="service-features">
                <ul>
                    <li>Expert naturalist guides</li>
                    <li>Game drives & walking safaris</li>
                    <li>Photography opportunities</li>
                    <li>Flexible scheduling</li>
                </ul>
            </div>
            <a href="#" class="service-btn">Learn More</a>
        </div>

        <div class="service-card">
            <div class="service-icon">🦍 & 🐒</div>
            <h3>Gorilla & Chimpanzee Trekking</h3>
            <p class="service-description">Get up close with the majestic mountain gorillas and chimpanzees in their natural habitat. A once-in-a-lifetime experience in Bwindi Impenetrable National Park & Mgahinga Gorilla National Park.</p>
            <div class="service-features">
                <ul>
                    <li>Guided jungle treks</li>
                    <li>Safety equipment provided</li>
                    <li>Small group sizes</li>
                    <li>Professional photographers</li>
                </ul>
            </div>
            <a href="#" class="service-btn">Learn More</a>
        </div>

        <div class="service-card">
            <div class="service-icon">🚗</div>
            <h3>Airport Transfers</h3>
            <p class="service-description">Convenient and reliable airport transfer services to start your journey smoothly. Professional drivers and comfortable vehicles.</p>
            <div class="service-features">
                <ul>
                    <li>24/7 availability</li>
                    <li>Meet & greet service</li>
                    <li>Direct hotel transfer</li>
                    <li>Flight tracking</li>
                </ul>
            </div>
            <a href="#" class="service-btn">Learn More</a>
        </div>

        <div class="service-card">
            <div class="service-icon">🏨</div>
            <h3>Hotel & Lodge Bookings</h3>
            <p class="service-description">Find and book the best hotels for your stay in Uganda. From luxury resorts to budget-friendly accommodations.</p>
            <div class="service-features">
                <ul>
                    <li>Partner hotels nationwide</li>
                    <li>Competitive rates</li>
                    <li>Best price guarantee</li>
                    <li>24-hour support</li>
                </ul>
            </div>
            <a href="#" class="service-btn">Learn More</a>
        </div>

        <!-- <div class="service-card">
            <div class="service-icon">🚙</div>
            <h3>Car Hire</h3>
            <p class="service-description">Rent a car for your adventures around Uganda with ease. Wide range of vehicles to suit your needs.</p>
            <div class="service-features">
                <ul>
                    <li>Modern fleet</li>
                    <li>Insurance included</li>
                    <li>GPS navigation</li>
                    <li>Flexible terms</li>
                </ul>
            </div>
            <a href="#" class="service-btn">Learn More</a>
        </div> -->

        <div class="service-card">
            <div class="service-icon">🎭</div>
            <h3>Cultural Experiences</h3>
            <p class="service-description">Immerse yourself in the rich culture and traditions of Uganda. Meet local communities and understand their heritage.</p>
            <div class="service-features">
                <ul>
                    <li>Village visits</li>
                    <li>Traditional ceremonies</li>
                    <li>Craft workshops</li>
                    <li>Local meal preparation</li>
                </ul>
            </div>
            <a href="#" class="service-btn">Learn More</a>
        </div>

        <div class="service-card">
            <div class="service-icon">🏔️</div>
            <h3>Adventure Activities</h3>
            <p class="service-description">From hiking to white-water rafting, discover thrilling activities in Uganda. Perfect for adrenaline seekers.</p>
            <div class="service-features">
                <ul>
                    <li>Hiking & trekking</li>
                    <li>White-water rafting</li>
                    <li>Zip-lining</li>
                    <li>Mountain biking</li>
                    <li>Nature walks</li>
                </ul>
            </div>
            <a href="#" class="service-btn">Learn More</a>
        </div>

        <div class="service-card">
            <div class="service-icon">💑</div>
            <h3>Honeymoon Packages</h3>
            <p class="service-description">Celebrate your love with a romantic honeymoon in Uganda. Tailored packages for unforgettable experiences.</p>
            <div class="service-features">
                <ul>
                    <li>Romantic accommodations</li>
                    <li>Private tours</li>
                    <li>Candlelight dinners</li>
                    <li>Couples spa treatments</li>
                </ul>
            </div>
            <a href="#" class="service-btn">Learn More</a>
        </div>

    </div>
</section>

@endsection