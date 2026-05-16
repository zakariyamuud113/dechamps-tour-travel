@extends('admin.layouts.app')

@section('content')

<style>
    body{
        font-family: Arial, sans-serif;
        background:#f5f7fa;
        padding:40px;
    }

    .blogs-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .blogs-header h1 {
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

    .blogs-table {
        width: 100%;
        border-collapse: collapse;
    }

    .blogs-table th,
    .blogs-table td {
        padding: 12px;
        text-align: left;
    }

    .blogs-table thead tr {
        background: #704721;
        color: white;
    }

    .blogs-table tbody tr {
        border-bottom: 1px solid #eee;
    }

    .blogs-table tbody tr:hover {
        background: #f9fafb;
    }

    .status-badge {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: bold;
        display: inline-block;
    }

    .pending {
        background: #fef3c7;
        color: #92400e;
    }

    .approved {
        background: #d1fae5;
        color: #065f46;
    }

    .rejected {
        background: #fee2e2;
        color: #991b1b;
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
    }

    .btn-edit {
        background: #3b82f6;
    }

    .btn-delete {
        background: #ef4444;
    }

    .btn-small {
        padding: 5px 8px;
        font-size: 13px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
    }

    .btn-approve {
        background: #22c55e;
        color: white;
    }

    .btn-reject {
        background: #f59e0b;
        color: white;
    }
</style>

<div class="card">

    <div class="blogs-header">
        <h1>Blogs</h1>

        <a href="{{ route('admin.blogs.create') }}" class="btn-add">
            + Create Blog
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-card">
        <table class="blogs-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Featured</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($blogs as $blog)
                    <tr>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->author }}</td>

                        <td>
                            <span class="status-badge {{ $blog->status }}">
                                {{ ucfirst($blog->status) }}
                            </span>
                        </td>

                        <td>
                            @if($blog->featured)
                                Yes
                            @else
                                No
                            @endif
                        </td>

                        <td class="actions-cell">

                            {{-- EDIT --}}
                            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn-edit">
                                Edit
                            </a>

                            {{-- DELETE --}}
                            <form action="{{ route('admin.blogs.delete', $blog->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn-delete" onclick="return confirm('Delete this blog?')">
                                    Delete
                                </button>
                            </form>

                            {{-- APPROVE --}}
                            @if($blog->status !== 'approved')
                                <form action="{{ route('admin.blogs.approve', $blog->id) }}" method="POST">
                                    @csrf
                                    <button class="btn-small btn-approve">
                                        Approve
                                    </button>
                                </form>
                            @endif

                            {{-- REJECT --}}
                            @if($blog->status !== 'rejected')
                                <form action="{{ route('admin.blogs.reject', $blog->id) }}" method="POST">
                                    @csrf
                                    <button class="btn-small btn-reject">
                                        Reject
                                    </button>
                                </form>
                            @endif

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align:center; padding:20px;">
                            No blogs found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection