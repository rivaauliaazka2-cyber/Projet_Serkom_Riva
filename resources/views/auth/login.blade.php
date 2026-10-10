<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SMAN 5 Tasikmalaya</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background: #eef8fd;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 920px;
        }

        .login-card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 15px 45px rgba(0, 65, 100, .13);
        }

        /* FOTO SEKOLAH */
        .school-image {
            min-height: 600px;
            position: relative;
            overflow: hidden;
        }

        .school-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            inset: 0;
        }

        .school-image::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to bottom,
                rgba(0, 50, 80, .05),
                rgba(0, 50, 80, .85)
            );
        }

        .school-caption {
            position: absolute;
            z-index: 2;
            left: 35px;
            right: 35px;
            bottom: 35px;
            color: white;
        }

        .school-caption h2 {
            font-size: 30px;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 10px;
        }

        .school-caption p {
            font-size: 14px;
            margin: 0;
            color: rgba(255,255,255,.88);
        }

        /* LOGIN */
        .login-content {
            min-height: 600px;
            padding: 45px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            width: fit-content;
            color: #0066a1;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 35px;
            transition: .2s;
        }

        .back-link:hover {
            color: #003b5c;
            transform: translateX(-3px);
        }

        /* LOGO */
        .login-logo {
            width: 90px;
            height: 90px;
            object-fit: contain;
            display: block;
            margin-bottom: 20px;
        }

        .login-title {
            color: #003b5c;
            font-size: 30px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .login-subtitle {
            color: #7c8b94;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .form-label {
            color: #344955;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #0066a1;
            font-size: 18px;
            z-index: 2;
        }

        .form-control {
            height: 52px;
            border: 1px solid #d8e7ef;
            border-radius: 12px;
            padding-left: 47px;
            padding-right: 45px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #0066a1;
            box-shadow: 0 0 0 4px rgba(0,102,161,.08);
        }

        .password-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #79909d;
            cursor: pointer;
            z-index: 3;
        }

        .password-icon:hover {
            color: #0066a1;
        }

        .btn-login {
            height: 52px;
            border: none;
            border-radius: 12px;
            background: #0066a1;
            color: white;
            font-size: 15px;
            font-weight: 700;
            transition: .3s;
        }

        .btn-login:hover {
            background: #003b5c;
            color: white;
            transform: translateY(-1px);
        }

        .alert-danger {
            border: none;
            border-radius: 12px;
            background: #fff0f0;
            color: #b42318;
            font-size: 13px;
        }

        .security-text {
            text-align: center;
            color: #9aa7ad;
            font-size: 12px;
            margin-top: 18px;
        }

        .security-text i {
            color: #38a169;
            margin-right: 4px;
        }

        .footer-text {
            text-align: center;
            color: #a0abb0;
            font-size: 12px;
            margin-top: 25px;
        }

        .footer-text span {
            color: #0066a1;
            font-weight: 600;
        }

        @media(max-width: 767px) {
            body {
                padding: 15px;
            }

            .school-image {
                display: none;
            }

            .login-content {
                min-height: auto;
                padding: 30px 25px;
            }

            .login-logo {
                width: 80px;
                height: 80px;
                margin: 0 auto 20px;
            }

            .login-title {
                text-align: center;
                font-size: 27px;
            }

            .login-subtitle {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="login-wrapper">

    <div class="login-card">

        <div class="row g-0">

            {{-- FOTO SEKOLAH --}}
            <div class="col-md-6 school-image">

                <img src="{{ asset('assets/images/campus5.jpg') }}"
                     alt="SMAN 5 Tasikmalaya">

                <div class="school-caption">

                    <h2>
                        SMAN 5<br>
                        TASIKMALAYA
                    </h2>

                    <p>
                        Sistem Informasi Profil Sekolah
                    </p>

                </div>

            </div>


            {{-- FORM LOGIN --}}
            <div class="col-md-6">

                <div class="login-content">

                    {{-- KEMBALI --}}
                    <a href="{{ route('landing') }}" class="back-link">

                        <i class="bi bi-arrow-left"></i>

                        Kembali ke Website

                    </a>


                    {{-- LOGO --}}
                    <img src="{{ asset('assets/images/logosma-removebg-preview.png') }}"
                         class="login-logo"
                         alt="Logo SMAN 5 Tasikmalaya">


                    <h1 class="login-title">
                        Selamat Datang
                    </h1>

                    <p class="login-subtitle">
                        Silakan masukkan username dan password
                        untuk melanjutkan.
                    </p>


                    {{-- ERROR --}}
                    @if($errors->any())

                        <div class="alert alert-danger mb-4">

                            <i class="bi bi-exclamation-circle me-2"></i>

                            {{ $errors->first() }}

                        </div>

                    @endif


                    <form action="{{ route('auth') }}" method="POST">

                        @csrf

                        {{-- USERNAME --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Username
                            </label>

                            <div class="input-wrapper">

                                <i class="bi bi-person input-icon"></i>

                                <input type="text"
                                       name="username"
                                       class="form-control"
                                       placeholder="Masukkan username"
                                       value="{{ old('username') }}"
                                       autocomplete="username"
                                       required>

                            </div>

                        </div>


                        {{-- PASSWORD --}}
                        <div class="mb-4">

                            <label class="form-label">
                                Password
                            </label>

                            <div class="input-wrapper">

                                <i class="bi bi-lock input-icon"></i>

                                <input type="password"
                                       name="password"
                                       id="password"
                                       class="form-control"
                                       placeholder="Masukkan password"
                                       autocomplete="current-password"
                                       required>

                                <i class="bi bi-eye password-icon"
                                   id="eyeIcon"
                                   onclick="togglePassword()"></i>

                            </div>

                        </div>


                        {{-- LOGIN --}}
                        <button type="submit"
                                class="btn btn-login w-100">

                            <i class="bi bi-box-arrow-in-right me-2"></i>

                            Login

                        </button>

                    </form>


                    <div class="security-text">

                        <i class="bi bi-shield-check"></i>

                        Sistem login aman dan terlindungi

                    </div>


                    <div class="footer-text">

                        © {{ date('Y') }}

                        <span>SMAN 5 Tasikmalaya</span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<script>
function togglePassword() {
    const password = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    if (password.type === 'password') {
        password.type = 'text';
        eyeIcon.classList.remove('bi-eye');
        eyeIcon.classList.add('bi-eye-slash');
    } else {
        password.type = 'password';
        eyeIcon.classList.remove('bi-eye-slash');
        eyeIcon.classList.add('bi-eye');
    }
}
</script>

</body>
</html>
