@extends('layouts.frontend')

@section('title', 'Home')
@section('meta_description', 'fmtserv – Professional web development, full stack, PHP/Laravel, and hosting services. We build digital products that perform.')

@section('content')

{{-- ===== HERO ===== --}}
<section class="hero-section">

    <div class="hero-orb hero-orb-1"></div>
    <div class="hero-orb hero-orb-2"></div>

    <div class="container hero-inner">
        <div class="row align-items-center g-5">

            {{-- Left: Copy --}}
            <div class="col-lg-6">
                <div class="hero-badge mb-4">
                    <span class="badge-dot"></span>
                    Available for new projects
                </div>

                <h1>
                    We Build<br>
                    <span class="line-accent">Digital Products</span><br>
                    That Perform.
                </h1>

                <p class="hero-lead">
                    fmtserv delivers expert web development, full stack engineering,
                    and reliable hosting — crafted for businesses that demand quality
                    and measurable results.
                </p>

                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ url('/services') }}" class="btn-hero-primary">
                        <i class="bi bi-grid-3x3-gap-fill"></i>Explore Services
                    </a>
                    <a href="{{ url('/contact') }}" class="btn-hero-outline">
                        <i class="bi bi-chat-text"></i>Let's Talk
                    </a>
                </div>

                <div class="hero-trust">
                    <div class="hero-trust-item"><i class="bi bi-check-circle-fill"></i> Clean Code</div>
                    <div class="hero-trust-divider"></div>
                    <div class="hero-trust-item"><i class="bi bi-check-circle-fill"></i> On-Time Delivery</div>
                    <div class="hero-trust-divider"></div>
                    <div class="hero-trust-item"><i class="bi bi-check-circle-fill"></i> 99.9% Uptime</div>
                </div>
            </div>

            {{-- Right: Code card --}}
            <div class="col-lg-6">
                <div class="hero-graphic">
                    <div class="hero-code-card">
                        <div class="code-dot-bar">
                            <span class="code-dot code-dot-r"></span>
                            <span class="code-dot code-dot-y"></span>
                            <span class="code-dot code-dot-g"></span>
                        </div>
<span class="code-cm">// fmtserv — crafted with precision</span>
<span class="code-kw">class</span> <span class="code-fn">ProjectBuilder</span> {
  <span class="code-kw">private</span> <span class="code-var">$stack</span> = [
    <span class="code-str">"Laravel"</span>, <span class="code-str">"Vue.js"</span>,
    <span class="code-str">"MySQL"</span>,   <span class="code-str">"Docker"</span>,
  ];

  <span class="code-kw">public function</span> <span class="code-fn">deliver</span>(): <span class="code-var">Project</span>
  {
    <span class="code-kw">return</span> (new <span class="code-fn">Project</span>)
      -><span class="code-fn">withQualityCode</span>()
      -><span class="code-fn">onSchedule</span>()
      -><span class="code-fn">withSupport</span>(<span class="code-num">24</span><span class="code-op">_</span><span class="code-num">7</span>)
      -><span class="code-fn">deploy</span>();
  }
}
                    </div>

                    <div class="hero-stat-chip chip-1">
                        <div class="chip-icon bg-success bg-opacity-20 text-success">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <div>
                            <div class="chip-val">50+</div>
                            <div class="chip-label">Projects<br>Delivered</div>
                        </div>
                    </div>

                    <div class="hero-stat-chip chip-2">
                        <div class="chip-icon bg-warning bg-opacity-20 text-warning">
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <div>
                            <div class="chip-val">5.0</div>
                            <div class="chip-label">Client<br>Rating</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ===== TECH STACK STRIP ===== --}}
<div class="py-4 border-bottom bg-surface">
    <div class="container">
        <div class="d-flex align-items-center flex-wrap gap-3 justify-content-center">
            <span class="text-muted fw-semibold me-2" style="letter-spacing:1px;text-transform:uppercase;font-size:.72rem;">Built with</span>
            <span class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill bg-white fw-semibold" style="border:1px solid #e2e8f0;font-size:.82rem;color:#374151;"><i class="bi bi-filetype-php text-primary"></i>PHP 8</span>
            <span class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill bg-white fw-semibold" style="border:1px solid #e2e8f0;font-size:.82rem;color:#374151;"><i class="bi bi-bootstrap text-purple" style="color:#7c3aed;"></i>Laravel</span>
            <span class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill bg-white fw-semibold" style="border:1px solid #e2e8f0;font-size:.82rem;color:#374151;"><i class="bi bi-database text-primary"></i>MySQL</span>
            <span class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill bg-white fw-semibold" style="border:1px solid #e2e8f0;font-size:.82rem;color:#374151;"><i class="bi bi-bootstrap" style="color:#7952b3;"></i>Bootstrap 5</span>
            <span class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill bg-white fw-semibold" style="border:1px solid #e2e8f0;font-size:.82rem;color:#374151;"><i class="bi bi-cloud-check text-cyan" style="color:#06b6d4;"></i>REST API</span>
            <span class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill bg-white fw-semibold" style="border:1px solid #e2e8f0;font-size:.82rem;color:#374151;"><i class="bi bi-git" style="color:#f1502f;"></i>Git / CI</span>
        </div>
    </div>
</div>

{{-- ===== SERVICES OVERVIEW ===== --}}
<section class="section-py bg-white">
    <div class="container">

        <div class="text-center mb-5">
            <div class="section-eyebrow">What We Do</div>
            <h2 class="section-title">Our Core Services</h2>
            <p class="section-sub mt-2 mx-auto">
                From polished landing pages to complex enterprise platforms — we cover every layer of the stack.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-lg-4 col-md-6">
                <div class="service-card accent-blue">
                    <div class="service-icon-wrap bg-primary bg-opacity-10 text-primary">
                        <i class="bi bi-code-slash"></i>
                    </div>
                    <h5>Web Development</h5>
                    <p>Responsive, blazing-fast websites built with semantic HTML, modern CSS, and SEO best practices baked in.</p>
                    <a href="{{ url('/services') }}" class="service-card-link">Learn more <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="service-card accent-violet">
                    <div class="service-icon-wrap" style="background:rgba(124,58,237,.1);color:#7c3aed;">
                        <i class="bi bi-layers"></i>
                    </div>
                    <h5>Full Stack Development</h5>
                    <p>End-to-end app development — frontend, backend, database design, and cloud deployment in one package.</p>
                    <a href="{{ url('/services') }}" class="service-card-link">Learn more <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="service-card accent-cyan">
                    <div class="service-icon-wrap" style="background:rgba(6,182,212,.1);color:#06b6d4;">
                        <i class="bi bi-phone"></i>
                    </div>
                    <h5>Frontend Development</h5>
                    <p>Pixel-perfect, accessible UIs crafted for every screen — from mobile to widescreen displays.</p>
                    <a href="{{ url('/services') }}" class="service-card-link">Learn more <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="service-card accent-green">
                    <div class="service-icon-wrap" style="background:rgba(16,185,129,.1);color:#10b981;">
                        <i class="bi bi-server"></i>
                    </div>
                    <h5>Backend Development</h5>
                    <p>High-performance APIs, secure authentication, and scalable server-side architecture built for growth.</p>
                    <a href="{{ url('/services') }}" class="service-card-link">Learn more <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="service-card accent-orange">
                    <div class="service-icon-wrap" style="background:rgba(245,158,11,.1);color:#f59e0b;">
                        <i class="bi bi-filetype-php"></i>
                    </div>
                    <h5>PHP / Laravel</h5>
                    <p>Custom Laravel applications, CMS platforms, REST APIs, and admin dashboards — built the right way.</p>
                    <a href="{{ url('/services') }}" class="service-card-link">Learn more <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="service-card accent-pink">
                    <div class="service-icon-wrap" style="background:rgba(236,72,153,.1);color:#ec4899;">
                        <i class="bi bi-cloud-arrow-up"></i>
                    </div>
                    <h5>Website Hosting</h5>
                    <p>Managed hosting with SSL certificates, automated backups, and a 99.9% uptime guarantee.</p>
                    <a href="{{ url('/services') }}" class="service-card-link">Learn more <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

        </div>

        <div class="text-center mt-5">
            <a href="{{ url('/services') }}" class="btn btn-primary btn-lg rounded-pill px-5 fw-semibold"
               style="background:linear-gradient(135deg,#2563eb,#7c3aed);border:none;box-shadow:0 8px 24px rgba(37,99,235,.3);">
                View All Services <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>

    </div>
</section>

{{-- ===== WHY CHOOSE US ===== --}}
<section class="section-py bg-gradient-section">
    <div class="container">
        <div class="row align-items-center g-5">

            <div class="col-lg-5">
                <div class="section-eyebrow">Why fmtserv?</div>
                <h2 class="section-title mt-1 mb-3">We Build for Real-World Results</h2>
                <p class="section-sub">
                    We don't just write code — we build solutions. Every project is approached
                    with clarity, accountability, and a commitment to measurable value.
                </p>
                <ul class="feature-list mt-4">
                    <li><i class="bi bi-check-circle-fill"></i> Clear communication throughout every project</li>
                    <li><i class="bi bi-check-circle-fill"></i> No surprise scope changes or hidden costs</li>
                    <li><i class="bi bi-check-circle-fill"></i> Code you can maintain and build upon</li>
                    <li><i class="bi bi-check-circle-fill"></i> Post-launch support included</li>
                </ul>
                <a href="{{ url('/about') }}" class="btn btn-primary rounded-pill px-4 mt-4 fw-semibold"
                   style="background:linear-gradient(135deg,#2563eb,#7c3aed);border:none;">
                    About fmtserv <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>

            <div class="col-lg-7">
                <div class="row g-3">

                    <div class="col-sm-6">
                        <div class="why-card">
                            <div class="why-icon bg-primary bg-opacity-10 text-primary">
                                <i class="bi bi-patch-check-fill"></i>
                            </div>
                            <div>
                                <h6>Quality Code</h6>
                                <p>Clean, maintainable, and documented code following SOLID principles and best practices.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="why-card">
                            <div class="why-icon" style="background:rgba(16,185,129,.1);color:#10b981;">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <div>
                                <h6>On-Time Delivery</h6>
                                <p>Milestones are set and met. We respect your timeline and business schedule.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="why-card">
                            <div class="why-icon" style="background:rgba(245,158,11,.1);color:#f59e0b;">
                                <i class="bi bi-headset"></i>
                            </div>
                            <div>
                                <h6>Dedicated Support</h6>
                                <p>Post-launch maintenance and support to keep your product running smoothly.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="why-card">
                            <div class="why-icon" style="background:rgba(6,182,212,.1);color:#06b6d4;">
                                <i class="bi bi-shield-lock-fill"></i>
                            </div>
                            <div>
                                <h6>Security First</h6>
                                <p>All applications follow OWASP guidelines — secure by design, not as an afterthought.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

{{-- ===== STATS ===== --}}
<section class="stats-section">
    <div class="container position-relative">
        <div class="row g-0 text-center">

            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="stat-icon"><i class="bi bi-code-square"></i></span>
                    <span class="stat-number">50+</span>
                    <div class="stat-label">Projects Delivered</div>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="stat-icon"><i class="bi bi-people"></i></span>
                    <span class="stat-number">30+</span>
                    <div class="stat-label">Happy Clients</div>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="stat-icon"><i class="bi bi-calendar-check"></i></span>
                    <span class="stat-number">5+</span>
                    <div class="stat-label">Years Experience</div>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="stat-icon"><i class="bi bi-cloud-check"></i></span>
                    <span class="stat-number">99%</span>
                    <div class="stat-label">Uptime SLA</div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ===== PROCESS ===== --}}
<section class="section-py bg-white">
    <div class="container">

        <div class="text-center mb-5">
            <div class="section-eyebrow">How We Work</div>
            <h2 class="section-title">Simple &amp; Transparent Process</h2>
            <p class="section-sub mt-2 mx-auto">
                From first conversation to live deployment — here is how we bring your project to life.
            </p>
        </div>

        <div class="row g-4 justify-content-center">

            <div class="col-lg-3 col-sm-6 process-connector">
                <div class="process-step">
                    <div class="process-step-num"><i class="bi bi-chat-quote"></i></div>
                    <h5>1. Discover</h5>
                    <p>We learn your goals, requirements, and constraints in a free discovery call.</p>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 process-connector">
                <div class="process-step">
                    <div class="process-step-num"><i class="bi bi-layout-text-window"></i></div>
                    <h5>2. Plan</h5>
                    <p>We map out the architecture, timeline, and deliverables — no surprises.</p>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 process-connector">
                <div class="process-step">
                    <div class="process-step-num"><i class="bi bi-terminal"></i></div>
                    <h5>3. Build</h5>
                    <p>We write clean, tested code and keep you updated with regular progress reports.</p>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="process-step">
                    <div class="process-step-num"><i class="bi bi-rocket-takeoff"></i></div>
                    <h5>4. Launch</h5>
                    <p>We deploy, test in production, and stay on-hand to handle anything that comes up.</p>
                </div>
            </div>

        </div>

    </div>
</section>

{{-- ===== CALL TO ACTION ===== --}}
<section class="cta-section text-center">
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-eyebrow justify-content-center" style="color:var(--brand-accent);">Start Today</div>
                <h2 class="mb-3 mt-2">Ready to Build Something Great?</h2>
                <p class="mb-4">
                    Tell us about your project and let's make it happen.
                    No commitment required — just a conversation.
                </p>
                <div class="d-flex justify-content-center flex-wrap gap-3">
                    <a href="{{ url('/contact') }}" class="btn-hero-primary">
                        <i class="bi bi-send"></i>Contact Us Today
                    </a>
                    <a href="{{ url('/services') }}" class="btn-hero-outline">
                        <i class="bi bi-grid-3x3-gap"></i>Browse Services
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection