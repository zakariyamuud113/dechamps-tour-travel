<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family: Arial, sans-serif;
            display:flex;
            background:#FAF3E0;
        }

        .active-link{
                background:#facc15;
                color:#111827 !important;
                padding:10px 15px;
                border-radius:8px;
                display:block;
                font-weight:bold;
            }
        .sidebar{
            width:260px;
            height:100vh;
            background:#704721;
            color:#FAF3E0;
            position:fixed;
            left:0;
            top:0;
            padding:30px 20px;
        }

        .sidebar h2{
            margin-bottom:30px;
        }

        .sidebar ul li a{
            color:white;
            text-decoration:none;
            font-size:16px;
            display:block;
            padding:10px 15px;
            border-radius:8px;
            transition:0.3s;
        }

        .sidebar ul li a:hover{
            background:#1f2937;
            padding-left:20px;
        }

        .main-content{
            margin-left:260px;
            padding:0px;
            width:100%;
        }

        .card{
            background:#FAF3E0;
            padding:20px;
            border-radius:10px;
            margin-bottom:20px;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>Dechamps Admin</h2>

        <ul>
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active-link' : '' }}">
                    Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('admin.bookings') }}" class="{{ request()->routeIs('admin.bookings') ? 'active-link' : '' }}">
                    Bookings
                </a>
            </li>

            <li>
                <a href="{{ route('admin.destinations.index') }}" class="{{ request()->routeIs('admin.destinations.index') ? 'active-link' : '' }}">
                    Destinations
                </a>
            </li>

            <li>
                <a href="{{ route('admin.blogs.index') }}" class="{{ request()->routeIs('admin.blogs.index') ? 'active-link' : '' }}">
                    Blogs
                </a>
            </li>

            <li>
                <a href="{{ route('admin.contacts') }}" class="{{ request()->routeIs('admin.contacts') ? 'active-link' : '' }}">
                    Contacts
                </a>
            </li>
<!-- 
            <li>
                <a href="{{ route('admin.about.edit') }}" class="{{ request()->routeIs('admin.about.edit') ? 'active-link' : '' }}">
                    About Page
                </a>
            </li> -->

            <li>
                <a href="{{ route('admin.gallery') }}" class="{{ request()->routeIs('admin.gallery') ? 'active-link' : '' }}">
                    Gallery
                </a>
            </li>

             <li>
                <a href="#">
                    Testimonials
                </a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        @yield('content')
    </div>

</body>
</html>