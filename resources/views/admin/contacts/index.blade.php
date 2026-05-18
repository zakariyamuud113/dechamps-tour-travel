@extends('admin.layouts.app')

@section('content')

<style>
     body{
        font-family: Arial, sans-serif;
        background:#f5f7fa;
        padding:40px;
    }
    .contacts-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:20px;
    }

    .table-card{
        background:white;
        padding:20px;
        border-radius:10px;
        overflow-x:auto;
    }

    .contacts-table{
        width:100%;
        border-collapse:collapse;
    }

    .contacts-table th,
    .contacts-table td{
        padding:12px;
        text-align:left;
    }

    .contacts-table thead tr{
        background:#704721;
        color:white;
    }

    .contacts-table tbody tr{
        border-bottom:1px solid #eee;
    }

    .badge-unread,
    .badge-read{
        color:white;
        padding:5px 10px;
        border-radius:20px;
        font-size:13px;
    }

    .badge-unread{
        background:#ef4444;
    }

    .badge-read{
        background:#22c55e;
    }

    .actions{
        display:flex;
        gap:10px;
    }

    .btn-view,
    .btn-delete{
        padding:6px 12px;
        border:none;
        border-radius:6px;
        color:white;
        cursor:pointer;
        text-decoration:none;
    }

    .btn-view{
        background:#3b82f6;
    }

    .btn-delete{
        background:#ef4444;
    }
</style>

<div class="card">

    <div class="contacts-header">
        <h1>Contact Messages</h1>
    </div>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-card">

        <table class="contacts-table">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($messages as $contact)

                <tr>
                    <td>{{ $contact->full_name }}</td>

                    <td>{{ $contact->email }}</td>

                    <td>{{ $contact->subject }}</td>

                    <td>
                        @if($contact->status == 'unread')
                            <span class="badge-unread">Unread</span>
                        @else
                            <span class="badge-read">Read</span>
                        @endif
                    </td>

                    <td>
                        {{ $contact->created_at->format('d M Y') }}
                    </td>

                    <td class="actions">

                        <a href="{{ route('admin.contacts.show', $contact->id) }}"
                           class="btn-view">
                            View
                        </a>

                        <form action="{{ route('admin.contacts.delete', $contact->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button class="btn-delete">
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="6">
                        No contact messages found.
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection