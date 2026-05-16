@extends('layouts.app')

@section('content')

<section class="page-header">
	<h1>Our Blog</h1>
	<p>Insights, tips and stories from Uganda</p>
</section>

<section class="blog-section">
	<div class="blog-container">
		{{-- Example posts - replace with dynamic loop later --}}
		@foreach($blogs as $blog)

			<div class="blog-card">

				<div class="blog-image"
					style="background-image:url('{{ asset('storage/' . $blog->image) }}');">
				</div>

				<div class="blog-content">

					<h3>{{ $blog->title }}</h3>

					<p class="blog-meta">
						{{ $blog->created_at->format('F d, Y') }}
						&middot; by {{ $blog->author }}
					</p>

					<p>{{ $blog->excerpt }}</p>

					<a href="{{ url('/blog/'.$blog->slug) }}" class="blog-readmore">
						Read more →
					</a>

				</div>

			</div>

		@endforeach
	</div>
	<div class="blog-write" style="text-align:center; margin-top:40px;radious:8px;">
		<a href="{{ route('blogs.create') }}" class="btn-primary">
				Write a Blog
			</a>
	</div>
</section>

@endsection

