<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uganda Tours</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body style="background-image: linear-gradient(rgba(146, 145, 145, 0.4),rgba(139, 138, 138, 0.4)),url('{{ asset('assets/images/bg.jpg') }}');">

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')


<script>
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.getElementById('navMenu');

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        navMenu.classList.toggle('active');
    });
</script>
</body>
</html>