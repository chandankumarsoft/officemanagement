@extends('layouts.frontend')

@section('title', 'Services')
@section('meta_description', 'fmtserv offers professional web development, full stack, PHP/Laravel, frontend, backend, software engineering, and hosting services.')

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<section class="page-header">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Services</li>
            </ol>
        </nav>
        <h1>Our Services</h1>
        <p>Expert development services tailored to your business needs.</p>
    </div>
</section>

{{-- ===== INTRO ===== --}}
<section class="py-5 bg-white border-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <p class="text-muted fs-5">
                    From simple websites to complex enterprise platforms — fmtserv delivers
                    professional digital solutions with a focus on quality, performance, and reliability.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ===== ALL SERVICES GRID ===== --}}
<section class="section-py bg-light-blue">
    <div class="container">

        <div class="row g-4">

            {{-- 1. Web Development --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100">
                    <div class="service-icon bg-primary bg-opacity-10 text-primary">
                        <i class="bi bi-code-slash"></i>
                    </div>
                    <h5>Web Development</h5>
                    <p>
                        We design and build responsive, fast-loading, and SEO-optimised websites that
                        represent your brand professionally. Every site is built with modern standards,
                        cross-browser compatibility, and mobile-first design in mind.
                    </p>
                    <ul class="text-muted small ps-3 mt-3 mb-0">
                        <li>Responsive &amp; mobile-friendly layouts</li>
                        <li>SEO-optimised HTML structure</li>
                        <li>Fast load times &amp; performance tuning</li>
                        <li>Cross-browser compatible</li>
                    </ul>
                </div>
            </div>

            {{-- 2. Full Stack --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100">
                    <div class="service-icon bg-success bg-opacity-10 text-success">
                        <i class="bi bi-layers"></i>
                    </div>
                    <h5>Full Stack Development</h5>
                    <p>
                        End-to-end application development covering frontend UI, backend API,
                        database design, and deployment. We handle the complete lifecycle of your
                        web application from architecture to launch.
                    </p>
                    <ul class="text-muted small ps-3 mt-3 mb-0">
                        <li>Architecture &amp; system design</li>
                        <li>API development &amp; integration</li>
                        <li>Database modeling &amp; optimization</li>
                        <li>Deployment &amp; server configuration</li>
                    </ul>
                </div>
            </div>

            {{-- 3. Frontend --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100">
                    <div class="service-icon bg-info bg-opacity-10 text-info">
                        <i class="bi bi-layout-text-window"></i>
                    </div>
                    <h5>Frontend Development</h5>
                    <p>
                        Pixel-perfect, interactive user interfaces built with HTML5, CSS3,
                        Bootstrap 5, and modern JavaScript. We translate designs into clean,
                        maintainable frontend code that works across all devices.
                    </p>
                    <ul class="text-muted small ps-3 mt-3 mb-0">
                        <li>Bootstrap 5 &amp; responsive grids</li>
                        <li>Custom UI components &amp; animations</li>
                        <li>Form validation &amp; interactivity</li>
                        <li>Accessibility-conscious markup</li>
                    </ul>
                </div>
            </div>

            {{-- 4. Backend --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100">
                    <div class="service-icon bg-warning bg-opacity-10 text-warning">
                        <i class="bi bi-server"></i>
                    </div>
                    <h5>Backend Development</h5>
                    <p>
                        Robust, scalable server-side applications and APIs. We build the logic,
                        data processing, and integrations that power your application — with a
                        strong emphasis on security and performance.
                    </p>
                    <ul class="text-muted small ps-3 mt-3 mb-0">
                        <li>RESTful API design &amp; development</li>
                        <li>Authentication &amp; role-based access</li>
                        <li>Third-party API integrations</li>
                        <li>Background jobs &amp; queues</li>
                    </ul>
                </div>
            </div>

            {{-- 5. Software Engineer --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100">
                    <div class="service-icon bg-secondary bg-opacity-10 text-secondary">
                        <i class="bi bi-cpu"></i>
                    </div>
                    <h5>Software Engineering</h5>
                    <p>
                        Custom software solutions designed around your exact business processes.
                        From internal tools and management systems to client-facing platforms,
                        we engineer software that solves real problems.
                    </p>
                    <ul class="text-muted small ps-3 mt-3 mb-0">
                        <li>Requirements analysis &amp; planning</li>
                        <li>Custom admin &amp; management systems</li>
                        <li>CRUD applications &amp; dashboards</li>
                        <li>Code review &amp; refactoring</li>
                    </ul>
                </div>
            </div>

            {{-- 6. PHP / Laravel --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100">
                    <div class="service-icon bg-danger bg-opacity-10 text-danger">
                        <i class="bi bi-filetype-php"></i>
                    </div>
                    <h5>PHP / Laravel Development</h5>
                    <p>
                        Specialised Laravel development for web applications, REST APIs, CMS,
                        e-commerce platforms, and SaaS products. We leverage the full power of
                        the Laravel ecosystem — Eloquent, Artisan, Blade, and more.
                    </p>
                    <ul class="text-muted small ps-3 mt-3 mb-0">
                        <li>Laravel 10/11/12 applications</li>
                        <li>Blade templating &amp; component design</li>
                        <li>Eloquent models &amp; relationships</li>
                        <li>Migrations, seeders &amp; factories</li>
                    </ul>
                </div>
            </div>

            {{-- 7. Hosting --}}
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100">
                    <div class="service-icon bg-primary bg-opacity-10 text-primary">
                        <i class="bi bi-cloud-arrow-up"></i>
                    </div>
                    <h5>Website Hosting</h5>
                    <p>
                        Reliable, affordable web hosting configured for Laravel and PHP applications.
                        We provide setup, deployment assistance, and ongoing support to keep
                        your site live, secure, and fast.
                    </p>
                    <ul class="text-muted small ps-3 mt-3 mb-0">
                        <li>cPanel &amp; shared hosting setup</li>
                        <li>SSL certificate configuration</li>
                        <li>Domain &amp; DNS management</li>
                        <li>Deployment &amp; go-live support</li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
</section>

{{-- ===== PROCESS ===== --}}
<section class="section-py bg-white">
    <div class="container">

        <div class="text-center mb-5">
            <span class="section-label">How We Work</span>
            <h2 class="section-title">Our Development Process</h2>
            <p class="section-sub mt-2">Simple, transparent, and focused on delivering results.</p>
        </div>

        <div class="row g-4 text-center">

            <div class="col-lg-3 col-md-6">
                <div class="p-4">
                    <div class="service-icon bg-primary bg-opacity-10 text-primary mx-auto mb-3">
                        <i class="bi bi-chat-dots"></i>
                    </div>
                    <div class="fw-bold text-muted small mb-1">STEP 01</div>
                    <h6 class="fw-bold">Discuss</h6>
                    <p class="text-muted small">We listen to your requirements, goals, and constraints to understand exactly what you need.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="p-4">
                    <div class="service-icon bg-success bg-opacity-10 text-success mx-auto mb-3">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <div class="fw-bold text-muted small mb-1">STEP 02</div>
                    <h6 class="fw-bold">Plan</h6>
                    <p class="text-muted small">We create a clear scope, timeline, and technical plan before writing a single line of code.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="p-4">
                    <div class="service-icon bg-warning bg-opacity-10 text-warning mx-auto mb-3">
                        <i class="bi bi-code-square"></i>
                    </div>
                    <div class="fw-bold text-muted small mb-1">STEP 03</div>
                    <h6 class="fw-bold">Build</h6>
                    <p class="text-muted small">Development with regular check-ins, keeping you informed and involved throughout the process.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="p-4">
                    <div class="service-icon bg-info bg-opacity-10 text-info mx-auto mb-3">
                        <i class="bi bi-rocket-takeoff"></i>
                    </div>
                    <div class="fw-bold text-muted small mb-1">STEP 04</div>
                    <h6 class="fw-bold">Launch</h6>
                    <p class="text-muted small">We deploy, test, and hand over your project with documentation and continued support.</p>
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
                <h2 class="mb-3">Have a Project in Mind?</h2>
                <p class="mb-4">
                    Let's talk about what you need. No complicated processes — just a clear
                    conversation about your requirements.
                </p>
                <a href="{{ url('/contact') }}" class="btn btn-hero-primary">
                    <i class="bi bi-send me-2"></i>Request a Quote
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
