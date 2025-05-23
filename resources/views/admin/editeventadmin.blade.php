<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jember Wonder - Edit Event</title>
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
            border-color: #004080;
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
                    <h2 class="text-center header-text">Edit Event</h2>
                    <form action="{{ route('updateEventAdmin', $event->kd_event) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <script>
                                window.onload = function() {
                                    alert("{{ $errors->first() }}");
                                };
                            </script>
                        @endif
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="judul"><i class="fas fa-heading"></i> Judul :</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ $event->judul }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal"><i class="fas fa-calendar-alt"></i> Tanggal :</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $event->tanggal }}" required>
                        </div>
                        <div class="form-group">
                            <label for="pukul"><i class="fas fa-clock"></i> Pukul :</label>
                            <input type="time" class="form-control" id="pukul" name="pukul" value="{{ $event->pukul }}" required>
                        </div>
                        <div class="form-group">
                            <label for="isi"><i class="fas fa-info-circle"></i> Isi Event :</label>
                            <textarea class="form-control" id="isi" name="isi" rows="4" required>{{ $event->isi }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="tempat"><i class="fas fa-map-marker-alt"></i> Tempat :</label>
                            <input type="text" class="form-control" id="tempat" name="tempat" value="{{ $event->tempat }}" required>
                        </div>
                        <div class="form-group">
                            <label for="kd_wisata"><i class="fas fa-umbrella-beach"></i> Wisata :</label>
                            <select class="custom-select" id="kd_wisata" name="kd_wisata" required>
                                @foreach($wisatas as $wisata)
                                    <option value="{{ $wisata->kd_wisata }}" {{ $event->kd_wisata == $wisata->kd_wisata ? 'selected' : '' }}>{{ $wisata->nama_wisata }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gambarevent"><i class="fas fa-camera"></i> Foto Event :</label>
                            <input type="file" class="form-control-file" id="gambarevent" name="gambarevent">
                        </div>
                        <button type="submit" class="btn btn-custom btn-block">Perbarui</button>
                        <a href="{{ route('detailEventAdmin', $event->kd_event) }}" class="btn btn-light btn-block back-link">Batal</a>
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
