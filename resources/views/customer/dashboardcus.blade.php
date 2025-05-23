<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JemberWonder - Dashboard Customer</title>
    <link rel="stylesheet" href="{{ asset('css/dc.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        :root {
            --primary-color: #1a2fe6;
            --text-light: #e2e2e2;
            --text-dark: #333;
            --transition-speed: 0.3s;
        }

        #background {
            background-image: url("{{ asset('img/air_terjun.jpg') }}");
            background-size: cover;
            filter: blur(5px) brightness(70%);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            transition: background-image 1.2s ease-in-out;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            overflow-x: hidden;
            min-height: 100vh;
            margin: 0;
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
        }

        .logo img:hover {
            transform: scale(1.05);
        }

        .logo h2 {
            font-size: 24px;
            font-weight: bold;
            background: linear-gradient(45deg, #fff, #e2e2e2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin: 0;
        }

        .centered-nav {
            display: flex;
            justify-content: center;
            list-style: none;
            gap: 40px;
            margin: 0;
            padding: 0;
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
            background: var(--primary-color);
            transition: width var(--transition-speed);
        }

        .centered-nav a:hover {
            color: #fff;
        }

        .centered-nav a:hover::after {
            width: 100%;
        }

        main {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 100px 50px;
            gap: 50px;
        }

        .content {
            flex: 1;
            max-width: 600px;
            opacity: 0;
            transform: translateX(-50px);
            animation: fadeInLeft 1s forwards;
            animation-delay: 0.5s;
        }

        .content h1 {
            font-size: 48px;
            margin-bottom: 20px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.8s ease;
        }

        .content p {
            font-size: 18px;
            line-height: 1.6;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.8s ease;
            transition-delay: 0.2s;
        }

        .content h1.visible,
        .content p.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .images {
            flex: 1;
            display: flex;
            justify-content: center;
            position: relative;
            height: 500px;
        }

        .images img {
            width: 400px;
            height: 350px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            transition: all 0.8s ease;
            opacity: 0;
            position: absolute;
        }

        .image1 {
            z-index: 3;
            transform: translateX(-50%) scale(0.9);
        }

        .image2 {
            z-index: 2;
            transform: translateX(0%) scale(0.8);
        }

        .image3 {
            z-index: 1;
            transform: translateX(50%) scale(0.7);
        }

        .images img.visible {
            opacity: 1;
            transform: translateX(0) scale(1);
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

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>

<body>
    <div id="background"></div>

    <header>
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <img src="{{ asset('img/logo JW putih.png') }}" alt="Jember Wonder">
                    <h2>Jember Wonder</h2>
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

    <main>
        <div class="content">
            <h1>Main Content</h1>
            <p>INI DESKRIPSI</p>
        </div>
        <div class="images">
            <img src="{{ asset('img/air_terjun.jpg') }}" alt="Air Terjun" class="image1">
            <img src="{{ asset('img/Teluk_love.jpeg') }}" alt="Teluk Love" class="image2">
            <img src="{{ asset('img/watu_ulo.jpg') }}" alt="Watu Ulo" class="image3">
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
        var descriptions = [
            "Air Terjun Tancak merupakan salah satu destinasi wisata alam yang memukau di Jember. Dengan ketinggian yang menakjubkan, air terjun ini menawarkan pemandangan yang spektakuler dan udara yang sejuk.", 
            "Teluk Love adalah destinasi romantis di Jember yang menawarkan pemandangan pantai berbentuk hati alami. Tempat ini menjadi spot favorit untuk menikmati sunset dan mengabadikan momen spesial.", 
            "Watu Ulo, yang berarti Batu Ular, adalah pantai eksotis dengan formasi batuan unik menyerupai sisik ular. Pantai ini menawarkan pemandangan laut yang menakjubkan dan ombak yang cocok untuk berselancar."
        ];
        var index = 0;

        function changeImage() {
            var h1Element = document.querySelector('.content h1');
            var pElement = document.querySelector('.content p');
            var background = document.getElementById('background');

            // Remove visible class
            h1Element.classList.remove('visible');
            pElement.classList.remove('visible');
            
            var imageElements = document.querySelectorAll('.images img');
            imageElements.forEach(img => img.classList.remove('visible'));

            setTimeout(function() {
                // Update background with fade effect
                background.style.backgroundImage = 'url(' + images[index] + ')';
                
                // Update content
                h1Element.innerText = titles[index];
                pElement.innerText = descriptions[index];
                
                // Add visible class back
                h1Element.classList.add('visible');
                pElement.classList.add('visible');

                // Update carousel images
                imageElements.forEach((img, i) => {
                    img.src = images[(index + i) % images.length];
                    img.classList.add('visible');
                });

                index = (index + 1) % images.length;
            }, 500);
        }

        // Initial load
        changeImage();
        
        // Change every 7 seconds
        setInterval(changeImage, 7000);

        function confirmLogout() {
            if (confirm('Apakah Anda yakin untuk logout?')) {
                document.getElementById('logoutForm').submit();
            }
        }
    </script>
</body>

</html>
