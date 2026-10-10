<nav class="navbar navbar-expand-lg sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center"
           href="{{ route('landing') }}#beranda">
            <img src="{{ asset('assets/images/logosma-removebg-preview.png') }}"
                 width="55" height="55" class="me-2"
                 style="object-fit:contain;" alt="Logo SMA Negeri 5">
            <span class="navbar-school-name">SMA NEGERI 5 TASIKMALAYA</span>
        </a>

        <button class="navbar-toggler bg-white" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarMenu"
                aria-controls="navbarMenu" aria-expanded="false"
                aria-label="Buka navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center" id="mainNavbar">
                <li class="nav-item">
                    <a class="nav-link nav-section-link" data-section="beranda"
                       href="{{ route('landing') }}#beranda">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-section-link" data-section="profil"
                       href="{{ route('landing') }}#profil">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-section-link" data-section="guru"
                       href="{{ route('landing') }}#guru">Guru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-section-link" data-section="ekskul"
                       href="{{ route('landing') }}#ekskul">Ekstrakurikuler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-section-link" data-section="prestasi"
                       href="{{ route('landing') }}#prestasi">Prestasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-section-link" data-section="galeri"
                       href="{{ route('landing') }}#galeri">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-section-link" data-section="berita"
                       href="{{ route('landing') }}#berita">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-section-link" data-section="pengumuman"
                       href="{{ route('landing') }}#pengumuman">Pengumuman</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar {
        background: #0066a1;
        padding: 10px 0;
        z-index: 1030;
    }
    .navbar .navbar-brand { color: #fff; gap: 2px; }
    .navbar-school-name {
        font-size: 1.2rem;
        line-height: 1.3;
        letter-spacing: .3px;
    }
    .navbar .nav-link {
        position: relative;
        color: #fff;
        font-weight: 500;
        padding: 10px 11px !important;
        margin: 2px;
        border-radius: 8px;
        transition: background .25s ease, color .25s ease;
    }
    .navbar .nav-link:hover {
        color: #8ed8ff;
        background: rgba(255,255,255,.08);
    }
    .navbar .nav-link.active {
        color: #fff !important;
        background: rgba(255,255,255,.17);
        font-weight: 700;
    }
    .navbar .nav-link.active::after {
        content: "";
        position: absolute;
        left: 12px;
        right: 12px;
        bottom: 3px;
        height: 3px;
        border-radius: 5px;
        background: #8ed8ff;
    }
    .navbar .navbar-toggler {
        border: 1px solid rgba(255,255,255,.6);
        padding: 6px 10px;
    }
    .navbar .navbar-toggler:focus {
        box-shadow: 0 0 0 3px rgba(142,216,255,.35);
    }
    @media (max-width: 991.98px) {
        .navbar-school-name { font-size: .95rem; }
        .navbar .navbar-collapse { padding-top: 12px; }
        .navbar .navbar-nav { align-items: stretch !important; }
        .navbar .nav-link { padding: 11px 14px !important; margin: 2px 0; }
        .navbar .nav-link.active::after {
            left: 14px;
            right: auto;
            width: 35px;
        }
    }
    @media (max-width: 420px) {
        .navbar-brand img { width: 43px; height: 43px; }
        .navbar-school-name { font-size: .78rem; }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('.nav-section-link');
    const sectionIds = [
        'beranda', 'profil', 'guru', 'berita',
        'prestasi', 'galeri', 'ekskul', 'pengumuman'
    ];
    const sections = sectionIds
        .map(id => document.getElementById(id))
        .filter(section => section !== null);

    function setActive(sectionId) {
        links.forEach(link => {
            const active = link.dataset.section === sectionId;
            link.classList.toggle('active', active);

            if (active) {
                link.setAttribute('aria-current', 'location');
            } else {
                link.removeAttribute('aria-current');
            }
        });
    }

    // Aktif saat menu diklik
    links.forEach(link => {
        link.addEventListener('click', function () {
            setActive(link.dataset.section);

            const menu = document.getElementById('navbarMenu');
            if (menu && menu.classList.contains('show')) {
                bootstrap.Collapse.getOrCreateInstance(menu).hide();
            }
        });
    });

    // Aktif sesuai bagian pada URL
    function setActiveFromHash() {
        const hash = window.location.hash.substring(1);
        if (sectionIds.includes(hash)) {
            setActive(hash);
        } else if (window.location.pathname === '/') {
            setActive('beranda');
        }
    }

    setActiveFromHash();
    window.addEventListener('hashchange', setActiveFromHash);

    // Aktif otomatis saat scroll
    if ('IntersectionObserver' in window && sections.length > 0) {
        const observer = new IntersectionObserver(entries => {
            const visible = entries
                .filter(entry => entry.isIntersecting)
                .sort((a, b) => b.intersectionRatio - a.intersectionRatio);

            if (visible.length > 0) {
                setActive(visible[0].target.id);
            }
        }, {
            rootMargin: '-100px 0px -50% 0px',
            threshold: [0, .2, .5]
        });

        sections.forEach(section => observer.observe(section));
    }
});
</script>
