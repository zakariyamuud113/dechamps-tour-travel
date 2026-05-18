@extends('admin.layouts.app')

@section('content')

<style>
.gallery-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
    margin-top: 20px;
}

.gallery-item {
    background: white;
    padding: 10px;
    border-radius: 10px;
}

.gallery-image {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 10px;
}

.upload-form {
    display: flex;
    flex-direction: column;
    gap: 6px;
    margin-top: 10px;
}

.input {
    padding: 6px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.checkbox {
    font-size: 14px;
}

.btn-primary {
    background: #007bff;
    color: white;
    padding: 8px 12px;
    border-radius: 6px;
    text-decoration: none;
}

.btn-upload {
    background: green;
    color: white;
    padding: 6px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-delete {
    background: red;
    color: white;
    padding: 5px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.alert-success {
    background: #d4edda;
    padding: 10px;
    margin-top: 10px;
    border-radius: 6px;
    color: #155724;
}

.gallery-title {
    margin-top: 8px;
    font-weight: bold;
}
</style>

<div class="card">

    <div class="gallery-header">
        <h1>Gallery</h1>

        <a href="{{ route('admin.gallery.create') }}" class="btn-primary">
            + Upload Image
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="gallery-grid">

        @foreach($galleries as $img)
            <div class="gallery-item">

                <img src="{{ asset('storage/' . $img->image) }}" class="gallery-image">

                <p class="gallery-title">{{ $img->title }}</p>

                <form method="POST" action="{{ route('admin.gallery.delete', $img->id) }}">
                    @csrf
                    @method('DELETE')

                    <button class="btn-delete">
                        Delete
                    </button>
                </form>

            </div>
        @endforeach

    </div>

</div>

@endsection