@extends('layouts.app')

@section('content')

<section class="page-header">
    <h1>Get In Touch</h1>
    <p>We're here to help plan your perfect Ugandan adventure</p>
</section>



<section class="contact-section">
    @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif
    <div class="contact-wrapper">
        <!-- Contact Information -->
        <div class="contact-info-column">
            <div class="contact-info-card">
                <h3>📍 Office Location</h3>
                <p>
                    Dechamps Tours Ltd<br>
                    Kampala, Uganda<br>
                    East Africa
                </p>
            </div>

            <div class="contact-info-card">
                <h3>📞 Phone</h3>
                <p>
                    Main: +256 700 XXX XXX<br>
                    WhatsApp: +256 700 XXX XXX<br>
                    <small style="color: #999;">Available 24/7</small>
                </p>
            </div>

            <div class="contact-info-card">
                <h3>✉️ Email</h3>
                <p>
                    Bookings: <a href="mailto:bookings@dechampostours.com">bookings@dechampostours.com</a><br>
                    Support: <a href="mailto:support@dechampostours.com">support@dechampostours.com</a><br>
                    General: <a href="mailto:info@dechampostours.com">info@dechampostours.com</a>
                </p>
            </div>

            <div class="contact-info-card">
                <h3>⏰ Hours of Operation</h3>
                <p>
                    <strong>Monday - Friday:</strong> 8:00 AM - 6:00 PM<br>
                    <strong>Saturday:</strong> 9:00 AM - 2:00 PM<br>
                    <strong>Sunday & Holidays:</strong> Emergency support only
                </p>
            </div>

            <div class="contact-info-card social">
                <h3>Follow Us</h3>
                <div class="social-links">
                    <a href="#" class="social-icon">f</a>
                    <a href="#" class="social-icon">𝕏</a>
                    <a href="#" class="social-icon">📷</a>
                    <a href="#" class="social-icon">in</a>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-form-column">
            <div class="form-card">
                <h3>Send us a Message</h3>
                <p style="color: #666; margin-bottom: 25px;">Have questions? Fill out the form below and we'll get back to you within 24 hours.</p>

                <form id="contactForm" action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Full Name *</label>
                        <input type="text" name="full_name" placeholder="Your full name" required>
                    </div>

                    <div class="form-group">
                        <label>Email Address *</label>
                        <input type="email" name="email" placeholder="your@email.com" required>
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="tel" name="phone" placeholder="+256 XXX XXX XXX">
                    </div>

                    <div class="form-group">
                        <label>Subject *</label>
                        <select name="subject" required>
                            <option value="">Select a subject</option>
                            <option value="booking">Booking Inquiry</option>
                            <option value="general">General Question</option>
                            <option value="feedback">Feedback</option>
                            <option value="complaint">Complaint</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Message *</label>
                        <textarea name="message" placeholder="Tell us more about your inquiry..." rows="5" required></textarea>
                    </div>

                    <div class="form-group checkbox">
                        <input type="checkbox" name="subscribe" id="subscribe">
                        <label for="subscribe">Subscribe to our newsletter for travel tips and special offers</label>
                    </div>

                    <button type="submit" class="btn-submit" >Send Message</button>
                </form>

                <p style="color: #999; font-size: 0.85em; margin-top: 20px; text-align: center;">
                    📧 We typically respond to inquiries within 24 hours
                </p>
            </div>
        </div>
    </div>

    <!-- Why Contact Us -->
    <div class="contact-benefits">
        <h2>Why Contact Dechamps Tours?</h2>
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-icon">🚀</div>
                <h4>Expert Planning</h4>
                <p>Let our experienced team customize your perfect itinerary based on your interests and budget.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">💰</div>
                <h4>Best Value</h4>
                <p>We offer competitive pricing without compromising on quality or your safety.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">🛡️</div>
                <h4>24/7 Support</h4>
                <p>Throughout your journey, our team is available around the clock for any assistance.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">✅</div>
                <h4>Trusted Service</h4>
                <p>With 15+ years of experience, we've earned the trust of thousands of satisfied travelers.</p>
            </div>
        </div>
    </div>
</section>

<!-- <script>
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(this);
        
        // Show success message
        alert('Thank you! Your message has been sent. We will contact you shortly.');
        this.reset();
    });
</script> -->

@endsection