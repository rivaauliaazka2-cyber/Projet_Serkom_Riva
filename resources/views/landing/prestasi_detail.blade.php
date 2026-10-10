<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $prestasi->nama_prestasi }} - SMA Negeri 5 Tasikmalaya</title>

<link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.css') }}">

<style>
    body{
        font-family: Arial, sans-serif;
        background:#f5f9ff;
    }

    .navbar{
        background:#0066a1;
    }

    .detail-section{
        padding:55px 0 75px;
    }

    .back-btn{
        display:inline-flex;
        align-items:center;
        gap:6px;
        color:#0066a1;
        text-decoration:none;
        font-weight:600;
        margin-bottom:20px;
    }

    .prestasi-card{
        background:white;
        border-radius:24px;
        overflow:hidden;
        box-shadow:0 12px 35px rgba(0,76,122,.09);
    }

    .prestasi-top{
        background:linear-gradient(135deg,#eaf6ff,#f8fcff);
        padding:35px;
        text-align:center;
    }

    .prestasi-image{
        width:100%;
        max-width:620px;
        height:340px;
        object-fit:cover;
        border-radius:18px;
    }

    .prestasi-placeholder{
        width:100%;
        max-width:620px;
        height:340px;
        margin:auto;
        border-radius:18px;
        background:linear-gradient(135deg,#0066a1,#8ed8ff);
        display:flex;
        align-items:center;
        justify-content:center;
        color:white;
        font-size:70px;
    }

    .prestasi-content{
        padding:40px 50px;
    }

    .prestasi-title{
        color:#005b8f;
        font-size:36px;
        font-weight:800;
    }

    .prestasi-line{
        width:70px;
        height:4px;
        background:#65c5f5;
        border-radius:10px;
        margin:18px 0 25px;
    }

    .info-box{
        background:#f5faff;
        border:1px solid #dceef8;
        border-radius:16px;
        padding:18px;
        margin-bottom:25px;
    }

    .label{
        color:#6b7280;
        font-size:13px;
    }

    .value{
        font-weight:700;
        color:#1f2937;
    }

    .deskripsi{
        line-height:1.9;
        color:#4b5563;
    }

    .footer{
        background:#002d47;
        color:white;
    }

    .footer-text{
        color:#b9dff2;
    }
</style>
</head>

<body>

<nav class="navbar shadow-sm">
    <div class="container">
    <a href="{{ route('landing') }}"
       class="navbar-brand text-white fw-bold d-flex align-items-center text-decoration-none">

        <img src="{{ asset('assets/images/logosma-removebg-preview.png') }}"
             width="50"
             height="50"
             class="me-2">

        SMA NEGERI 5 TASIKMALAYA

    </a>

</div>
</nav>

<section class="detail-section">
    <div class="container">
    <a href="{{ route('landing') }}#prestasi" class="back-btn">
        <i class="bi bi-arrow-left"></i>
        Kembali ke Prestasi
    </a>

    <div class="prestasi-card">

        <div class="prestasi-top">

            @if($prestasi->foto)

                <img src="{{ asset('uploads/prestasi/' . $prestasi->foto) }}"
                     class="prestasi-image">

            @else

                <div class="prestasi-placeholder">
                    <i class="bi bi-trophy-fill"></i>
                </div>

            @endif

        </div>

        <div class="prestasi-content">

            <h1 class="prestasi-title">
                {{ $prestasi->nama_prestasi }}
            </h1>

            <div class="prestasi-line"></div>

            <div class="info-box">

                <div class="label">Tahun Ajaran</div>

                <div class="value">
                    {{ $prestasi->tahun_ajaran ?? '-' }}
                </div>

            </div>

            <h5 class="fw-bold text-primary mb-3">
                Deskripsi Prestasi
            </h5>

            <div class="deskripsi">
                {!! nl2br(e($prestasi->deskripsi)) !!}
            </div>

        </div>

    </div>

</div>
</section>

<footer class="footer py-4">
    <div class="container text-center">
    <img src="{{ asset('assets/images/logosma-removebg-preview.png') }}"
         width="55"
         class="mb-2">

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
