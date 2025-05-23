<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JemberWonder - Masuk Admin</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            background: #f0f0f0;
            text-decoration: none;
        }
        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('/img/watu_ulo.jpg') no-repeat center center fixed;
            background-size: cover;
            filter: blur(10px);
            z-index: -1;
        }
        .logo {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 2;
        }
        .logo img {
            height: 50px;
            width: auto;
        }
        .container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 920px;
            height: 350px;
            width: 100%;
            padding: 20px;
            text-align: center;
            z-index: 1;
            display: flex;
        }
        .left {
            padding-right: 20px;
        }
        .right {
            display: flex;
            flex-direction: column;
        }
        .img-green {
            display: block;
            border-radius: 2px;
            width: 70vh;
            height: ;
        }
        .tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .tabs a {
            text-decoration: none;
            color: black;
            padding: 10px 20px;
            border: 1px solid #ccc;
            border-bottom: none;
            background: #f9f9f9;
            margin: 0 5px;
        }
        .tabs a.active {
            background: #007bff;
            color: white;
            border-bottom: 1px solid white;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn-primary {
            background: white;
            color: black;
            padding: 10px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            width: 30%;
            border: 2px solid black;
            text-align: center;
        }
        .btn-primary:hover {
            background: #007bff;
            color: white;
            border: 2px solid white;
        }
        .lupa {
            white-space: nowrap;
            color: #000000;
            text-decoration: none;
            display: block;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 180px;
            font-size: 14px;
        }
        .lupa:hover {
        color: #007bff;
        }
        .daftar {
            color: #000000;
            text-decoration: none;
            display: flex;
            font-size: 14px;
            justify-content: center;
            align-items: center;
        }
        .segeraDaftar {
            text-decoration: none;
            color: #000000;
            padding-left: 2px;
            font-weight: bold;
        }
        .kembali {
            text-decoration: none;
            color: #000000;
            margin: 10px;
        }
        .kembali:hover {
        color: #999999;
        }
    </style>
</head>
<body>
    <div class="background"></div>
    <div class="logo">
        <img src="/img/jwlogo.png" alt="Logo">
    </div>
    <div class="container">
        <div class="left">
            <img class="img-green" src="/img/watu_ulo.jpg" alt="Pesona Gunung Gambir">
        </div>
        <div class="right">
            <div class="tabs">
                <a href="{{ route('indexcus') }}">Customer</a>
                <a href="{{ route('indexadmin') }}" class="active">Admin</a>
            </div>
            <form method="POST" action="{{ route('loginAdmin') }}">
                @csrf
                @if ($errors->any())
                    <script>
                        window.onload = function() {
                            alert("{{ $errors->first() }}");
                        };
                    </script>
                @endif
                <input type="text" name="username_admin" placeholder="Username" value="{{ old('username_admin') }}" class="form-control">
                <input type="password" name="pw_admin" placeholder="Password" class="form-control password-input">
                <button type="button" class="toggle-password btn btn-outline-primary">Show</button>
                <a href="{{ route('luppassadmin') }}" class="lupa">Lupa Password?</a>
                <p class="daftar">Tidak memiliki akun admin?
                <span class="segeraDaftar">Segera konfirmasi kepada admin lain.</span></p>
                <button type="submit" class="btn-primary">Masuk</button>
                <a href="{{ route('index') }}" class="kembali">Kembali</a>
            </form>
        </div>
    </div>
    <script>
        document.querySelector('.toggle-password').addEventListener('click', function() {
            const passwordInput = document.querySelector('.password-input');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                this.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                this.textContent = 'Show';
            }
        });
    </script>
</body>
</html>
