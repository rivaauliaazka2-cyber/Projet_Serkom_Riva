
<footer class="footer pt-5 pb-3">
    <div class="container">

        <div class="row g-5">

            <div class="col-lg-5">
                <div class="d-flex align-items-center mb-3">

                    <img src="{{ asset('assets/images/logosma-removebg-preview.png') }}"
                         class="footer-logo me-3"
                         alt="Logo SMA Negeri 5 Tasikmalaya">

                    <div>
                        <h5 class="footer-title mb-1">SMA NEGERI 5</h5>
                        <small>TASIKMALAYA</small>
                    </div>
                </div>

                <p class="footer-text">
                    Website Sistem Informasi Profil Sekolah
                    SMA Negeri 5 Tasikmalaya yang menyajikan
                    informasi sekolah, berita, prestasi,
                    ekstrakurikuler, dan berbagai informasi pendidikan.
                </p>
            </div>

            <div class="col-lg-6 col-md-6">
                <h6 class="footer-heading">Hubungi Kami</h6>

                <p class="footer-text mb-2">
                    <i class="bi bi-geo-alt-fill me-2"></i>
                    {{ $profil->alamat ?? 'Tasikmalaya, Jawa Barat' }}
                </p>

                <p class="footer-text mb-2">
                    <i class="bi bi-envelope-fill me-2"></i>
                    campus@sman5-tasikmalaya.sch.id
                </p>

                <p class="footer-text mb-3">
                    <i class="bi bi-telephone-fill me-2"></i>
                    (0265) 332502
                </p>
            </div>

        </div>

        <div class="footer-bottom text-center">
            © {{ date('Y') }}
            SMA NEGERI 5 TASIKMALAYA.
            All Rights Reserved.
        </div>

    </div>
</footer>
