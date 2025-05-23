<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JemberWonder - Daftar Customer</title>
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
            background: url('/img/Teluk_love.jpeg') no-repeat center center fixed;
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
            max-width: 900px;
            width: 100%;
            padding: 20px;
            display: flex;
        }
        .left {
            padding-right: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .right {
            display: flex;
            flex-direction: column;
            width: 100%;
        }
        .img-green {
            border-radius: 2px;
            width: 80vh;
            height: 65vh;
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
            width: 95%;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
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
            margin: 20px auto 0 auto; /* Center the button */
            display: block; /* Ensure it's a block element */
        }
        .btn-primary:hover {
            background: #007bff;
            color: white;
            border: 2px solid white;
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
        .password-container, .password-confirm-container {
            display: flex;
            align-items: center;
        }
        .password-container button, .password-confirm-container button {
            margin-left: 10px;
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
            <img class="img-green" src="/img/Teluk_love.jpeg" alt="Pesona Gunung Gambir">
        </div>
        <div class="right">
            <div class="tabs">
                <a class="active">Customer</a>
            </div>
            <form action="/tambah-customer" method="POST">
                @csrf
                @if ($errors->any())
                    <script>
                        window.onload = function() {
                            alert("{{ $errors->first() }}");
                        };
                    </script>
                @endif
                <div class="form-group">
                    <input type="text" name="username_cus" placeholder="Username" class="form-control">
                </div>
                <div class="form-group password-container">
                    <input type="password" name="pw_cus" placeholder="Password" class="form-control password-input">
                    <button type="button" class="toggle-password btn btn-outline-primary">Show</button>
                </div>
                <div class="form-group password-confirm-container">
                    <input type="password" name="password_confirm" class="form-control password-input" placeholder="Konfirmasi Password">
                    <button type="button" class="toggle-password btn btn-outline-primary">Show</button>
                </div>
                <div class="form-group">
                    <input type="text" name="fullname_cus" placeholder="Nama Lengkap" class="form-control">
                </div>
                <div class="form-group">
                    <select name="pertanyaan" class="form-control">
                        <option disabled selected>Pilih Pertanyaan</option>
                        <option value="Apa makanan favoritmu?">Apa makanan favoritmu?</option>
                        <option value="Apa minuman favoritmu?">Apa minuman favoritmu?</option>
                        <option value="Siapa nama hewan peliharaanmu?">Siapa nama hewan peliharaanmu?</option>
                        <option value="Apa warna favoritmu?">Apa warna favoritmu?</option>
                        <option value="Dimana kota lahirmu?">Dimana kota lahirmu?</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="jawaban" placeholder="Jawaban" class="form-control">
                </div>
                <button type="submit" class="btn-primary">Daftar</button>
                <a href="{{ ('logincustomer') }}" class="kembali">Kembali ke login</a>
            </form>
        </div>
    </div>
    <script>
        document.querySelectorAll('.toggle-password').forEach(btn => {
            btn.addEventListener('click', () => {
                const passwordInput = btn.previousElementSibling;
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    btn.textContent = 'Hide';
                } else {
                    passwordInput.type = 'password';
                    btn.textContent = 'Show';
                }
            });
        });
    </script>
</body>
</html>
