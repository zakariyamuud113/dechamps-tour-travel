@extends('admin.layouts.app')
@section('content')
<style>
    .body{
        font-family:Arial, sans-serif;
        background:#f5f7fa;
        padding:40px;
    }
    .card{
        background:white;
        padding:20px;
        border-radius:10px;
    }
    .btn-primary{
        background:#111827;
        color:white;
        padding:10px 15px;
        border-radius:8px;
        text-decoration:none;
        display:inline-block;
        margin-top:20px;
    }
    .btn-primary:hover{
        background:#1f2937;
        text-decoration:underline;
    }
    .form-group{
        margin-bottom:20px;
    }
    .form-group label{
        display:block;
        margin-bottom:8px;
        color:#6b7280;
    }
    .form-group input[type="text"],
    .form-group textarea,
    .form-group select{
        width:100%;
        padding:10px;
        border-radius:8px;
        border:1px solid #d1d5db;
    }
</style>

<div class="card">
    <h1>Edit Blog</h1>
    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $blog->title }}" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" required>{{ $blog->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ $blog->author }}" required>
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" value="{{ $blog->slug }}" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" accept="image/*" id="image" class="form-control">
                <input type="hidden" name="existing_image" value="{{ $blog->image }}">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="pending" {{ $blog->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ $blog->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                </select>
            </div>
            <button type="submit" class="btn-primary">Update Blog</button>
    </form>
</div>
@endsection