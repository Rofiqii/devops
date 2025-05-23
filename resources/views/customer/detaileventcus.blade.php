<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Wisata - Customer</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script href="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <style>
         body {
            background-color: #F5F5F7;
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

        .centered-nav a {
            text-decoration: none;
            color: #004573;
            font-size: 18px;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .centered-nav a:hover {
            color: #008084
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            padding: 20px;
            color: #004573;
        }

        .images {
            width: 60%;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            position: relative;
        }

        #logoutForm {
            display: flex;
            justify-content: flex-end;
            margin-right: 20px;
            margin-top: -40px;
        }

        .center {
            text-align: center;
        }

        .btn-primary {
            color: #fff;
            padding: 0.375rem 0.75rem;
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 0.25rem;
            text-decoration: none;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .kembali {
            text-decoration: none;
            color: #000000;
            margin: 10px;
            text-align: center;

        }
        .kembali:hover {
        color: #999999;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="{{ asset('img/jwlogo.png') }}" alt="Jember Wonder">
        </div>

        <nav>
            <ul class="centered-nav">
                <li><a href="{{ route('dashboardcustomer') }}">Dashboard</a></li>
                <li><a href="{{ route('wisatacustomer') }}">Wisata</a></li>
                <li><a href="{{ route('eventcustomer') }}">Event</a></li>
                <li><a href="{{ route('masukancustomer') }}">Masukan</a></li>
            </ul>
        </nav>
        <form id="logoutForm" action="{{ route('logoutcus') }}" method="POST">
            @csrf
            <button type="button" class="btn btn-danger" onclick="confirmLogout()">Logout</button>
        </form>
    </header>
    <br>
    <div class="hero-image"
    style="background-image: url('{{ $event->gambarevent ? Storage::url($event->gambarevent) : 'default-image-url' }}'); height: 500px; background-position: center; background-repeat: no-repeat; background-size: cover; position: relative;">
    <div
            style="position: absolute; bottom: 0; left: 0; background: rgba(0, 0, 0, 0); color: #fff; padding: 20px;">
            <h5>📆{{ $event->tanggal }}</h5>
            <h5>🕘{{ $event->pukul}}</h5>
            <h1>{{ $event->judul }}</h1>
            <h2>{{$event->wisata->nama_wisata}}</h2>
            <h3>📍{{ $event->tempat }}</h3>
    </div>
    </div>
    <div class="container mt-4">
        <h3>🌍Deskripsi</h2>
        <p>{{ $event->isi }}</p><hr>
    </div>
    <br>
    <br>
</body>
</html>
