<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Masukan - Detail Masukan</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <style>
        body {
            background: radial-gradient(circle, #4d879c, #79b2b1) !important;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
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

        #logoutForm {
            position: absolute;
            top: 10px;
            right: 20px;
        }
        .container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            padding: 40px;
            margin: 60px auto;
        }
        h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        p {
            font-size: 1.2rem;
            color: #555;
        }
        p strong {
            color: #333;
        }
        .back-link {
            display: block;
            text-align: center;
            color: #fff;
            padding: 0.75rem 1.5rem;
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 0.25rem;
            text-decoration: none;
            transition: background-color 0.3s, border-color 0.3s;
            margin-top: 30px;
            width: 200px;
            margin-left: auto;
            margin-right: auto;
        }
        .back-link:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        .hero {
            background: url('{{ asset('img/hero-bg.jpg') }}') no-repeat center center/cover;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        .hero h1 {
            font-size: 3rem;
            margin: 0;
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

    <div class="container">
        <h1>Masukan Customer</h1>
        <div class="mb-3">
            <p><strong>Kode Masukan:</strong> {{ $masukan->kd_masukan }}</p>
        </div>
        <div class="mb-3">
            <p><strong>Nama:</strong> {{ $masukan->nama }}</p>
        </div>
        <div class="mb-3">
            <p><strong>Masukan:</strong> {{ $masukan->masukan }}</p>
        </div>
        <a href="{{ route('masukancustomer') }}" class="back-link">Kembali</a>
    </div>

    <script>
        function confirmLogout() {
            if (confirm('Are you sure you want to logout?')) {
                document.getElementById('logoutForm').submit();
            }
        }
    </script>
</body>
</html>
