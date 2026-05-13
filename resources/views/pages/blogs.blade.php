@extends('layouts.app')

@section('content')

<section class="page-header">
	<h1>Our Blog</h1>
	<p>Insights, tips and stories from Uganda</p>
</section>

<section class="blog-section">
	<div class="blog-container">
		{{-- Example posts - replace with dynamic loop later --}}
		<div class="blog-card">
			<div class="blog-image" style="background-image:url('{{ asset('assets/images/guides.png') }}');"></div>
			<div class="blog-content">
				<h3>How to Prepare for Gorilla Trekking</h3>
				<p class="blog-meta">March 10, 2026 &middot; by Admin</p>
				<p>Discover essential advice and packing tips to ensure a successful gorilla trekking experience in Uganda's Bwindi Forest.</p>
				<a href="#" class="blog-readmore">Read more →</a>
			</div>
		</div>

		<div class="blog-card">
			<div class="blog-image" style="background-image:url('{{ asset('assets/images/safari-planning.png') }}');"></div>
			<div class="blog-content">
				<h3>Top Wildlife Spots in Uganda</h3>
				<p class="blog-meta">February 22, 2026 &middot; by Admin</p>
				<p>Explore the best national parks and reserves to catch a glimpse of the Big Five and other incredible wildlife.</p>
				<a href="#" class="blog-readmore">Read more →</a>
			</div>
		</div>

        <div class="blog-card">
			<div class="blog-image" style="background-image:url('{{ asset('assets/images/guides.png') }}');"></div>
			<div class="blog-content">
				<h3>How to Prepare for Gorilla Trekking</h3>
				<p class="blog-meta">March 10, 2026 &middot; by Admin</p>
				<p>Discover essential advice and packing tips to ensure a successful gorilla trekking experience in Uganda's Bwindi Forest.</p>
				<a href="#" class="blog-readmore">Read more →</a>
			</div>
		</div>

        <div class="blog-card">
			<div class="blog-image" style="background-image:url('{{ asset('assets/images/guides.png') }}');"></div>
			<div class="blog-content">
				<h3>How to Prepare for Gorilla Trekking</h3>
				<p class="blog-meta">March 10, 2026 &middot; by Admin</p>
				<p>Discover essential advice and packing tips to ensure a successful gorilla trekking experience in Uganda's Bwindi Forest.</p>
				<a href="#" class="blog-readmore">Read more →</a>
			</div>
		</div>

        <div class="blog-card">
			<div class="blog-image" style="background-image:url('{{ asset('assets/images/guides.png') }}');"></div>
			<div class="blog-content">
				<h3>How to Prepare for Gorilla Trekking</h3>
				<p class="blog-meta">March 10, 2026 &middot; by Admin</p>
				<p>Discover essential advice and packing tips to ensure a successful gorilla trekking experience in Uganda's Bwindi Forest.</p>
				<a href="#" class="blog-readmore">Read more →</a>
			</div>
		</div>
	</div>
</section>

@endsection

