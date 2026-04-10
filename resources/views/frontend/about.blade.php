@extends('layouts.frontend')

@section('title', 'About Us')
@section('meta_description', 'Learn about fmtserv – our mission, vision, expertise, and the team behind our web development services.')

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<section class="page-header">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">About</li>
            </ol>
        </nav>
        <h1>About fmtserv</h1>
        <p>Who we are, what we stand for, and what we build.</p>
    </div>
</section>

{{-- ===== COMPANY INTRO ===== --}}
<section class="section-py bg-white">
    <div class="container">
        <div class="row align-items-center g-5">

            <div class="col-lg-6">
                <span class="section-label">Our Story</span>
                <h2 class="section-title mt-1 mb-4">
                    A Team Passionate About Building the Web
                </h2>
                <p class="text-muted">
                    fmtserv is a professional web development and software engineering company
                    dedicated to helping businesses establish and grow their online presence.
                    We combine technical excellence with a deep understanding of business needs
                    to deliver solutions that are not only functional — but genuinely effective.
                </p>
                <p class="text-muted">
                    Founded with a commitment to clean code and honest work, we've served clients
                    across industries ranging from startups to established enterprises. Whether it's
                    a landing page, a full-stack SaaS application, or a custom Laravel API — we
                    treat every project with the same level of care and professionalism.
                </p>
                <div class="d-flex flex-wrap gap-2 mt-4">
                    <a href="{{ url('/services') }}" class="btn btn-primary rounded-pill px-4">
                        <i class="bi bi-grid-3x3-gap me-2"></i>Our Services
                    </a>
                    <a href="{{ url('/contact') }}" class="btn btn-outline-secondary rounded-pill px-4">
                        <i class="bi bi-envelope me-2"></i>Get in Touch
                    </a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="rounded-xl p-4 bg-primary bg-opacity-10 text-center h-100">
                            <i class="bi bi-code-square text-primary fs-1 mb-2 d-block"></i>
                            <div class="fw-bold text-primary fs-4">50+</div>
                            <div class="text-muted small mt-1">Projects Delivered</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="rounded-xl p-4 bg-success bg-opacity-10 text-center h-100">
                            <i class="bi bi-people text-success fs-1 mb-2 d-block"></i>
                            <div class="fw-bold text-success fs-4">30+</div>
                            <div class="text-muted small mt-1">Satisfied Clients</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="rounded-xl p-4 bg-warning bg-opacity-10 text-center h-100">
                            <i class="bi bi-calendar-check text-warning fs-1 mb-2 d-block"></i>
                            <div class="fw-bold text-warning fs-4">5+</div>
                            <div class="text-muted small mt-1">Years in Business</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="rounded-xl p-4 bg-info bg-opacity-10 text-center h-100">
                            <i class="bi bi-star text-info fs-1 mb-2 d-block"></i>
                            <div class="fw-bold text-info fs-4">100%</div>
                            <div class="text-muted small mt-1">Client Focus</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ===== MISSION & VISION ===== --}}
<section class="section-py bg-light-blue">
    <div class="container">

        <div class="text-center mb-5">
            <span class="section-label">Our Direction</span>
            <h2 class="section-title">Mission &amp; Vision</h2>
        </div>

        <div class="row g-4 justify-content-center">

            <div class="col-lg-5 col-md-6">
                <div class="mission-card bg-white shadow-sm h-100">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="service-icon bg-primary bg-opacity-10 text-primary">
                            <i class="bi bi-bullseye"></i>
                        </div>
                        <h4 class="mb-0 fw-bold">Our Mission</h4>
                    </div>
                    <p class="text-muted">
                        To deliver reliable, high-quality web and software solutions that empower
                        businesses to grow in the digital world. We are committed to honest
                        communication, on-time delivery, and code that stands the test of time.
                    </p>
                    <ul class="text-muted ps-3 mb-0">
                        <li>Write clean, maintainable code</li>
                        <li>Respect client timelines and budgets</li>
                        <li>Build lasting business relationships</li>
                        <li>Stay current with modern technologies</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-5 col-md-6">
                <div class="mission-card bg-white shadow-sm h-100">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="service-icon bg-success bg-opacity-10 text-success">
                            <i class="bi bi-eye"></i>
                        </div>
                        <h4 class="mb-0 fw-bold">Our Vision</h4>
                    </div>
                    <p class="text-muted">
                        To be the go-to development partner for businesses seeking craftsmanship
                        over commodity. We envision a web where every application is purposeful,
                        performant, and built with genuine care.
                    </p>
                    <ul class="text-muted ps-3 mb-0">
                        <li>Prioritize performance and accessibility</li>
                        <li>Make the web more secure and reliable</li>
                        <li>Help small businesses compete at scale</li>
                        <li>Contribute to the open-source community</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ===== SKILLS / EXPERTISE ===== --}}
<section class="section-py bg-white">
    <div class="container">

        <div class="text-center mb-5">
            <span class="section-label">Technical Expertise</span>
            <h2 class="section-title">What We Work With</h2>
            <p class="section-sub mt-2">
                Our team has hands-on experience with the technologies that power modern web applications.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-lg-3 col-md-6">
                <div class="service-card text-center">
                    <div class="service-icon bg-danger bg-opacity-10 text-danger mx-auto">
                        <i class="bi bi-filetype-html"></i>
                    </div>
                    <h5>HTML &amp; CSS</h5>
                    <p>Semantic, accessible markup and modern CSS with Flexbox, Grid, and animations.</p>
                    <div class="mt-3">
                        <span class="skill-badge">HTML5</span>
                        <span class="skill-badge">CSS3</span>
                        <span class="skill-badge">SASS</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="service-card text-center">
                    <div class="service-icon bg-warning bg-opacity-10 text-warning mx-auto">
                        <i class="bi bi-filetype-js"></i>
                    </div>
                    <h5>JavaScript</h5>
                    <p>Vanilla JS, ES6+, DOM manipulation, Bootstrap 5, and lightweight integrations.</p>
                    <div class="mt-3">
                        <span class="skill-badge">ES6+</span>
                        <span class="skill-badge">Bootstrap 5</span>
                        <span class="skill-badge">jQuery</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="service-card text-center">
                    <div class="service-icon bg-primary bg-opacity-10 text-primary mx-auto">
                        <i class="bi bi-filetype-php"></i>
                    </div>
                    <h5>PHP &amp; Laravel</h5>
                    <p>Backend development, REST APIs, Eloquent ORM, Blade templating, and Artisan.</p>
                    <div class="mt-3">
                        <span class="skill-badge">PHP 8+</span>
                        <span class="skill-badge">Laravel 12</span>
                        <span class="skill-badge">MySQL</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="service-card text-center">
                    <div class="service-icon bg-success bg-opacity-10 text-success mx-auto">
                        <i class="bi bi-tools"></i>
                    </div>
                    <h5>Tools &amp; DevOps</h5>
                    <p>Version control, server management, CI/CD basics, and hosting configuration.</p>
                    <div class="mt-3">
                        <span class="skill-badge">Git</span>
                        <span class="skill-badge">cPanel</span>
                        <span class="skill-badge">Linux</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ===== CTA ===== --}}
<section class="cta-section text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <h2 class="mb-3">Interested in Working Together?</h2>
                <p class="mb-4">
                    Tell us about your project and let's discuss how fmtserv can help you achieve your goals.
                </p>
                <a href="{{ url('/contact') }}" class="btn btn-hero-primary">
                    <i class="bi bi-send me-2"></i>Start a Conversation
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
