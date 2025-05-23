<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JemberWonder - Dashboard Customer</title>
    <link rel="stylesheet" href="{{ asset('css/dc.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        #background {
            background-image: url("{{ asset('img/air_terjun.jpg') }}");
            background-size: cover;
            filter: blur(3px) brightness(80%);
            position: absolute;
            top: 0px;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            bottom: 0;
            transition: background-image 1s ease-in-out;
        }

        .content h1,
        .content p {
            transition: opacity 0.5s ease-in-out;
            opacity: 0;
        }

        .content h1.visible,
        .content p.visible {
            opacity: 1;
        }

        body {
            /* background-color: #f0f0f0; */
            font-family: sans-serif;
            overflow-x: hidden;
            overflow-y: hidden;
        }

        h2 {
            margin-left: 10px;
            margin-top: 20px;
            font-size: 20px;
            font-weight: bold;
            font-style: italic;
            background: linear-gradient(to right, #F5F5F7, #F5F5F7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            opacity: 0;
            animation: slideIn 1s forwards;
            position: relative;
        }

        @keyframes slideIn {
            0% {
                opacity: 0;
                left: -50px;
            }

            100% {
                opacity: 1;
                left: 0;
            }
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgb(227, 242, 255, 0);
            backdrop-filter: blur(2px);
        }

        .logo {
            display: flex;
            flex-direction: column;
            align-items: center;
            opacity: 0;
            animation: slideDown 1s forwards;
            position: relative;
        }

        @keyframes slideDown {
            0% {
                opacity: 0;
                top: -50px;
            }

            100% {
                opacity: 1;
                top: 0;
            }
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
        }

        .centered-nav a {
            text-decoration: none;
            color: #e2e2e2;
            font-size: 18px;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .centered-nav a:hover {
            color: rgb(26, 47, 230);
        }

        #logoutForm {
            display: flex;
            justify-content: flex-end;
            margin-right: 20px;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            padding: 20px;
            color: white;
        }

        .content {
            width: 40%;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
            padding: 20px;
            text-align: left;
        }

        .images {
            width: 60%;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            position: relative;
        }

        .images img {
            width: 400px;
            height: 350px;
            object-fit: cover;
            border-radius: 5%;
            transition: opacity 1s ease-in-out;
            opacity: 0;
        }

        .images img.visible {
            opacity: 1;
        }

        .image1 {
            position: absolute;
            z-index: 2;
        }

        .image2 {
            position: absolute;
            z-index: 1;
            transform: translate(40%, 0%) scale(0.9);
        }

        .image3 {
            position: absolute;
            z-index: 0;
            transform: translate(80%, 0%) scale(0.8);
        }
    </style>
</head>

<body>

    <header>
        <div class="logo">
            <img src="{{ asset('img/logo JW putih.png') }}" alt="Jember Wonder">
            <h2>Jember Wonder</h2>
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

    <div id="background"></div>

    <main>
        <div class="content">
            <h1>Main Content</h1>
            <p>INI DESKRIPSI</p>
        </div>
        <div class="images">
            <img src="{{ asset('img/air_terjun.jpg') }}" alt="palaceholder 1" class="image1">
            <img src="{{ asset('img/Teluk_love.jpeg') }}" alt="palaceholder 2" class="image2">
            <img src="{{ asset('img/watu_ulo.jpg') }}" alt="palaceholder 3" class="image3">
        </div>
    </main>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script>
        var images = [
            "{{ asset('img/air_terjun.jpg') }}",
            "{{ asset('img/Teluk_love.jpeg') }}",
            "{{ asset('img/watu_ulo.jpg') }}"
        ];
        var titles = ["AIR TERJUN TANCAK", "TELUK LOVE", "WATU ULO"];
        var descriptions = ["Air terjun yang berada", 
        "LOVE ITU CINTA PAKE BAHASA INGRIS", "WATU ARTINYA BATU"];
        var index = 0;

        function changeImage() {
            var h1Element = document.querySelector('.content h1');
            var pElement = document.querySelector('.content p');

            h1Element.classList.remove('visible');
            pElement.classList.remove('visible');

            var imageElements = document.querySelectorAll('.images img');
            for (var i = 0; i < imageElements.length; i++) {
                imageElements[i].classList.remove('visible');
            }

            setTimeout(function() {
                document.getElementById('background').style.backgroundImage = 'url(' + images[index] + ')';
                h1Element.innerText = titles[index];
                pElement.innerText = descriptions[index];
                h1Element.classList.add('visible');
                pElement.classList.add('visible');

                for (var i = 0; i < imageElements.length; i++) {
                    imageElements[i].src = images[(index + i) % images.length];
                    imageElements[i].classList.add('visible');
                }

                index = (index + 1) % images.length;
            }, 500);
        }

        changeImage();
        setInterval(changeImage, 7000); // Change every 10 seconds

        function confirmLogout() {
            if (confirm('Apakah Anda yakin untuk logout?')) {
                document.getElementById('logoutForm').submit();
            }
        }
    </script>
</body>

</html>
