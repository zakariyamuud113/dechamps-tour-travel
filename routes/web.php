<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Models\Destination;
use App\Models\Testimonial;
use App\Models\Gallery;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/', function () {
    $featuredDestinations = Destination::where('featured', true)
        ->take(3)
        ->get();

    $testimonials = Testimonial::where('featured', true)
        ->take(4)
        ->get();

    return view('pages.home', compact('featuredDestinations', 'testimonials'));
});

Route::get('/gallery', function () {
    $galleries = Gallery::where('featured', true)->get();

    return view('pages.gallery', compact('galleries'));
});

Route::get('/booking', [BookingController::class, 'create']);
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

Route::view('/about', 'pages.about');
Route::view('/destinations', 'pages.destinations');
Route::view('/services', 'pages.services');

Route::view('/contact', 'pages.contact');
Route::view('/blogs', 'pages.blogs');


// Dynamic route for destination details
Route::get('/destinations', [DestinationController::class, 'index']);