<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JemberWonder - Event Admin</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .navbar {
            background-color: #4d879c;
            margin-bottom: 30px;
        }

        .navbar-brand img {
            height: 40px;
        }

        .navbar-nav .nav-link {
            color: white !important;
            margin: 0 15px;
        }

        .navbar-nav .nav-link:hover {
            color: #e2e2e2 !important;
        }

        .card {
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .table th {
            background-color: #4d879c;
            color: white;
        }

        .search-box {
            max-width: 300px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/jwlogo.png') }}" alt="Jember Wonder">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboardadmin') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('wisataadmin') }}">Wisata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('eventadmin') }}">Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('masukanadmin') }}">Masukan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('registeradmin') }}">Daftarkan Admin</a>
                    </li>
                </ul>
                <form id="logoutForm" action="{{ route('logoutcus') }}" method="POST" class="d-flex">
                    @csrf
                    <button type="button" class="btn btn-light" onclick="confirmLogout()">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <h2>Daftar Event</h2>
            </div>
            <div class="col-auto">
                <a href="{{ route('formeventadmin') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Event
                </a>
            </div>
        </div>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('carieventadmin') }}" method="GET" class="search-box mb-4">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control" placeholder="Cari Event">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Judul Event</th>
                                <th>Tempat</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                            <tr>
                                <td>{{ $event->judul }}</td>
                                <td>{{ $event->tempat }}</td>
                                <td>{{ $event->tanggal }}</td>
                                <td>
                                    <a href="{{ route('detailEventAdmin', $event->kd_event) }}" 
                                       class="btn btn-sm btn-info">Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
