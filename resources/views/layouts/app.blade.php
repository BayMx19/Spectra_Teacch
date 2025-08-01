<!doctype html>
<html lang="en" class="layout-menu-fixed layout-compact" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Spectra TEACCH – Pembelajaran untuk Orang Tua Anak Autis</title>
    <meta name="keywords" content="autisme, spectra teacch, anak autis, parenting autisme, pembelajaran orang tua, spektrum autisme, website pembelajaran anak autisme, spectra, teacch website, website teacch, Spectra Teacch">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Spectra TEACCH - Pembelajaran untuk Orang Tua Anak Autis">
    <meta property="og:description" content="Platform belajar yang membantu orang tua memahami dan mendampingi anak dengan spektrum autisme.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://spectrateacch.site">
    <meta property="og:image" content="https://spectrateacch.site/assets/admin/img/favicon/favicon.ico">
    <link rel="canonical" href="https://spectrateacch.site">
    <link rel="icon" type="image/x-icon" href="/assets/admin/img/favicon/favicon.ico" />

    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="/assets/admin/vendor/fonts/iconify-icons.css" />

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet" href="/assets/admin/vendor/css/core.css" />
    <link rel="stylesheet" href="/assets/admin/css/demo.css" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="/assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- endbuild -->

    <link rel="stylesheet" href="/assets/admin/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="/assets/admin/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="/assets/admin/js/config.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('layouts.sidebar')
            <div class="layout-page">
                @include('layouts.navbar')
                <div class="content-wrapper">
                    @yield('content')
                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div
                                class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                                <div class="mb-2 mb-md-0">
                                    Copyright ©
                                    <script>
                                    document.write(new Date().getFullYear());
                                    </script>
                                    , made with ❤️ by
                                    <a href="https://diveratech.site" target="_blank" class="footer-link">Spectra
                                        Teacch</a>
                                </div>

                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->
                    <div class="content-backdrop fade"></div>
                </div>


            </div>
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>

    </div>
    </div>
    <script src="/assets/admin/vendor/libs/jquery/jquery.js"></script>

    <script src="/assets/admin/vendor/libs/popper/popper.js"></script>
    <script src="/assets/admin/vendor/js/bootstrap.js"></script>

    <script src="/assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="/assets/admin/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="/assets/admin/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->

    <script src="/assets/admin/js/main.js"></script>

    <!-- Page JS -->
    <script src="/assets/admin/js/dashboards-analytics.js"></script>

    <!-- Place this tag before closing body tag for github widget button. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    </div>
    <script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 200,
            toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']], // ✅ aktifkan menu tabel
        ['insert', ['link', 'picture']],
        ['view', ['fullscreen', 'codeview']]
    ]
        });
    });
</script>
</body>

</html>
