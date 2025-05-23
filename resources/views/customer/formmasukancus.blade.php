<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JemberWonder - Form Masukan Customer</title>
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
                    <h2 class="text-center header-text">Tambah Masukan</h2>
                    <form action="{{ route('tambahmasukan') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama"><i class="fas fa-user"></i> Nama :</label>
                            <input type="text" class="form-control" id="nama" name="nama" required placeholder="Nama anda">
                        </div>
                        <div class="form-group">
                            <label for="masukan"><i class="fas fa-comment"></i> Masukan :</label>
                            <textarea class="form-control" id="masukan" name="masukan" rows="4" required placeholder="Masukan anda"></textarea>
                        </div>
                        <button type="submit" class="btn btn-custom btn-block">Tambah</button>
                        <a href="{{ route('masukancustomer') }}" class="btn btn-light btn-block back-link">Kembali</a>
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
