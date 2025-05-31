<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500;600;700&display=swap" rel="stylesheet" />

    <title>Spectra TEACCH</title>
    <link rel="icon" type="image/x-icon" href="/assets/admin/img/favicon/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="/assets/landing/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets/landing/css/font-awesome.css" />
    <link rel="stylesheet" href="/assets/landing/css/templatemo-softy-pinko.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <style>
        html {
        scroll-behavior: smooth;
        }
            .lesson-nav {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin-bottom: 30px;
            text-align: center;
        }

        .lesson-nav h1,
        .lesson-nav h3 {
            margin-bottom: 10px;
            text-align: center !important;
        }

        .lesson-nav a {
            display: block;
            padding: 10px 15px;
            background-color: #f1f1f1;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            transition: background-color 0.2s ease;
            width: fit-content;
        }

        .lesson-nav a:hover {
            background-color: #e0e0e0;
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
                        <a href="/" class="text-logo">Spectra TEACCH</a>
                        <ul class="nav">
                            <li><a href="#welcome" class="active">Home</a></li>
                            <li><a href="/#modules">Modules</a></li>
                        </ul>
                        <a class="menu-trigger">
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
                        <p>
                            Spectra TEACCH adalah platform edukasi untuk orang tua yang ingin membekali diri dengan
                            pengetahuan dan keterampilan dalam mendampingi anak dengan spektrum autisme.
                        </p>
                        <a href="#lessons" class="main-button-header">Mulai Belajar</a>
                    </div>
                    <div class="col-lg-6 col-md-12 text-center mt-4 mt-lg-0">
                        <img src="/assets/landing/images/header.png" alt="Ilustrasi Anak Belajar" class="img-fluid"
                            style="max-height: 400px" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section home-feature" id="lessons">
        <div class="container">
            <div class="lesson-nav">
                <h1 style="color: #0d6efd !important; font-weight: bold">{{ $modules->title }}</h1>
                <h3 class="mb-3">{{ $modules->description }}</h3>
                @foreach ($modules->lessons->sortBy('order') as $lesson)
                <a href="#" data-id="{{ $lesson->id }}"
                    class="lesson-link {{ request('lesson', $modules->lessons->first()->id) == $lesson->id ? 'active' : '' }}">
                    {{ $lesson->title }}
                </a>
                @endforeach
            </div>

            <div class="lesson-details">
                <h2 id="lesson-title">{{ $modules->lessons->first()->title }}</h2>
                <p id="lesson-description">{{ $modules->lessons->first()->description }}</p>
                <div id="lesson-pdf-container">
                    @if ($modules->lessons->first()->pdf_path)
                    <iframe id="lesson-pdf" src="/storage/{{ $modules->lessons->first()->pdf_path }}#toolbar=0" width="100%"
                        height="600px" frameborder="0"></iframe>
                    @endif
                </div>
            </div>

            <div class="sub-lessons" id="sub-lessons-list">
            @foreach ($modules->lessons->first()->subLessons as $subLesson)
                <div class="accordion-item" data-id="{{ $subLesson->id }}">
                    <div class="accordion-title" onclick="toggleAccordion(this)">
                        {{ $subLesson->title }}
                    </div>
                    <div class="accordion-content preserve-line">
                        {!! nl2br(e($subLesson->description)) !!}
                    </div>
                </div>
            @endforeach
        </div>

        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright">
                        Copyright ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>, made with ❤️ by
                        <a href="https://diveratech.site" target="_blank" class="footer-link"
                            style="text-decoration: none !important; color: white !important;">Spectra TEACCH</a>
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
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const lessonLinks = document.querySelectorAll('.lesson-link');
            const lessonTitle = document.getElementById('lesson-title');
            const lessonDescription = document.getElementById('lesson-description');
            const lessonPdfContainer = document.getElementById('lesson-pdf-container');
            const subLessonsList = document.getElementById('sub-lessons-list');

            lessonLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const lessonId = this.dataset.id;

                    lessonLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');

                    fetch(`/lessons/${lessonId}`)
                        .then(response => response.json())
                        .then(data => {
                            lessonTitle.textContent = data.title;
                            lessonDescription.textContent = data.description;



                            subLessonsList.innerHTML = '';
                    if (data.sub_lessons && data.sub_lessons.length > 0) {
                        data.sub_lessons.forEach(sub => {
                            const wrapper = document.createElement('div');
                            wrapper.classList.add('accordion-item', 'sub-lesson');
                            wrapper.dataset.id = sub.id;

                            wrapper.innerHTML = `
                                <div class="accordion-title" onclick="toggleAccordion(this)">
                                    ${sub.title}
                                </div>
                                <div class="accordion-content preserve-line">
                                    ${sub.description.replace(/\n/g, '<br>')}
                                </div>
                            `;
                            subLessonsList.appendChild(wrapper);
                        });
                    } else {
                        subLessonsList.innerHTML = '<p><i>Tidak ada sub lessons.</i></p>';
                    }

                            const newUrl = `${window.location.pathname}?lesson=${lessonId}`;
                            window.history.pushState({ path: newUrl }, '', newUrl);
                        })
                        .catch(() => {
                            alert('Gagal memuat data lesson.');
                        });
                });
            });
        });
    </script>
    <script>
        function toggleAccordion(el) {
            const content = el.nextElementSibling;
            const isOpen = content.classList.contains('active');

            document.querySelectorAll('.accordion-content').forEach(c => {
                c.classList.remove('active');
                c.style.maxHeight = null;
            });

            if (!isOpen) {
                content.classList.add('active');
                content.style.maxHeight = content.scrollHeight + "px";
            }
        }
    </script>
    <script>
        document.querySelectorAll('.scroll-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
            targetElement.scrollIntoView({ behavior: 'smooth' });
            }
        });
        });

    </script>
</body>

</html>
