@extends('admin.layouts.app')

@section('content')

<style>
        body{
            font-family: Arial, sans-serif;
            background:#f5f7fa;
            padding:40px;
        }

    .message-card{
        background:white;
        padding:30px;
        border-radius:10px;
    }

    .message-card h2{
        margin-bottom:20px;
    }

    .message-meta{
        margin-bottom:20px;
        color:#666;
    }

    .message-body{
        line-height:1.8;
        margin-bottom:30px;
    }

    .btn-read{
        background:#22c55e;
        color:white;
        padding:10px 15px;
        border:none;
        border-radius:8px;
        cursor:pointer;
    }
    .btn-read:hover{
        background:#16a34a;
    }
</style>

<div class="message-card">

    <h2>{{ $contact->subject }}</h2>

    <div class="message-meta">
        <strong>Name:</strong> {{ $contact->full_name }} <br>
        <strong>Email:</strong> {{ $contact->email }} <br>
        <strong>Phone:</strong> {{ $contact->phone ?? 'N/A' }} <br>
    </div>

    <div class="message-body">
        {{ $contact->message }}
    </div>

    @if($contact->status == 'unread')

    <form action="{{ route('admin.contacts.read', $contact->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <button class="btn-read">
            Mark as Read
        </button>

        <button class="btn-read" onclick="window.history.back(); return false;" style="background:#6b7280; color:white; padding:10px 15px; border:none; border-radius:8px; cursor:pointer; margin-left:10px;">
            Back to Messages
        </button>

    </form>

    @endif

</div>

@endsection