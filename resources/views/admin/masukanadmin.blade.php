<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masukan Admin - Admin</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>
<style>
    body {
        background: radial-gradient(circle, #4d879c, #79b2b1) !important;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
    }
    body {
        background: radial-gradient(circle, #4d879c, #79b2b1) !important;
    }

    .logo img {
        height: 95px;
        margin-left: 10px;
        margin-top: 10px;
    }

    .centered-nav {
        display: flex;
        justify-content: center;
        list-style-type: none;
        gap: 35px;
        margin-right: 140px;
        margin-bottom: 0px;
        margin-top: -40px;
    }
    #logoutForm {
        display: flex;
        justify-content: flex-end;
        margin-right: 20px;
        margin-top: -40px;
    }

    .centered-nav a {
        text-decoration: none;
        color: #e2e2e2;
        font-size: 18px;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    .centered-nav a:hover {
        color:white;
    }

    .btn-primary {
        color: #fff;
        padding: 0.375rem 0.75rem;
        background-color: #007bff;
        border-color: #007bff;
        border-radius: 0.25rem;
        text-decoration: none;
        margin-left: 20px;
        transition: background-color 0.3s ease, border-color 0.3s ease;
        margin-left: -10px
    }
    .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
    }
    .btn-danger {
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }
    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
    .center {
        text-align: center;
        margin-top: 20px;
    }
    .comment-box {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 10px;
        margin: 10px 20px;
        transition: box-shadow 0.3s ease, transform 0.3s ease;
        display: inline-block;
        width: calc(100% - 40px);
        max-width: 500px;
    }
    .comment-box:hover {
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        transform: translateY(-5px);
    }
    .comment-box a {
        text-decoration: none;
        color: #007bff;
        transition: color 0.3s ease;
    }
    .comment-box a:hover {
        color: #0056b3;
    }
</style>

<body>
    <header>
        <div class="logo">
            <img src="{{ asset('img/jwlogo.png') }}" alt="Jember Wonder">
        </div>
        <nav>
            <ul class="centered-nav">
                <li><a href="{{ route('dashboardadmin') }}">Dashboard</a></li>
                <li><a href="{{ route('wisataadmin') }}">Wisata</a></li>
                <li><a href="{{ route('eventadmin') }}">Event</a></li>
                <li><a href="{{ route('masukanadmin') }}">Masukan</a></li>
                <li><a href="{{ route('registeradmin') }}">Tambahkan Admin</a></li>
            </ul>
        </nav>
        <form id="logoutForm" action="{{ route('logoutcus') }}" method="POST">
            @csrf
            <button type="button" class="btn btn-danger" onclick="confirmLogout()">Logout</button>
        </form>
    </header>
    <br>
    <br>
    <div class="center">
        <ul style="padding: 0; list-style-type: none;">
            @foreach($masukans as $masukan)
                <li>
                    <div class="comment-box">
                        <a href="{{ route('detailmasukanadmin', $masukan->kd_masukan) }}"><strong>Masukan {{ $masukan->kd_masukan }}</strong></a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <br>
    <script>
        function confirmLogout() {
            if (confirm('Apakah Anda yakin untuk keluar?')) {
                document.getElementById('logoutForm').submit();
            }
        }
    </script>
</body>
</html>
