<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description', 'fmtserv – Professional web development and software engineering services.')">
    <title>@yield('title', 'fmtserv') | fmtserv.com</title>

    {{-- Google Fonts: Inter --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    {{-- Bootstrap 5 CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- Frontend stylesheet --}}
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}?v={{ filemtime(public_path('css/frontend.css')) }}">

    @yield('styles')
</head>
<body>

    {{-- ===================== NAVBAR ===================== --}}
    <nav class="navbar navbar-expand-lg site-navbar sticky-top">
        <div class="container">

            <a class="navbar-brand" href="{{ url('/') }}">
                <span class="brand-fmt">fmt</span><span class="navbar-dot"></span><span class="brand-serv">serv</span>
            </a>

            <button class="navbar-toggler border-0" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navMain"
                    aria-controls="navMain" aria-expanded="false">
                <i class="bi bi-list text-white fs-4"></i>
            </button>

            <div class="collapse navbar-collapse" id="navMain">
                <ul class="navbar-nav mx-auto gap-1">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') || request()->routeIs('home') ? 'active' : '' }}"
                           href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}"
                           href="{{ url('/about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('services') ? 'active' : '' }}"
                           href="{{ url('/services') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}"
                           href="{{ url('/contact') }}">Contact</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-2">
                    @guest
                        <a href="{{ route('login') }}" class="btn-nav-outline">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Login
                        </a>
                    @else
                        <form action="{{ route('logout') }}" method="POST" class="mb-0">
                            @csrf
                            <button type="submit" class="btn-nav-outline border-0 bg-transparent cursor-pointer">
                                <i class="bi bi-box-arrow-right me-1"></i>Logout
                            </button>
                        </form>
                    @endguest
                    <a href="{{ url('/contact') }}" class="btn-nav-cta ms-1">
                        Get Started <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    {{-- ===================== CONTENT ===================== --}}
    @yield('content')

    {{-- ===================== FOOTER ===================== --}}
    <footer class="site-footer">
        <div class="container">
            <div class="row g-5">

                {{-- Brand col --}}
                <div class="col-lg-4 col-md-6">
                    <a class="footer-brand" href="{{ url('/') }}">fmt<span class="brand-serv">serv</span></a>
                    <p class="footer-tagline mt-2">
                        Professional web development &amp; software engineering services.
                        Building digital solutions that drive real results.
                    </p>
                    <div class="footer-social">
                        <a href="#" aria-label="GitHub"><i class="bi bi-github"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                        <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                        <a href="mailto:info@fmtserv.com" aria-label="Email"><i class="bi bi-envelope"></i></a>
                    </div>
                </div>

                {{-- Pages --}}
                <div class="col-lg-2 col-md-3 col-6">
                    <h6>Company</h6>
                    <a class="footer-link" href="{{ url('/') }}">Home</a>
                    <a class="footer-link" href="{{ url('/about') }}">About Us</a>
                    <a class="footer-link" href="{{ url('/services') }}">Services</a>
                    <a class="footer-link" href="{{ url('/contact') }}">Contact</a>
                </div>

                {{-- Services --}}
                <div class="col-lg-3 col-md-3 col-6">
                    <h6>Services</h6>
                    <a class="footer-link" href="{{ url('/services') }}">Web Development</a>
                    <a class="footer-link" href="{{ url('/services') }}">Full Stack Dev</a>
                    <a class="footer-link" href="{{ url('/services') }}">Laravel / PHP</a>
                    <a class="footer-link" href="{{ url('/services') }}">Website Hosting</a>
                </div>

                {{-- Legal --}}
                <div class="col-lg-3 col-md-6">
                    <h6>Legal</h6>
                    <a class="footer-link" href="{{ url('/privacy') }}">Privacy Policy</a>
                    <a class="footer-link" href="{{ url('/terms') }}">Terms &amp; Conditions</a>
                    <div class="mt-3">
                        <a href="mailto:info@fmtserv.com" class="footer-link">
                            <i class="bi bi-envelope me-1"></i>info@fmtserv.com
                        </a>
                        <a href="https://fmtserv.com" target="_blank" rel="noopener" class="footer-link">
                            <i class="bi bi-globe me-1"></i>fmtserv.com
                        </a>
                    </div>
                </div>

            </div>

            <div class="footer-bottom d-flex flex-wrap justify-content-between align-items-center gap-2">
                <span>&copy; {{ date('Y') }} fmtserv. All rights reserved.</span>
                <span>Built with <i class="bi bi-heart-fill text-danger small"></i> using Laravel &amp; Bootstrap 5</span>
            </div>
        </div>
    </footer>

    {{-- Bootstrap 5 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Navbar scroll effect --}}
    <script>
    (function() {
        var nav = document.querySelector('.site-navbar');
        if (!nav) return;
        window.addEventListener('scroll', function() {
            nav.classList.toggle('scrolled', window.scrollY > 40);
        }, { passive: true });
    })();
    </script>

    @yield('scripts')

</body>
</html>
