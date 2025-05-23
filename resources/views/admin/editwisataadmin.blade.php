<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JemberWonder - Edit Wisata</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to right, #4d879c, #79b2b1);
            padding-top: 50px;
            padding-bottom: 50px;
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
            background-color: #0056b3;
            border-color: #004085;
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
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container">
                    <h2 class="text-center header-text">Edit Wisata</h2>
                    <form action="{{ route('updateWisataAdmin', $wisata->kd_wisata) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <script>
                                window.onload = function() {
                                    alert("{{ $errors->first() }}");
                                };
                            </script>
                        @endif
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_wisata"><i class="fas fa-map-marker-alt"></i> Nama Wisata :</label>
                            <input type="text" class="form-control" id="nama_wisata" name="nama_wisata" value="{{ $wisata->nama_wisata }}" required>
                        </div>
                        <div class="form-group">
                            <label for="kategori"><i class="fas fa-list-alt"></i> Kategori :</label>
                            <select class="custom-select" id="kategori" name="kategori" required>
                                <option value="Pantai" {{ $wisata->kategori == 'Pantai' ? 'selected' : '' }}>Pantai</option>
                                <option value="Laut/Terumbu Karang" {{ $wisata->kategori == 'Laut/Terumbu Karang' ? 'selected' : '' }}>Laut/Terumbu Karang</option>
                                <option value="Gunung" {{ $wisata->kategori == 'Gunung' ? 'selected' : '' }}>Gunung</option>
                                <option value="Bukit" {{ $wisata->kategori == 'Bukit' ? 'selected' : '' }}>Bukit</option>
                                <option value="Hutan" {{ $wisata->kategori == 'Hutan' ? 'selected' : '' }}>Hutan</option>
                                <option value="Goa" {{ $wisata->kategori == 'Goa' ? 'selected' : '' }}>Goa</option>
                                <option value="Danau" {{ $wisata->kategori == 'Danau' ? 'selected' : '' }}>Danau</option>
                                <option value="Sungai" {{ $wisata->kategori == 'Sungai' ? 'selected' : '' }}>Sungai</option>
                                <option value="Pedesaan" {{ $wisata->kategori == 'Pedesaan' ? 'selected' : '' }}>Pedesaan</option>
                                <option value="Bangunan" {{ $wisata->kategori == 'Bangunan' ? 'selected' : '' }}>Bangunan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan"><i class="fas fa-info-circle"></i> Keterangan :</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="4" required>{{ $wisata->keterangan }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="lokasi"><i class="fas fa-map"></i> Lokasi :</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $wisata->lokasi }}" required>
                        </div>
                        <div class="form-group">
                            <label for="gambarwisata"><i class="fas fa-camera"></i> Foto Wisata :</label>
                            <input type="file" class="form-control-file" id="gambarwisata" name="gambarwisata">
                        </div>
                        <button type="submit" class="btn btn-custom btn-block">Perbarui</button>
                        <a href="{{ route('detailWisataAdmin', $wisata->kd_wisata) }}" class="btn btn-light btn-block back-link">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
