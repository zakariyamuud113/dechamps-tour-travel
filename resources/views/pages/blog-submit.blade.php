@extends('layouts.app')

@section('content')

<style>
.submit-container{
    max-width:700px;
    margin:40px auto;
    background:white;
    padding:25px;
    border-radius:10px;
}

.submit-container h1{
    margin-bottom:20px;
}

.form-group{
    margin-bottom:15px;
    display:flex;
    flex-direction:column;
}

.form-group input,
.form-group textarea{
    padding:10px;
    border:1px solid #ddd;
    border-radius:6px;
    width: auto;
}

.btn-submit{
    background:#111827;
    color:white;
    padding:10px 15px;
    border:none;
    border-radius:6px;
    cursor:pointer;
}
</style>

<div class="submit-container">

    <h1>Submit a Travel Blog</h1>

    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" required style="width:auto;">
        </div>

        <div class="form-group">
            <label>Excerpt</label>
            <textarea name="excerpt" rows="2"></textarea>
        </div>

        <div class="form-group">
            <label>Content</label>
            <textarea name="content" rows="6" required></textarea>
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" accept="image/*" required>
        </div>

        <div class="form-group">
            <label>Your Name (Author)</label>
            <input type="text" name="author" style="width:auto;" required>
        </div>

        <button class="btn-submit">Submit Blog</button>

    </form>

</div>

@endsection