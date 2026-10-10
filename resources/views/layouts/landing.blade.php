<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMA Negeri 5 Tasikmalaya')</title>

    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">

    <style>
        * { scroll-behavior: smooth; }

        body {
            font-family: Arial, sans-serif;
            background: #f7fbff;
            color: #1f2937;
        }

        /* NAVBAR */
        .navbar { background: rgba(0,102,161,.96); backdrop-filter: blur(12px); }
        .navbar-brand, .nav-link { color: white !important; }
        .navbar-brand { font-size: 15px; }
        .nav-link { font-weight: 500; transition: .3s; }
        .nav-link:hover { color: #8ed8ff !important; }
        .btn-login {
            background: white; color: #0066a1; border: none;
            border-radius: 10px; padding: 9px 20px; font-weight: 600;
        }
        .btn-login:hover { background: #e8f6ff; color: #004d7a; }

        /* HERO */
        .hero {
            min-height: 680px; display: flex; align-items: center;
            position: relative; color: white;
            background: linear-gradient(90deg,rgba(0,35,65,.92),rgba(0,102,161,.48)),
                url('{{ asset('assets/images/campus5.jpg') }}') center/cover;
        }
        .hero-content { max-width: 780px; }
        .hero-badge {
            display: inline-block; padding: 9px 17px; border-radius: 30px;
            background: rgba(255,255,255,.13);
            border: 1px solid rgba(255,255,255,.25);
            backdrop-filter: blur(8px); font-size: 14px;
        }
        .hero h1 { font-size: 58px; font-weight: 800; line-height: 1.1; margin-top: 22px; }
        .hero h1 span { color: #8ed8ff; }
        .hero p { font-size: 18px; line-height: 1.8; color: #e9f7ff; max-width: 700px; }
        .hero-buttons .btn { border-radius: 12px; padding: 12px 22px; font-weight: 600; }
        .btn-primary-custom { background: #0066a1; border: none; color: white; }
        .btn-primary-custom:hover { background: #004d7a; color: white; }
        .btn-outline-custom { border: 1px solid white; color: white; }
        .btn-outline-custom:hover { background: white; color: #0066a1; }

        /* SECTION */
        .section-padding { padding: 90px 0; }
        .section-title { font-size: 34px; font-weight: 800; color: #0066a1; }
        .section-title::after {
            content: ""; display: block; width: 60px; height: 4px;
            background: #65c5f5; margin: 14px auto 0; border-radius: 10px;
        }
        .section-subtitle { color: #6b7280; max-width: 650px; margin: 12px auto 0; }

        /* STATISTIK */
        .stats { background: linear-gradient(135deg,#0066a1,#004d7a); color: white; }
        .stat-item { padding: 20px; }
        .stat-item i { font-size: 38px; color: #8ed8ff; }
        .stat-number { font-size: 40px; font-weight: 800; margin-top: 8px; }
        .stat-label { font-size: 16px; font-weight: 600; }
        .stat-description { font-size: 13px; color: #ccecff; }

        /* PROFIL */
        .about-image {
            width: 100%; height: 430px; object-fit: cover; border-radius: 25px;
            box-shadow: 0 20px 45px rgba(0,76,122,.15);
        }
        .about-content { padding-left: 30px; }
        .about-content h3 { color: #0066a1; font-weight: 700; }
        .about-content p { color: #6b7280; line-height: 1.8; }
        .about-box { background: #eaf6ff; border-radius: 15px; padding: 18px; height: 100%; }
        .about-box i { color: #0066a1; font-size: 25px; }
        .about-box strong { display: block; margin-top: 8px; }
        .about-box small { color: #6b7280; }

        /* GURU */
        .guru-card {
            border: none; border-radius: 18px; overflow: hidden; background: white;
            height: 100%; transition: .3s; box-shadow: 0 5px 20px rgba(0,70,110,.08);
        }
        .guru-card:hover { transform: translateY(-8px); box-shadow: 0 15px 35px rgba(0,76,122,.16); }
        .guru-photo {
            width: 130px; height: 130px; object-fit: cover; border-radius: 50%;
            border: 5px solid #e8f6ff;
        }
        .guru-placeholder {
            width: 130px; height: 130px; border-radius: 50%; background: #e8f6ff;
            color: #0066a1; display: flex; align-items: center;
            justify-content: center; margin: auto; font-size: 55px;
        }
        .guru-name { color: #0066a1; font-size: 18px; font-weight: 700; }
        .guru-jabatan { color: #6b7280; font-size: 14px; }
        .guru-mapel { color: #0066a1; font-size: 13px; font-weight: 600; }

        /* BERITA */
        .news-card {
            border: none; border-radius: 18px; overflow: hidden; background: white;
            height: 100%; transition: .3s; box-shadow: 0 5px 20px rgba(0,70,110,.08);
        }
        .news-card:hover { transform: translateY(-8px); box-shadow: 0 15px 35px rgba(0,76,122,.16); }
        .news-image { width: 100%; height: 210px; object-fit: cover; }
        .news-placeholder {
            height: 210px; background: linear-gradient(135deg,#0066a1,#8ed8ff);
            display: flex; align-items: center; justify-content: center;
            color: white; font-size: 50px;
        }
        .news-date { color: #0066a1; font-size: 13px; font-weight: 600; }
        .news-title { font-size: 19px; font-weight: 700; }
        .news-text { color: #6b7280; line-height: 1.6; font-size: 14px; }
        .btn-detail { color: #0066a1; font-weight: 600; text-decoration: none; }
        .btn-detail:hover { color: #004d7a; }

        /* PRESTASI */
        .achievement-section { background: #eef8ff; }
        .achievement-card {
            background: white; border-radius: 20px; overflow: hidden;
            height: 100%; box-shadow: 0 7px 25px rgba(0,76,122,.08); transition: .3s;
        }
        .achievement-card:hover { transform: translateY(-7px); }
        .achievement-image { width: 100%; height: 190px; object-fit: cover; }
        .achievement-placeholder {
            height: 190px; background: linear-gradient(135deg,#0066a1,#8ed8ff);
            color: white; display: flex; align-items: center;
            justify-content: center; font-size: 55px;
        }
        .achievement-year {
            display: inline-block; background: #fff4c7; color: #9a7100;
            padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 700;
        }

        /* GALERI */
        .gallery-section { background: white; }
        .gallery-card {
            background: white; border-radius: 18px; overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,70,110,.08); transition: .3s; height: 100%;
        }
        .gallery-card:hover { transform: translateY(-7px); box-shadow: 0 15px 35px rgba(0,76,122,.16); }
        .gallery-image { width: 100%; height: 210px; object-fit: cover; }
        .gallery-placeholder {
            height: 210px; background: linear-gradient(135deg,#0066a1,#8ed8ff);
            display: flex; align-items: center; justify-content: center;
            color: white; font-size: 50px;
        }
        .gallery-title { color: #0066a1; font-size: 18px; font-weight: 700; }
        .gallery-text { color: #6b7280; font-size: 14px; line-height: 1.6; }

        /* EKSTRAKURIKULER */
        .ekskul-card {
            background: white; border-radius: 20px; overflow: hidden; height: 100%;
            box-shadow: 0 7px 25px rgba(0,76,122,.08); transition: .3s;
        }
        .ekskul-card:hover { transform: translateY(-7px); }
        .ekskul-image { width: 100%; height: 200px; object-fit: cover; }
        .ekskul-placeholder {
            height: 200px; background: #e8f6ff; color: #0066a1;
            display: flex; align-items: center; justify-content: center; font-size: 55px;
        }
        .ekskul-name { color: #0066a1; font-weight: 700; font-size: 19px; }
        .ekskul-info { color: #6b7280; font-size: 14px; }

        /* PENGUMUMAN */
        .announcement-section { background: #eef8ff; }
        .announcement-card {
            background: white; border-radius: 18px; padding: 24px; height: 100%;
            box-shadow: 0 5px 20px rgba(0,70,110,.08); transition: .3s;
        }
        .announcement-card:hover { transform: translateY(-7px); box-shadow: 0 15px 35px rgba(0,76,122,.16); }
        .announcement-icon {
            width: 52px; height: 52px; min-width: 52px; border-radius: 13px;
            background: #e8f6ff; color: #0066a1; display: flex;
            align-items: center; justify-content: center; font-size: 23px;
        }
        .announcement-title { color: #0066a1; font-weight: 700; font-size: 18px; }
        .announcement-text { color: #6b7280; font-size: 14px; line-height: 1.6; }

        /* CTA */
        .cta {
            background: linear-gradient(rgba(0,55,95,.90),rgba(0,102,161,.90)),
                url('{{ asset('assets/images/campus5.jpg') }}') center/cover;
            color: white;
        }
        .cta h2 { font-weight: 800; }

        /* FOOTER */
        .footer { background: #002d47; color: white; }
        .footer-logo { width: 65px; height: 65px; object-fit: contain; }
        .footer-title { font-weight: 700; }
        .footer-text { color: #b9dff2; line-height: 1.7; font-size: 14px; }
        .footer-heading { font-weight: 700; margin-bottom: 18px; }
        .footer-links { list-style: none; padding: 0; }
        .footer-links li { margin-bottom: 10px; }
        .footer-links a { color: #b9dff2; text-decoration: none; transition: .3s; }
        .footer-links a:hover { color: white; padding-left: 4px; }
        .social-link {
            width: 40px; height: 40px; display: inline-flex; align-items: center;
            justify-content: center; border-radius: 10px;
            background: rgba(255,255,255,.1); color: white;
            text-decoration: none; margin-right: 7px;
        }
        .social-link:hover { background: #0066a1; color: white; }
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,.12);
            margin-top: 35px; padding-top: 20px; color: #9bc8dc; font-size: 13px;
        }

        @media (max-width: 768px) {
            .hero { min-height: 600px; }
            .hero h1 { font-size: 38px; }
            .hero p { font-size: 16px; }
            .about-content { padding-left: 0; margin-top: 30px; }
            .about-image { height: 300px; }
            .section-padding { padding: 65px 0; }
        }
    </style>

    @stack('styles')
</head>
<body>

    @include('landing.partials.navbar')

    @yield('content')

    @include('landing.partials.footer')

    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')

</body>
</html>
