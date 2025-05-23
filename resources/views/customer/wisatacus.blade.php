<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JemberWonder - Wisata Customer</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <style>
        :root {
            --primary-color: #4d879c;
            --secondary-color: #79b2b1;
            --text-light: #e2e2e2;
            --text-dark: #333;
            --transition-speed: 0.3s;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)) !important;
            color: var(--text-light);
        }

        header {
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            padding: 10px 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
            opacity: 0;
            animation: fadeInDown 1s forwards;
        }

        .logo img {
            height: 70px;
            transition: transform var(--transition-speed);
            margin: 0;
        }

        .logo img:hover {
            transform: scale(1.05);
        }

        .centered-nav {
            display: flex;
            justify-content: center;
            list-style: none;
            gap: 40px;
            margin: 0;
            padding: 20px 0;
        }

        .centered-nav a {
            text-decoration: none;
            color: var(--text-light);
            font-size: 18px;
            font-weight: 500;
            transition: all var(--transition-speed);
            position: relative;
            padding: 5px 0;
        }

        .centered-nav a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #fff;
            transition: width var(--transition-speed);
        }

        .centered-nav a:hover {
            color: #fff;
        }

        .centered-nav a:hover::after {
            width: 100%;
        }

        #logoutForm {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
        }

        .btn-danger {
            background: linear-gradient(45deg, #ff4b4b, #ff6b6b);
            border: none;
            padding: 10px 25px;
            border-radius: 25px;
            font-weight: 500;
            transition: all var(--transition-speed);
            box-shadow: 0 4px 15px rgba(255, 75, 75, 0.2);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 75, 75, 0.3);
        }

        .search-container {
            margin-top: 120px;
            margin-bottom: 40px;
        }

        .search-form {
            max-width: 500px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            padding: 8px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
        }

        .search-form input {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 25px;
            padding: 15px 25px;
            font-size: 16px;
            color: var(--text-dark);
            transition: all var(--transition-speed);
        }

        .search-form input:focus {
            box-shadow: 0 0 0 2px var(--primary-color);
            background: #fff;
        }

        .search-form button {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 25px;
            padding: 15px 30px;
            color: white;
            font-weight: 500;
            transition: all var(--transition-speed);
        }

        .search-form button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .wisata-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            padding: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .wisata-card {
            position: relative;
            height: 400px;
            border-radius: 20px;
            overflow: hidden;
            transition: all var(--transition-speed);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .wisata-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, 
                rgba(0, 0, 0, 0.1) 0%,
                rgba(0, 0, 0, 0.3) 50%,
                rgba(0, 0, 0, 0.7) 100%);
            z-index: 1;
        }

        .wisata-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .wisata-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 30px;
            color: white;
            z-index: 2;
        }

        .wisata-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .wisata-location {
            font-size: 16px;
            opacity: 0.9;
            margin-bottom: 20px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        .wisata-link {
            display: inline-block;
            padding: 12px 30px;
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid white;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 500;
            transition: all var(--transition-speed);
            backdrop-filter: blur(5px);
        }

        .wisata-link:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
            color: white;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert {
            max-width: 500px;
            margin: 20px auto;
            border-radius: 15px;
            padding: 15px 25px;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
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
            </div>
        </div>
    </header>

    <div class="search-container">
        <div class="search-form">
            <form action="{{ route('cariwisatacus') }}" method="GET" class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Cari destinasi wisata..."
                    aria-label="Cari Wisata" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn" type="submit" id="button-addon2">Cari</button>
                </div>
            </form>
        </div>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <div class="wisata-grid">
        @foreach ($wisatas as $wisata)
            <div class="wisata-card" style="background: url('{{ Storage::url($wisata->gambarwisata) }}') no-repeat center center / cover;">
                <div class="wisata-content">
                    <h2 class="wisata-title">{{ $wisata->nama_wisata }}</h2>
                    <p class="wisata-location">{{ $wisata->lokasi }}</p>
                    <a href="{{ route('detailWisataCustomer', $wisata->kd_wisata) }}" class="wisata-link">Kunjungi</a>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function confirmLogout() {
            if (confirm('Apakah Anda yakin untuk logout?')) {
                document.getElementById('logoutForm').submit();
            }
        }
    </script>
</body>

</html>
