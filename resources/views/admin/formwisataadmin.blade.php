<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JemberWonder - Form Wisata Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to right, #4d879c, #79b2b1);
            padding-top: 10px;
            color: #fff;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            color: #333;
        }
        .btn-custom {
            background-color: #007bff;
            border-color: #6a11cb;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #007bff;
            border-color: ;
        }
        .form-control, .form-control-file {
            border-radius: 10px;
        }
        .custom-select {
            border-radius: 10px;
        }
        .header-text {
            font-family: 'Roboto', sans-serif;
            font-weight: bold;
        }
        .back-link {
            color: #007bff;
            font-weight: bold;
            border-color: #333;
        }
        .back-link:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container">
                    <h2 class="text-center header-text">Tambah Wisata</h2>
                    <form action="{{ route('tambahwisata') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <script>
                                window.onload = function() {
                                    alert("{{ $errors->first() }}");
                                };
                            </script>
                        @endif
                        <div class="form-group">
                            <label for="nama_wisata"><i class="fas fa-map-marker-alt"></i> Nama Wisata :</label>
                            <input type="text" class="form-control" id="nama_wisata" name="nama_wisata" placeholder="Masukkan nama wisata">
                        </div>
                        <div class="form-group">
                            <label for="kategori"><i class="fas fa-list-alt"></i> Kategori :</label>
                            <select class="custom-select" id="kategori" name="kategori">
                                <option value="Pantai">Pantai</option>
                                <option value="Laut/Terumbu Karang">Laut/Terumbu Karang</option>
                                <option value="Gunung">Gunung</option>
                                <option value="Bukit">Bukit</option>
                                <option value="Hutan">Hutan</option>
                                <option value="Goa">Goa</option>
                                <option value="Danau">Danau</option>
                                <option value="Sungai">Sungai</option>
                                <option value="Pedesaan">Pedesaan</option>
                                <option value="Bangunan">Bangunan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan"><i class="fas fa-info-circle"></i> Keterangan :</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="4" placeholder="Deskripsikan wisata"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="lokasi"><i class="fas fa-map"></i> Lokasi :</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Masukkan lokasi wisata">
                        </div>
                        <div class="form-group">
                            <label for="gambarwisata"><i class="fas fa-camera"></i> Foto Wisata :</label>
                            <input type="file" class="form-control-file" id="gambarwisata" name="gambarwisata">
                        </div>
                        <button type="submit" class="btn btn-custom btn-block">Tambahkan Wisata</button>
                    </form>
                    <br>
                    <a href="{{ route('wisataadmin') }}" class="btn btn-light btn-block back-link">Kembali ke Daftar Wisata</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
