<header class="navbar">

    <div class="logo">
        <img src="{{ asset('assets/images/dechampslogo.png') }}" alt="Company Logo">
    </div>

    <!-- HAMBURGER -->
    <div class="hamburger" id="hamburger">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <nav id="navMenu">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/destinations">Destinations</a></li>
            <li><a href="/services">Services</a></li>
            <li><a href="/gallery">Gallery</a></li>
            <li><a href="/booking">Booking</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/blogs">Blogs</a></li>
            <li><a href="/contact">Contact</a></li>

            <!-- BOOK NOW INSIDE MENU -->
            <li class="mobile-book">
                <a href="/booking" class="btn">Book Now</a>
            </li>
        </ul>
    </nav>

    <!-- DESKTOP BUTTON -->
    <div class="cta desktop-btn">
        <a href="/booking" class="btn">Book Now</a>
    </div>

</header>