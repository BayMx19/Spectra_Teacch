<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500;600;700&display=swap" rel="stylesheet">

    <title>Spectra Teacch</title>
    <link rel="icon" type="image/x-icon" href="/assets/admin/img/favicon/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="/assets/landing/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/landing/css/font-awesome.css">
    <link rel="stylesheet" href="/assets/landing/css/templatemo-softy-pinko.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <style>
    .lesson-nav {
        overflow-x: auto;
        white-space: nowrap;
        margin-bottom: 20px;
        text-align: center;
    }

    .lesson-nav a {
        display: inline-block;
        padding: 10px 20px;
        background-color: #f1f1f1;
        color: #333;
        text-decoration: none;
        border-radius: 5px;
        margin: 5px;
    }

    .lesson-nav a.active {
        background-color: #0d6efd;
        color: white;
    }
    </style>
</head>

<body>
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="/" class="text-logo">Spectra Teacch</a>
                        <ul class="nav">
                            <li><a href="#welcome" class="active">Home</a></li>
                            <li><a href="#features">Modules</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="welcome-area" id="welcome">
        <div class="header-text">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 text-white text-center text-lg-start">
                        <h1>Belajar memahami dan mendampingi <strong>anak autis</strong> dengan lebih baik</h1>
                        <p>Spectra Teacch adalah platform edukasi untuk orang tua yang ingin membekali diri dengan
                            pengetahuan dan keterampilan dalam mendampingi anak dengan spektrum autisme.</p>
                        <a href="#lessons" class="main-button-header">Mulai Belajar</a>
                    </div>
                    <div class="col-lg-6 col-md-12 text-center mt-4 mt-lg-0">
                        <img src="/assets/landing/images/header.png" alt="Ilustrasi Anak Belajar" class="img-fluid"
                            style="max-height: 400px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section" id="lessons">
        <div class="container">
            <div class="lesson-nav">
                <h1 style="color: #0d6efd !important; font-weight:bold">{{$modules->title}}</h1>
                <h3 class="mb-3">{{$modules->description}}</h3>
                @foreach ($modules->lessons->sortBy('order') as $lessons)
                <a href="#" data-id="{{ $lessons->id }}"
                    class="lesson-link {{ request('lessons', $modules->lessons->first()->id) == $lessons->id ? 'active' : '' }}">
                    {{ $lessons->title }}
                </a>
                @endforeach
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h2 id="lesson-title">{{ $modules->lessons->first()->title }}</h2>
                    <p id="lesson-description">{{ $modules->lessons->first()->description }}</p>
                    @if ($modules->lessons->first()->pdf_path)
                    <iframe id="lesson-pdf" src="/storage/{{ $modules->lessons->first()->pdf_path }}#toolbar=0"
                        width="100%" height="600px" frameborder="0"></iframe>
                    @else
                    <p><i>Tidak ada file tersedia.</i></p>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright">Copyright ©
                        <script>
                        document.write(new Date().getFullYear());
                        </script>
                        , made with ❤️ by
                        <a href="https://diveratech.site" target="_blank" class="footer-link"
                            style="text-decoration: none !important; color: white !important;">Spectra
                            Teacch</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="/assets/landing/js/jquery-2.1.0.min.js"></script>
    <script src="/assets/landing/js/popper.js"></script>
    <script src="/assets/landing/js/bootstrap.min.js"></script>
    <script src="/assets/landing/js/scrollreveal.min.js"></script>
    <script src="/assets/landing/js/waypoints.min.js"></script>
    <script src="/assets/landing/js/jquery.counterup.min.js"></script>
    <script src="/assets/landing/js/imgfix.min.js"></script>
    <script src="/assets/landing/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const links = document.querySelectorAll('.lesson-link');
        const title = document.getElementById('lesson-title');
        const description = document.getElementById('lesson-description');
        const pdf = document.getElementById('lesson-pdf');

        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.dataset.id;

                links.forEach(l => l.classList.remove('active'));
                this.classList.add('active');

                fetch(`/lessons/${id}`)
                    .then(res => res.json())
                    .then(data => {
                        title.innerText = data.title;
                        description.innerText = data.description;
                        pdf.src = `/storage/${data.file}#toolbar=0`;

                        const newUrl = `${window.location.pathname}?lessons=${id}`;
                        window.history.pushState({
                            path: newUrl
                        }, '', newUrl);
                    });
            });
        });
    });
    </script>
</body>

</html>
