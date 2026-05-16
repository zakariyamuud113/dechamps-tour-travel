@extends('admin.layouts.app')

@section('content')

<style>
    .card{
        background:white;
        padding:20px;
        border-radius:10px;
    }
    .form-group{
        margin-bottom:15px;
    }
    .form-control{
        width:100%;
        padding:10px;
        border:1px solid #ccc;
        border-radius:5px;
    }
    .btn-primary{
        background:#111827;
        color:white;
        padding:10px 15px;
        border-radius:8px;
        text-decoration:none;
        display:inline-block;
    }
    .btn-primary:hover{
        background:#1f2937;
    }
</style>

<div class="card">
    <h1>Create Blog</h1>
    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" accept="image/*" id="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create Blog</button>
        </form>
    </div>
@endsection