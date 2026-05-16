@extends('admin.layouts.app')

@section('content')

<style>

        body{
            font-family:Arial, sans-serif;
            background:#f5f7fa;
            padding:40px;
        }

        h1{
            margin-bottom:30px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
            border-radius:10px;
            overflow:hidden;
        }

        th, td{
            padding:15px;
            border-bottom:1px solid #eee;
            text-align:left;
        }

        th{
            background:#704721;
            color:#FAF3E0;
        }

        tr:hover{
            background:#f9fafb;
        }

        .status{
            padding:6px 12px;
            border-radius:20px;
            font-size:14px;
            font-weight:bold;
        }

        .pending{
            background:#fef3c7;
            color:#92400e;
        }

        .confirmed{
            background:#d1fae5;
            color:#065f46;
        }

        .booking-table{
            width:100%;
            border-collapse:collapse;
            background:white;
            border-radius:10px;
            overflow:hidden;
        }

        .booking-table th,
        .booking-table td{
            padding:15px;
            border-bottom:1px solid #eee;
            text-align:left;
        }

        .booking-table th{
            background:#111827;
            color:white;
        }

        .booking-table select{
            padding:8px;
            border-radius:6px;
        }

        .delete-btn{
            background:red;
            color:white;
            border:none;
            padding:8px 14px;
            border-radius:6px;
            cursor:pointer;
        }
        .delete-btn:hover{
            background:#b91c1c;
        }
        .actions-cell{
            display:flex;
            gap:10px;
            align-items:center;
        }  
        .status.cancelled{
            background:#fca5a5;
            color:#991b1b;
        }
        .status.confirmed{
            background:#d1fae5;
            color:#065f46;
        }
        .status.pending{
            background:#fef3c7;
            color:#92400e;
        } 
    </style>

<div class="card">
    <h1>Bookings</h1>

       <table class="bookings-table">

        <thead>
            <tr>
                <th>Name</th>
                <th>Destination</th>
                <th>Travelers</th>
                <th>Total</th>
                <th>Status</th>
                <th>Actions</th>
                <th>UnSure</th>
            </tr>
        </thead>

        <tbody>

            @foreach($bookings as $booking)
                <tr>

                    <td>{{ $booking->full_name }}</td>

                    <td>
                        {{ $booking->destination->name ?? 'N/A' }}
                    </td>

                    <td>{{ $booking->travelers }}</td>

                    <td>${{ $booking->total_amount }}</td>

                    <td>
                        <span class="status {{ $booking->status }}">
                            {{ $booking->status }}
                        </span>
                    </td>

                    <td class="actions-cell">
                        <form action="{{ route('admin.bookings.status', $booking->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <select class="status" name="status" onchange="this.form.submit()">
                                <option value="pending"
                                    {{ $booking->status == 'pending' ? 'selected' : '' }}>
                                    Pending
                                </option>

                                <option value="confirmed"
                                    {{ $booking->status == 'confirmed' ? 'selected' : '' }}>
                                    Confirmed
                                </option>

                                <option value="cancelled"
                                    {{ $booking->status == 'cancelled' ? 'selected' : '' }}>
                                    Cancelled
                                </option>
                            </select>
                        </form>
                    </td>

                    <td>
                        <form action="{{ route('admin.bookings.delete', $booking->id) }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="delete-btn">
                                Delete
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>
</div>

@endsection