@extends ('admin.layouts.app')

@section('content')

<style>
    body{
        font-family: Arial, sans-serif;
        background:#f5f7fa;
        padding:40px;
    }
    .container{
        background:white;
        padding:30px;
        border-radius:10px;
        max-width:600px;
        margin:0 auto;
    }
    h1{
        margin-bottom:20px;
    }
    .input{
        width:100%;
        padding:10px;
        margin-bottom:15px;
        border-radius:6px;
        border:1px solid #ddd;
    }
    .btn-upload{
        background:#111827;
        color:white;
        padding:10px 15px;
        border-radius:8px;
        border:none;
        cursor:pointer;
    }
    .checkbox{
        display:flex;
        align-items:center;
        margin-bottom:15px;
    }
    .checkbox input{
        margin-right:10px;
    }
</style>

    <div class="container">
        <h1>Create Gallery Image</h1>
        <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data" class="upload-form">
                    @csrf

                    <input type="text" name="title" placeholder="Title" class="input">
                    <select name="category" class="input">
                        <option value="">Select Category</option>
                        <option value="Cultural Experience">Cultural Experience</option>
                        <option value="Landscape">Landscape</option>
                        <option value="Wildlife">Wildlife</option>
                    </select>
                    <input type="text" name="description" placeholder="Description" class="input">
                    <input type="file" name="image" required class="input">

                    <label class="checkbox">
                        <input type="checkbox" name="featured">
                        Featured
                    </label>

                    <button type="submit" class="btn-upload">Upload</button>
                </form>
    </div>

@endsection