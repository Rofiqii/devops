<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JemberWonder - Cari Event Admin</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script href="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <style>
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
            color:white
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            padding: 20px;
            color: white;
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
    </style>
</head>
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
                <li><a href="{{ route('registeradmin') }}">Daftarkan Admin</a></li>
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
        <div class="d-flex justify-content-center">
            <form action="{{ route('carieventadmin') }}" method="GET" class="input-group"
                style="max-width: 400px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); border-radius: 25px;">
                <input type="text" name="keyword" class="form-control rounded-left" placeholder="Cari Event"
                    aria-label="Cari Event" aria-describedby="button-addon2" style="border-right: none;">
                <div class="input-group-append">
                    <button class="btn btn-dark rounded-right" type="submit" id="button-addon2">Cari</button>
                </div>
            </form>
        </div>
    
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div style="display: flex; justify-content: center;">
            <main style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 75px;">
                @foreach ($events as $event)
                    <div
                        style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), transparent), url('{{ Storage::url($event->gambarevent) }}') no-repeat center center / cover; display: flex; flex-direction: column; justify-content: center; align-items: center; height: 385px; width: 330px; padding: 20px; box-sizing: border-box; border-radius: 15px; text-align: center; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);">
                        <div
                            style="display: flex; flex-direction: column; align-items: flex-start; justify-content: center; height: 100%; text-align: left; margin-top: 15px;">
                            <h2 style="font-size: 24px; font-weight: bold;">{{ $event->judul }}</h2>
                            <p>{{ $event->tempat }}</p>
                        </div>
                        <a href="{{ route('detailEventAdmin', $event->kd_event) }}"
                            style="align-self: flex-start; margin-top: auto; padding: 10px 20px; background-color: rgba(255, 255, 255, 0.5); border: 2px solid white; color: white; text-decoration: none; font-weight: bold; border-radius: 25px; display: inline-block; text-align: center;">Kunjungi</a>
                    </div>
                @endforeach
            </main>
        </div>
    </div>
    <script>
        function confirmLogout() {
            if (confirm('Apakah Anda yakin untuk keluar?')) {
                document.getElementById('logoutForm').submit();
            }
        }
    </script>

</body>
</html>
