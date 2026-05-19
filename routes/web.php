<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Models\Destination;
use App\Models\Testimonial;
use App\Models\Gallery;
use App\Models\Blog;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Models\ContactMessage;
use App\Models\AboutPage;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('pages.home');
});


// Dynamic route for destination details
Route::get('/', function () {
    $featuredDestinations = Destination::where('featured', true)
        ->take(3)
        ->get();

    $testimonials = Testimonial::where('featured', true)
        ->take(4)
        ->get();

    return view('pages.home', compact('featuredDestinations', 'testimonials'));
});

// Gallery Route
Route::get('/gallery', function () {
    $galleries = Gallery::where('featured', true)->get();

    return view('pages.gallery', compact('galleries'));
});

//Booking Routes
Route::get('/booking', [BookingController::class, 'create']);
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

//Admin Dashboard Route
Route::get('/admin/dashboard', [AdminController::class, 'index'])
    ->name('admin.dashboard');

// Admin Bookings Route
Route::get('/admin/bookings', [AdminController::class, 'bookings'])
    ->name('admin.bookings');

Route::put('/admin/bookings/{booking}/status', [AdminController::class, 'updateBookingStatus'])
    ->name('admin.bookings.status');

Route::delete('/admin/bookings/{booking}', [AdminController::class, 'deleteBooking'])
    ->name('admin.bookings.delete');

//Admin Destinations Route
Route::get('/admin/destinations', [AdminController::class, 'destinations'])
    ->name('admin.destinations.index');

Route::get('/admin/destinations/create', [AdminController::class, 'createDestination'])
    ->name('admin.destinations.create');

Route::post('/admin/destinations', [AdminController::class, 'storeDestination'])
    ->name('admin.destinations.store');

Route::get('/admin/destinations/{id}/edit', [AdminController::class, 'editDestination'])
    ->name('admin.destinations.edit');

Route::put('/admin/destinations/{id}', [AdminController::class, 'updateDestination'])
    ->name('admin.destinations.update');

Route::delete('/admin/destinations/{id}', [AdminController::class, 'deleteDestination'])
    ->name('admin.destinations.delete');


// ADMIN BLOG MANAGEMENT
Route::get('/admin/blogs', [AdminController::class, 'blogs'])->name('admin.blogs.index');
Route::get('/admin/blogs/create', [AdminController::class, 'createBlog'])->name('admin.blogs.create');
Route::post('/admin/blogs', [AdminController::class, 'storeBlog'])->name('admin.blogs.store');

Route::get('/admin/blogs/{id}/edit', [AdminController::class, 'editBlog'])->name('admin.blogs.edit');
Route::put('/admin/blogs/{id}', [AdminController::class, 'updateBlog'])->name('admin.blogs.update');

Route::delete('/admin/blogs/{id}', [AdminController::class, 'deleteBlog'])->name('admin.blogs.delete');

// Blog APPROVAL SYSTEM
Route::post('/admin/blogs/{id}/approve', [AdminController::class, 'approveBlog'])->name('admin.blogs.approve');
Route::post('/admin/blogs/{id}/reject', [AdminController::class, 'rejectBlog'])->name('admin.blogs.reject');

//Admin Contact Messages
Route::get('/admin/contacts', [AdminController::class, 'contactMessages'])
    ->name('admin.contacts');

Route::get('/admin/contacts/{id}', [AdminController::class, 'showContact'])
    ->name('admin.contacts.show');

Route::put('/admin/contacts/{id}/read', [AdminController::class, 'markContactRead'])
    ->name('admin.contacts.read');

Route::delete('/admin/contacts/{id}', [AdminController::class, 'deleteContact'])
    ->name('admin.contacts.delete');


// Admin About Page Management
Route::get('/admin/about', [AdminController::class, 'aboutPage'])->name('admin.about.index');
Route::get('/admin/about', [AdminController::class, 'editAbout'])->name('admin.about.edit');

Route::post('/admin/about', [AdminController::class, 'updateAbout'])->name('admin.about.update');


//Admin Gallery Route
Route::prefix('admin')->middleware('web')->group(function () {
    Route::get('/gallery', [AdminController::class, 'gallery'])->name('admin.gallery');

    Route::get('/gallery/create', [AdminController::class, 'createGallery'])->name('admin.gallery.create');

    Route::post('/gallery', [AdminController::class, 'storeGallery'])->name('admin.gallery.store');

    Route::delete('/gallery/{id}', [AdminController::class, 'deleteGallery'])->name('admin.gallery.delete');
});




//submission of blogs by users
Route::get('/blogs/submit', [BlogController::class, 'create'])->name('blogs.create');
Route::post('/blogs/submit', [BlogController::class, 'store'])->name('blogs.store');

//blogs details route
Route::get('/blogs', [BlogController::class, 'index'])->name('pages.blogs');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('pages.blog-details');

//contact form route
Route::post('/contact-submit', [ContactController::class, 'store'])
    ->name('contact.submit');

Route::view('/about', 'pages.about');
Route::view('/destinations', 'pages.destinations');
Route::view('/services', 'pages.services');
Route::view('/contact', 'pages.contact');



// Dynamic route for destination details
Route::get('/destinations', [DestinationController::class, 'index']);