<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JemberWonder - Explore Jember's Beauty</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script>
        function handleImageError(img) {
            console.error('Failed to load image:', img.src);
            img.style.backgroundColor = '#ddd';
            img.alt = 'Image failed to load';
        }
    </script>
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1d4ed8;
            --text-light: #f8fafc;
            --text-dark: #1e293b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            background-color: #000;
            color: var(--text-light);
        }

        #background {
            background-image: url("{{ asset('img/air_terjun.jpg') }}");
            background-size: cover;
            background-position: center;
            filter: brightness(40%) contrast(120%);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            transition: all 1s ease-in-out;
        }

        header {
            padding: 1rem 2rem;
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(8px);
            position: fixed;
            width: 100%;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        header.scrolled {
            background: rgba(0, 0, 0, 0.8);
            padding: 0.5rem 2rem;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo img {
            height: 60px;
            transition: all 0.3s ease;
        }

        header.scrolled .logo img {
            height: 50px;
        }

        .logo h2 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-light);
            margin: 0;
            background: linear-gradient(45deg, #fff, #e2e8f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .centered-nav {
            gap: 2rem;
        }

        .centered-nav a {
            color: var(--text-light);
            font-weight: 500;
            text-decoration: none;
            position: relative;
            padding: 0.5rem 0;
            transition: all 0.3s ease;
        }

        .centered-nav a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            transition: width 0.3s ease;
        }

        .centered-nav a:hover::after {
            width: 100%;
        }

        main {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 6rem 2rem 2rem;
        }

        .content {
            max-width: 600px;
            padding: 2rem;
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(8px);
            border-radius: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, #fff, #94a3b8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .content p {
            font-size: 1.1rem;
            line-height: 1.7;
            margin-bottom: 2rem;
            color: #e2e8f0;
        }

        .images {
            position: relative;
            height: 500px;
            width: 800px;
            perspective: 1000px;
        }

        .images img {
            position: absolute;
            width: 400px;
            height: 300px;
            object-fit: cover;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            transition: all 1s ease-in-out;
        }

        .image1 {
            transform: translateZ(0) translateX(0) scale(1);
            z-index: 3;
        }

        .image2 {
            transform: translateZ(-100px) translateX(200px) scale(0.9);
            z-index: 2;
            filter: brightness(80%);
        }

        .image3 {
            transform: translateZ(-200px) translateX(400px) scale(0.8);
            z-index: 1;
            filter: brightness(60%);
        }

        .btn-explore {
            display: inline-block;
            padding: 1rem 2rem;
            background: var(--primary-color);
            color: white;
            text-decoration: none;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-explore:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.3);
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }
    </style>
</head>

<body>
    @if(config('app.debug'))
        <div style="position: fixed; bottom: 10px; right: 10px; background: rgba(0,0,0,0.8); color: white; padding: 10px; z-index: 9999; font-size: 12px;">
            Asset Path: {{ asset('img/air_terjun.jpg') }}<br>
            Public Path: {{ public_path('img/air_terjun.jpg') }}
        </div>
    @endif

    <div id="background"></div>

    <header>
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo animate__animated animate__fadeInLeft">
                    <img src="{{ asset('img/logo JW putih.png') }}" alt="Jember Wonder" onerror="handleImageError(this)">
                    <h2>Jember Wonder</h2>
                </div>
                <nav>
                    <ul class="centered-nav list-unstyled d-flex animate__animated animate__fadeInRight">
                        <li><a href="/registercustomer">Daftar</a></li>
                        <li><a href="/logincustomer">Masuk</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="content animate__animated animate__fadeInUp">
                        <h1>Discover Jember's Hidden Gems</h1>
                        <p>Jelajahi keindahan alam dan budaya Kabupaten Jember yang menakjubkan. Dari air terjun yang memesona hingga pantai yang eksotis, temukan pengalaman wisata tak terlupakan bersama JemberWonder.</p>
                        <a href="/explore" class="btn-explore">Mulai Petualangan</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="images floating">
                        <img src="{{ asset('img/watu_ulo.jpg') }}" alt="Pantai Watu Ulo" class="image1" onerror="handleImageError(this)">
                        <img src="{{ asset('img/Teluk_love.jpeg') }}" alt="Teluk Love" class="image2" onerror="handleImageError(this)">
                        <img src="{{ asset('img/watu_ulo.jpg') }}" alt="Pantai Watu Ulo" class="image3" onerror="handleImageError(this)">
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script>
        // Enhanced image rotation with smooth transitions
        const images = [
            "{{ asset('img/watu_ulo.jpg') }}",
            "{{ asset('img/Teluk_love.jpeg') }}",
            "{{ asset('img/watu_ulo.jpg') }}"
        ];

        // Add console logging for debugging
        console.log('Image paths:', images);

        const titles = [
            "Discover Jember's Hidden Gems",
            "Experience Natural Beauty",
            "Adventure Awaits in Jember"
        ];
        const descriptions = [
            "Jelajahi keindahan alam dan budaya Kabupaten Jember yang menakjubkan. Dari air terjun yang memesona hingga pantai yang eksotis, temukan pengalaman wisata tak terlupakan bersama JemberWonder.",
            "Nikmati pemandangan alam yang memukau di setiap sudut Jember. Dari perbukitan hijau hingga pantai yang menawan, setiap destinasi menawarkan pengalaman yang unik.",
            "Bersiaplah untuk petualangan tak terlupakan di Jember. Dengan beragam destinasi wisata yang menakjubkan, setiap momen akan menjadi kenangan indah yang tak terlupakan."
        ];
        let currentIndex = 0;

        function updateContent() {
            const background = document.getElementById('background');
            const title = document.querySelector('.content h1');
            const description = document.querySelector('.content p');
            const imageElements = document.querySelectorAll('.images img');

            // Fade out
            background.style.opacity = '0';
            title.style.opacity = '0';
            description.style.opacity = '0';
            imageElements.forEach(img => img.style.opacity = '0');

            setTimeout(() => {
                // Update content
                background.style.backgroundImage = `url(${images[currentIndex]})`;
                title.textContent = titles[currentIndex];
                description.textContent = descriptions[currentIndex];
                
                // Update carousel images
                imageElements.forEach((img, i) => {
                    img.src = images[(currentIndex + i) % images.length];
                });

                // Fade in
                background.style.opacity = '1';
                title.style.opacity = '1';
                description.style.opacity = '1';
                imageElements.forEach(img => img.style.opacity = '1');

                currentIndex = (currentIndex + 1) % images.length;
            }, 500);
        }

        // Header scroll effect
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Start the content rotation
        updateContent();
        setInterval(updateContent, 7000);
    </script>
</body>

</html>
