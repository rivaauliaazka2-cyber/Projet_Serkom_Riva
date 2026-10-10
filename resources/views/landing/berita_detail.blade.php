<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $berita->judul }} - SMA Negeri 5 Tasikmalaya</title>

    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f9ff;
            color: #1f2937;
        }

        .navbar {
            background: #0066a1;
        }

        .navbar-brand {
            color: white !important;
            font-weight: 700;
            letter-spacing: .2px;
        }

        .detail-section {
            padding: 55px 0 75px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #0066a1;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 22px;
        }

        .back-btn:hover {
            color: #004d7a;
        }

        .article-card {
            background: white;
            border: 1px solid #e3eef6;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 12px 35px rgba(0, 76, 122, .09);
        }

        .article-top {
            background: linear-gradient(135deg, #eaf6ff, #f8fcff);
            padding: 35px 25px;
            text-align: center;
        }

        .article-image {
            width: 100%;
            max-width: 620px;
            height: 340px;
            object-fit: cover;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 76, 122, .15);
        }

        .article-placeholder {
            width: 100%;
            max-width: 620px;
            height: 340px;
            margin: auto;
            border-radius: 18px;
            background: linear-gradient(135deg, #0066a1, #8ed8ff);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 65px;
            box-shadow: 0 8px 25px rgba(0, 76, 122, .15);
        }

        .article-content {
            padding: 42px 55px 48px;
        }

        .article-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 18px;
        }

        .meta-item {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 13px;
            border-radius: 50px;
            background: #eaf6ff;
            color: #0066a1;
            font-size: 13px;
            font-weight: 600;
        }

        .article-title {
            color: #005b8f;
            font-size: 38px;
            font-weight: 800;
            line-height: 1.25;
            margin-bottom: 0;
        }

        .article-line {
            width: 65px;
            height: 4px;
            background: #65c5f5;
            border-radius: 10px;
            margin: 20px 0 25px;
        }

        .article-body {
            color: #4b5563;
            line-height: 1.9;
            font-size: 16px;
        }

        .article-body::first-letter {
            font-size: 38px;
            font-weight: 700;
            color: #0066a1;
            float: left;
            line-height: .9;
            margin-right: 6px;
        }

        .info-box {
            margin-top: 32px;
            padding: 18px 20px;
            border-radius: 16px;
            background: #f5faff;
            border: 1px solid #dceef8;
            display: flex;
            align-items: center;
            gap: 13px;
            color: #4b5563;
        }

        .info-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: #0066a1;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            flex-shrink: 0;
        }

        .footer {
            background: #002d47;
            color: white;
        }

        .footer-text {
            color: #b9dff2;
        }

        @media(max-width:768px) {
            .detail-section {
                padding: 35px 0 55px;
            }

            .article-top {
                padding: 22px 18px;
            }

            .article-image,
            .article-placeholder {
                height: 260px;
            }

            .article-content {
                padding: 28px 22px 35px;
            }

            .article-title {
                font-size: 28px;
            }

            .article-body {
                font-size: 15px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center"
           href="{{ route('landing') }}">

            <img src="{{ asset('assets/images/logosma-removebg-preview.png') }}"
                 width="45"
                 height="45"
                 class="me-2"
                 style="object-fit:contain;"
                 alt="Logo">

            SMA NEGERI 5 TASIKMALAYA
        </a>
    </div>
</nav>

<section class="detail-section">
    <div class="container">

        <a href="{{ route('landing') }}#berita" class="back-btn">
            <i class="bi bi-arrow-left"></i>
            Kembali ke Berita
        </a>

        <div class="article-card">

            <div class="article-top">

                @if($berita->gambar)

                    <img src="{{ asset('storage/' . $berita->gambar) }}"
                         class="article-image"
                         alt="{{ $berita->judul }}">

                @else

                    <div class="article-placeholder">
                        <i class="bi bi-newspaper"></i>
                    </div>

                @endif

            </div>

            <div class="article-content">

                <div class="article-meta">

                    <div class="meta-item">
                        <i class="bi bi-calendar3"></i>
                        {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                    </div>

                    <div class="meta-item">
                        <i class="bi bi-newspaper"></i>
                        Berita Sekolah
                    </div>

                    @if($berita->status == 'Publish')
                        <div class="meta-item">
                            <i class="bi bi-check-circle-fill"></i>
                            Dipublikasikan
                        </div>
                    @endif

                </div>

                <h1 class="article-title">
                    {{ $berita->judul }}
                </h1>

                <div class="article-line"></div>

                <div class="article-body">
                    {!! nl2br(e($berita->isi)) !!}
                </div>

                <div class="info-box">

                    <div class="info-icon">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>

                    <div>
                        <div class="fw-bold text-dark">
                            SMA Negeri 5 Tasikmalaya
                        </div>

                        <small>
                            Informasi dan berita terbaru sekolah.
                        </small>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>

<footer class="footer py-4">
    <div class="container text-center">

        <img src="{{ asset('assets/images/logosma-removebg-preview.png') }}"
             width="55"
             height="55"
             style="object-fit:contain;"
             class="mb-2"
             alt="Logo">

        <h5 class="fw-bold">
            SMA NEGERI 5 TASIKMALAYA
        </h5>

        <p class="footer-text mb-1">
            Sistem Informasi Profil Sekolah
        </p>

        <small class="footer-text">
            © {{ date('Y') }} SMA NEGERI 5 TASIKMALAYA
        </small>

    </div>
</footer>

<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
