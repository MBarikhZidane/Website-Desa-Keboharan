@props(['setting' => null])
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" />
    <title>Desa Keboharan</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        .navbar {
            transition: background-color 0.4s ease, box-shadow 0.4s ease;
        }

        .navbar.scrolled {
            background-color: var(--main-color) ;
            /* Merah */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        /* Rasio tetap untuk carousel */
        .carousel-container {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 9;
            /* menjaga rasio tetap */
            overflow: hidden;
        }

        @media (max-width: 768px) {

            /* Rasio tetap untuk layar kecil */
            .carousel-container {
                aspect-ratio: 3 / 4;
            }
        }
        
    </style>
</head>

{{-- tambahkan class theme agar warna dinamis --}}

<body class="theme-{{ $setting?->color_theme ?? 'green' }}">

    {{-- Navbar dinamis --}}
    @if ($setting?->nav_type == 'type2')
        <x-landingpage.nav-type2 />
    @else
        <x-landingpage.nav />
    @endif

    {{-- Konten halaman --}}
    {{ $slot }}

    {{-- Footer --}}
    <x-landingpage.footer />

    <script>
        const menuBtn = document.getElementById("menu-btn");
        const mobileMenu = document.getElementById("mobile-menu");
        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener("click", () => {
                mobileMenu.classList.toggle("hidden");
            });
        }
            const carouselImages = document.getElementById("carousel-images");
    const slides = carouselImages.children;
    const totalSlides = slides.length;

    let index = 0;

    function showSlide(i) {
        carouselImages.style.transform = `translateX(-${i * 100}%)`;
    }

    // Auto slide (optional)
    let autoSlide = setInterval(() => {
        index = (index + 1) % totalSlides;
        showSlide(index);
    }, 3000);

    const nextBtn = document.getElementById("carousel-next");
    const prevBtn = document.getElementById("carousel-prev");

    nextBtn.addEventListener("click", () => {
        clearInterval(autoSlide);
        index = (index + 1) % totalSlides;
        showSlide(index);
    });

    prevBtn.addEventListener("click", () => {
        clearInterval(autoSlide);
        index = (index - 1 + totalSlides) % totalSlides;
        showSlide(index);
    });
    </script>
</body>

</html>
