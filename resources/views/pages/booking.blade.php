@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
@endif

<section class="page-header">
    <h1>Book Your Adventure</h1>
    <p>Complete your booking in just 3 easy steps</p>
</section>

<section class="booking-section">
    <div class="booking-container">
        <!-- Progress Steps -->
        <div class="booking-steps">
            <div class="step active" data-step="1">
                <div class="step-number">1</div>
                <div class="step-label">Select Package</div>
            </div>
            <div class="step-connector"></div>
            <div class="step" data-step="2">
                <div class="step-number">2</div>
                <div class="step-label">Your Details</div>
            </div>
            <div class="step-connector"></div>
            <div class="step" data-step="3">
                <div class="step-number">3</div>
                <div class="step-label">Payment</div>
            </div>
        </div>

        <div class="booking-wrapper">
            <!-- Left Side: Form -->
            <div class="booking-form-section">
                <form 
                    class="booking-form" 
                    id="bookingForm"
                    action="{{ route('booking.store') }}"
                    method="POST"
                >
                    @csrf
                    <!-- Step 1: Package Selection -->
                    <div class="form-step active" id="step-1">
                        <h3>Select Your Package</h3>
                        <div class="package-selection">

                        @foreach($destinations as $destination)
                            <label class="package-option">
                                <input 
                                    type="radio" 
                                    name="destination_id"
                                    value="{{ $destination->id }}"
                                    required
                                >
                                <div class="package-card">
                                    <h4>{{ $destination->name }}</h4>
                                    <p>
                                        {{ $destination->duration }} | 
                                        {{ $destination->group_size }}
                                    </p>
                                    <span class="package-price">
                                        From ${{ $destination->price }}
                                    </span>
                                </div>
                            </label>
                        @endforeach
                    </div>

                        <div class="form-group">
                            <label>Preferred Departure Date</label>
                            <input type="date" name="preferred_date" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Number of Travelers</label>
                                <input type="number" name="travelers" min="1" max="20" value="1" required>
                            </div>
                            <div class="form-group">
                                <label>Duration (Days)</label>
                                <select name="duration" required>
                                    <option value="">Select duration</option>
                                    <option value="2">2 Days</option>
                                    <option value="3">3 Days</option>
                                    <option value="4">4 Days</option>
                                    <option value="5">5 Days</option>
                                    <option value="6">6 Days</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Traveler Details -->
                    <div class="form-step" id="step-2">
                        <h3>Your Details</h3>
                        
                        <div class="form-group">
                            <label>Full Name *</label>
                            <input type="text" name="full_name" placeholder="Enter your full name" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Email Address *</label>
                                <input type="email" name="email" placeholder="your@email.com" required>
                            </div>
                            <div class="form-group">
                                <label>Phone Number *</label>
                                <input type="tel" name="phone" placeholder="+256 XXX XXX XXX" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Country *</label>
                                <input type="text" name="country" placeholder="Your country" required>
                            </div>
                            <div class="form-group">
                                <label>Age Group *</label>
                                <select name="age_group" required>
                                    <option value="">Select age group</option>
                                    <option value="18-25">18-25</option>
                                    <option value="26-35">26-35</option>
                                    <option value="36-50">36-50</option>
                                    <option value="50+">50+</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Accommodation Preference</label>
                            <div class="radio-group">
                                <label><input type="radio" name="accommodation" value="luxury"> Luxury Lodges</label>
                                <label><input type="radio" name="accommodation" value="standard"> Standard Hotels</label>
                                <label><input type="radio" name="accommodation" value="budget"> Budget Friendly</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Dietary Requirements</label>
                            <textarea name="dietary_requirements" placeholder="Any allergies or dietary restrictions?" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Special Requests</label>
                            <textarea name="special_requests" placeholder="Tell us about any special preferences..." rows="3"></textarea>
                        </div>

                        <!-- <div class="form-group checkbox">
                            <input type="checkbox" name="insurance" id="insurance">
                            <label for="insurance">Add Travel Insurance (+$50)</label>
                        </div> -->
                    </div>

                    <!-- Step 3: Payment -->
                    <div class="form-step" id="step-3">
                        <h3>Payment Details</h3>
                        
                        <div class="booking-summary-box">
                            <h4>Booking Summary</h4>
                            <div class="summary-item">
                                <span>Package:</span>
                                <span id="summary-package">-</span>
                            </div>
                            <div class="summary-item">
                                <span>Travelers:</span>
                                <span id="summary-travelers">-</span>
                            </div>
                            <div class="summary-item">
                                <span>Duration:</span>
                                <span id="summary-duration">-</span>
                            </div>
                            <div class="summary-item">
                                <span>Subtotal:</span>
                                <span id="summary-subtotal">$0</span>
                            </div>
                            <!-- <div class="summary-item">
                                <span>Insurance:</span>
                                <span id="summary-insurance">$0</span>
                            </div> -->
                            <div class="summary-item total">
                                <span>Total Amount:</span>
                                <span id="summary-total">$0</span>
                            </div>
                        </div>

                         <!-- <h4 style="margin-top: 30px;">Payment Methods</h4>
                        <div class="payment-methods">
                            <label class="payment-option active">
                                <input type="radio" name="payment_method" value="bank_transfer" checked>
                                <div class="payment-card">
                                    <div class="payment-icon">🏦</div>
                                    <h5>Bank Transfer</h5>
                                    <p>Direct deposit to our account</p>
                                </div>
                            </label>

                            <label class="payment-option">
                                <input type="radio" name="payment_method" value="mobile_money">
                                <div class="payment-card">
                                    <div class="payment-icon">📱</div>
                                    <h5>Mobile Money</h5>
                                    <p>MTN or Airtel mobile transfer</p>
                                </div>
                            </label>

                            <label class="payment-option">
                                <input type="radio" name="payment_method" value="card">
                                <div class="payment-card">
                                    <div class="payment-icon">💳</div>
                                    <h5>Credit/Debit Card</h5>
                                    <p>Secure online payment</p>
                                </div>
                            </label>
                        </div>

                        <div class="payment-details" id="bank-details">
                            <h5>Transfer Details</h5>
                            <div class="detail-box">
                                <p><strong>Bank Name:</strong> Standard Chartered Bank Uganda</p>
                                <p><strong>Account Name:</strong> Dechamps Tours Ltd</p>
                                <p><strong>Account Number:</strong> 0120 345 6789</p>
                                <p><strong>Merchant_ID:</strong> SCBLUGKA</p>
                            </div>
                        </div>

                        <div class="security-info">
                            🔒 Your booking is secure and encrypted. No payment details are shared.
                        </div> -->
                    </div>

                    <!-- Form Navigation Buttons -->
                    <div class="form-navigation">
                        <button type="button" class="btn-secondary" id="prevBtn" onclick="previousStep()" style="display:none;">← Previous</button>
                        <button type="button" class="btn-primary" id="nextBtn" onclick="nextStep()">Next →</button>
                        <button type="submit" class="btn-success" id="submitBtn" style="display:none;">Complete Booking</button>
                    </div>
                </form>
            </div>

            <!-- Right Side: Booking Info & FAQ -->
            <div class="booking-info-section">
                <div class="info-card">
                    <h4>📋 What's Included</h4>
                    <ul>
                        <li>Professional guided tours</li>
                        <li>All park entrance fees</li>
                        <li>Accommodation & meals</li>
                        <li>Ground transportation</li>
                        <li>Equipment & gear</li>
                        <li>24/7 support</li>
                    </ul>
                </div>

                <div class="info-card">
                    <h4>❓ FAQ</h4>
                    <div class="faq-item">
                        <h5>When do I need to pay?</h5>
                        <p>A 30% deposit is due at booking. Balance due 30 days before departure.</p>
                    </div>
                    <div class="faq-item">
                        <h5>Can I cancel my booking?</h5>
                        <p>Yes, full refund if cancelled 60+ days before. 50% refund within 30 days.</p>
                    </div>
                    <!-- <div class="faq-item">
                        <h5>Is travel insurance required?</h5>
                        <p>Recommended but optional. We can help arrange comprehensive coverage.</p>
                    </div> -->
                    <div class="faq-item">
                        <h5>What about visas?</h5>
                        <p>We provide visa guidance and can arrange letters of invitation if needed.</p>
                    </div>
                </div>

                <div class="testimonial-card">
                    <h4>⭐ Happy Travelers</h4>
                    <p>"Best safari experience ever! Dechamps Tours made everything so easy and memorable."</p>
                    <p class="author">- Sarah M., USA</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let currentStep = 1;
    const totalSteps = 3;

    function nextStep() {
        if (validateStep(currentStep)) {
            updateSummary();
            if (currentStep < totalSteps) {
                currentStep++;
                showStep(currentStep);
            }
        }
    }

    function previousStep() {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    }

    function showStep(step) {
        document.querySelectorAll('.form-step').forEach(el => el.classList.remove('active'));
        document.getElementById(`step-${step}`).classList.add('active');

        document.querySelectorAll('.step').forEach(el => el.classList.remove('active'));
        document.querySelector(`[data-step="${step}"]`).classList.add('active');

        // Update button visibility
        document.getElementById('prevBtn').style.display = step === 1 ? 'none' : 'block';
        document.getElementById('nextBtn').style.display = step === totalSteps ? 'none' : 'block';
        document.getElementById('submitBtn').style.display = step === totalSteps ? 'block' : 'none';

        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function validateStep(step) {
    const stepElement = document.getElementById(`step-${step}`);
    const inputs = stepElement.querySelectorAll('input[required], select[required], textarea[required]');

    let isValid = true;

    inputs.forEach(input => {

        if (!input.value) {
            input.style.border = "2px solid red";
            isValid = false;
        } else {
            input.style.border = "";
        }

    });

    return isValid;
}

    function updateSummary() {

        const packageSelect = document.querySelector('input[name="destination_id"]:checked');
        const travelers = document.querySelector('input[name="travelers"]').value || 1;
        const duration = document.querySelector('select[name="duration"]').value || 0;
        // const insurance = document.querySelector('input[name="insurance"]').checked;

        if (!packageSelect) return;

        const packageCard = packageSelect.closest('.package-option');
        const packageName = packageCard.querySelector('h4').innerText;

        // Extract price from text "From $1500"
        const priceText = packageCard.querySelector('.package-price').innerText;
        const basePrice = parseFloat(priceText.replace(/[^0-9.]/g, ''));;

        const totalPrice = basePrice * travelers;
        // const insurancePrice = insurance ? 50 : 0;
        const total = totalPrice // + insurancePrice;

        // UPDATE UI
        document.getElementById('summary-package').textContent = packageName;
        document.getElementById('summary-travelers').textContent = travelers + ' person(s)';
        document.getElementById('summary-duration').textContent = duration + ' days';
        document.getElementById('summary-subtotal').textContent = '$' + totalPrice;
        // document.getElementById('summary-insurance').textContent = insurance ? '$' + insurancePrice : '$0';
        document.getElementById('summary-total').textContent = '$' + total;
    }

    // Listen for changes to update summary in real-time
    document.addEventListener('change', function(e) {
        if (
            e.target.name === 'destination_id' ||
            e.target.name === 'travelers' ||
            e.target.name === 'duration' 
            // e.target.name === 'insurance'
        ) {
            updateSummary();
        }
    });

    // Initialize
    updateSummary();
    document.querySelectorAll('input, select, textarea').forEach(el => {
        el.addEventListener('change', updateSummary);
    });
</script>

@endsection