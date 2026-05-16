@extends('admin.layouts.app')

@section('content')

 <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            background:#f5f7fa;
            display:flex;
        }
       
        .main-content{
            flex:1;
            padding:40px;
        }

        .dashboard-title{
            margin-bottom:30px;
        }

        .stats-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit, minmax(250px, 1fr));
            gap:20px;
        }

        .stat-card{
            background:white;
            padding:30px;
            border-radius:15px;
            box-shadow:0 5px 20px rgba(0,0,0,0.05);
        }

        .stat-card h3{
            font-size:18px;
            margin-bottom:10px;
            color:#6b7280;
        }

        .stat-card p{
            font-size:32px;
            font-weight:bold;
            color:#111827;
        }
    </style>

<div class="card">

    <h1 class="dashboard-title">
            Dashboard Overview
        </h1>

        <div class="stats-grid">

            <div class="stat-card">
                <h3>Total Bookings</h3>
                <p>{{ $totalBookings }}</p>
            </div>

            <div class="stat-card">
                <h3>Total Destinations</h3>
                <p>{{ $destinations }}</p>
            </div>

            <div class="stat-card">
                <h3>Total Blogs</h3>
                <p>{{ $totalBlogs }}</p>
            </div>

        </div>
</div>

@endsection