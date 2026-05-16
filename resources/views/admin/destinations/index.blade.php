@extends('admin.layouts.app')

@section('content')

<style>
        body{
            font-family:Arial, sans-serif;
            background:#f5f7fa;
            padding:40px;
        }
    .destinations-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .destinations-header h1 {
        margin: 0;
        font-size: 1.75rem;
    }

    .btn-add {
        background: #111827;
        color: white;
        padding: 10px 15px;
        border-radius: 8px;
        text-decoration: none;
        display: inline-block;
    }

    .alert-success {
        background: #d1fae5;
        padding: 10px;
        border-radius: 6px;
        margin-bottom: 15px;
    }

    
    .table-card {
        background: white;
        padding: 20px;
        border-radius: 10px;
        overflow-x: auto;
    }

    .destinations-table {
        width: 100%;
        border-collapse: collapse;
    }

    .destinations-table th,
    .destinations-table td {
        padding: 12px;
        text-align: left;
    }

    .destinations-table thead tr {
        background: #704721;
        color: white;
    }

    .destinations-table tbody tr {
        border-bottom: 1px solid #eee;
    }

    .badge-yes,
    .badge-no {
        color: white;
        padding: 5px 10px;
        border-radius: 20px;
        display: inline-block;
    }

    .badge-yes {
        background: #22c55e;
    }

    .badge-no {
        background: #9ca3af;
    }

    .actions-cell {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .btn-edit,
    .btn-delete {
        color: white;
        padding: 6px 10px;
        border-radius: 6px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        display: inline-block;
    }

    .btn-edit {
        background: #3b82f6;
    }

    .btn-delete {
        background: #ef4444;
    }

    .no-results {
        padding: 20px;
        text-align: center;
        color: #6b7280;
    }
</style>

<div class="card">
<div class="destinations-header">
    <h1>Destinations</h1>

    <a href="{{ route('admin.destinations.create') }}" class="btn-add">
        + Add Destination
    </a>
</div>

@if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="table-card">
    <table class="destinations-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Location</th>
                <th>Price</th>
                <th>Featured</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($destinations as $destination)
            <tr>
                <td>{{ $destination->name }}</td>
                <td>{{ $destination->category ?? 'N/A' }}</td>
                <td>{{ $destination->location ?? 'N/A' }}</td>
                <td>${{ $destination->price }}</td>
                <td>
                    @if($destination->featured)
                        <span class="badge-yes">Yes</span>
                    @else
                        <span class="badge-no">No</span>
                    @endif
                </td>
                <td class="actions-cell">
                    <a href="{{ route('admin.destinations.edit', $destination->id) }}" class="btn-edit">
                        Edit
                    </a>
                    <form action="{{ route('admin.destinations.delete', $destination->id) }}" method="POST" onsubmit="return confirm('Delete this destination?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="5" class="no-results">
                    No destinations found.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
</div>

@endsection