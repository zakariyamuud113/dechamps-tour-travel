@extends('admin.layouts.app')

@section('content')

<style>
    .body{
        font-family:Arial, sans-serif;
        background:#f5f7fa;
        padding:40px;
    }
    .admin-container{
        background:white;
        padding:30px;
        border-radius:10px;
        box-shadow:0 5px 20px rgba(0,0,0,0.05);
    }
    .page-title{
        margin-bottom:30px;
    }
    .admin-form .form-group{
        margin-bottom:20px;
    }
    .admin-form .form-row{
        display:flex;
        gap:20px;
    }
    .admin-form label{
        display:block;
        margin-bottom:8px;
        color:#6b7280;
    }
    .admin-form input[type="text"],
    .admin-form input[type="number"],
    .admin-form textarea,
    .admin-form select{
        width:100%;
        padding:10px;
        border-radius:8px;
        border:1px solid #d1d5db;
    }
    .admin-form button{
        background:#111827;
        color:white;
        padding:10px 15px;
        border-radius:8px;
        border:none;
        cursor:pointer;
    }
    .admin-form button:hover{
        background:#1f2937;
    }
    

</style>

<div class="admin-container">

    <h2 class="page-title">Create Destination</h2>

    <form action="{{ route('admin.destinations.store') }}" method="POST" enctype="multipart/form-data" class="admin-form">
        @csrf

        <div class="form-group">
            <label>Destination Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label>Location</label>
            <input type="text" name="location">
        </div>

        <div class="form-group">
            <label>Difficulty</label>
            <select name="difficulty">
                <option value="easy">Easy</option>
                <option value="moderate">Moderate</option>
                <option value="hard">Hard</option>
            </select>
        </div>

        <div class="form-group">
            <label>Best Season</label>
            <input type="text" name="best_season">
        </div>

        <div class="form-group">
            <label>Wildlife</label>
            <input type="text" name="wildlife">
        </div>

        <div class="form-group">
            <label>Best Time</label>
            <input type="text" name="best_time">
        </div>

        <div class="form-group">
            <label>Highlights</label>
            <input type="text" name="highlights">
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="4" required></textarea>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Duration</label>
                <input type="text" name="duration" placeholder="e.g 3-5 Days" required>
            </div>

            <div class="form-group">
                <label>Group Size</label>
                <input type="text" name="group_size" placeholder="e.g 2-8 Persons" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Price (USD)</label>
                <input type="number" name="price" required>
            </div>

            <div class="form-group">
                <label>Category</label>
                <select name="category" required>
                    <option value="">Select category</option>
                    <option value="wildlife">Wildlife</option>
                    <option value="landscapes">Landscapes</option>
                    <option value="culture">Culture</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" accept="image/*" required>
        </div>

            

        <button type="submit" class="btn-primary">Save Destination</button>
    </form>

</div>
@endsection