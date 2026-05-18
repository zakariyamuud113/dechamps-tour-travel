@extends('admin.layouts.app')
@section('content')

<style>
        body{
            font-family:Arial, sans-serif;
            background:##f5f7fa;
            padding:40px;
        }

    .admin-form {
        display: flex;
        flex-direction: column;
        gap: 15px;
        max-width: 500px;
        margin-top: 10px;
    }

    .admin-form input[type="text"],
    .admin-form textarea,
    .admin-form input[type="file"] {
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #ccc;
    }
    .admin-form button {
        background: #111827;
        color: white;
        padding: 10px 15px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
    }
    .admin-form button:hover {
        background: #0cf07a;
    }
</style>

<form class="admin-form" action="{{ route('admin.destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    Name: <input type="text" name="name" value="{{ $destination->name }}" required>

    Description: <textarea name="description">{{ $destination->description }}</textarea>

    Location: <input type="text" name="location" value="{{ $destination->location }}">

    Price: <input type="text" name="price" value="{{ $destination->price }}">

    Category: <input type="text" name="category" value="{{ $destination->category }}">

    Difficulty: <input type="text" name="difficulty" value="{{ $destination->difficulty }}">

    Duration: <input type="text" name="duration" value="{{ $destination->duration }}">

    <input type="checkbox" name="featured" id="editFeatured" {{ $destination->featured ? 'checked' : '' }}>
    <label for="editFeatured">Featured</label>

    <input type="text" name="existing_image" value="{{ $destination->image }}" hidden>

    <input type="file" name="image">

    <button type="submit">Update</button>
</form>

@endsection