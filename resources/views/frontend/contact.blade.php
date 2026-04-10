@extends('layouts.frontend')

@section('title', 'Contact Us')
@section('meta_description', 'Get in touch with fmtserv for web development quotes, project inquiries, or general questions.')

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<section class="page-header">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Contact</li>
            </ol>
        </nav>
        <h1>Contact Us</h1>
        <p>Have a project or a question? We'd love to hear from you.</p>
    </div>
</section>

{{-- ===== CONTACT SECTION ===== --}}
<section class="section-py bg-white">
    <div class="container">
        <div class="row g-5">

            {{-- Contact Info --}}
            <div class="col-lg-4">

                <h3 class="fw-bold mb-2">Get in Touch</h3>
                <p class="text-muted mb-4">
                    Fill in the form and we'll get back to you as soon as possible.
                    We typically respond within 24 hours on business days.
                </p>

                <div class="contact-info-item">
                    <div class="ci-icon bg-primary bg-opacity-10 text-primary">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <div>
                        <h6>Email</h6>
                        <p><a href="mailto:info@fmtserv.com" class="text-muted text-decoration-none">info@fmtserv.com</a></p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="ci-icon bg-success bg-opacity-10 text-success">
                        <i class="bi bi-globe"></i>
                    </div>
                    <div>
                        <h6>Website</h6>
                        <p>
                            <a href="https://fmtserv.com" target="_blank" rel="noopener"
                               class="text-muted text-decoration-none">fmtserv.com</a>
                        </p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="ci-icon bg-warning bg-opacity-10 text-warning">
                        <i class="bi bi-clock-fill"></i>
                    </div>
                    <div>
                        <h6>Response Time</h6>
                        <p>Within 24 hours on business days</p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="ci-icon bg-info bg-opacity-10 text-info">
                        <i class="bi bi-chat-left-dots-fill"></i>
                    </div>
                    <div>
                        <h6>What to Include</h6>
                        <p>Project type, timeline, and any relevant details to help us assist you faster.</p>
                    </div>
                </div>

            </div>

            {{-- Contact Form --}}
            <div class="col-lg-8">
                <div class="contact-card">

                    <h4 class="fw-bold mb-1">Send Us a Message</h4>
                    <p class="text-muted small mb-4">All fields are required unless marked optional.</p>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ url('/contact') }}" method="POST" novalidate>
                        @csrf

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label for="name" class="form-label fw-semibold">Full Name</label>
                                <input type="text" id="name" name="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       value="{{ old('name') }}"
                                       placeholder="John Smith">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label fw-semibold">Email Address</label>
                                <input type="email" id="email" name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}"
                                       placeholder="john@example.com">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="subject" class="form-label fw-semibold">Subject <span class="text-muted fw-normal">(optional)</span></label>
                                <input type="text" id="subject" name="subject"
                                       class="form-control @error('subject') is-invalid @enderror"
                                       value="{{ old('subject') }}"
                                       placeholder="e.g. Laravel project inquiry">
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="service" class="form-label fw-semibold">Service Interested In <span class="text-muted fw-normal">(optional)</span></label>
                                <select id="service" name="service"
                                        class="form-select @error('service') is-invalid @enderror">
                                    <option value="">— Select a service —</option>
                                    <option value="web_development" {{ old('service') === 'web_development' ? 'selected' : '' }}>Web Development</option>
                                    <option value="full_stack"      {{ old('service') === 'full_stack'      ? 'selected' : '' }}>Full Stack Development</option>
                                    <option value="frontend"        {{ old('service') === 'frontend'        ? 'selected' : '' }}>Frontend Development</option>
                                    <option value="backend"         {{ old('service') === 'backend'         ? 'selected' : '' }}>Backend Development</option>
                                    <option value="software_eng"    {{ old('service') === 'software_eng'    ? 'selected' : '' }}>Software Engineering</option>
                                    <option value="php_laravel"     {{ old('service') === 'php_laravel'     ? 'selected' : '' }}>PHP / Laravel Development</option>
                                    <option value="hosting"         {{ old('service') === 'hosting'         ? 'selected' : '' }}>Website Hosting</option>
                                    <option value="other"           {{ old('service') === 'other'           ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('service')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="message" class="form-label fw-semibold">Message</label>
                                <textarea id="message" name="message" rows="5"
                                          class="form-control @error('message') is-invalid @enderror"
                                          placeholder="Describe your project, requirements, or question…">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 pt-2">
                                <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill">
                                    <i class="bi bi-send me-2"></i>Send Message
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

{{-- ===== FAQ STRIP ===== --}}
<section class="py-5 bg-light-blue">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-4">
                    <span class="section-label">FAQ</span>
                    <h2 class="section-title">Common Questions</h2>
                </div>

                <div class="accordion" id="faqAccordion">

                    <div class="accordion-item border-0 mb-2 rounded-xl overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq1">
                                How quickly will you respond to my inquiry?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                We aim to respond to all inquiries within 24 hours on business days.
                                For urgent requests, please mention it in your message subject.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 mb-2 rounded-xl overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq2">
                                Do you work with international clients?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Yes. We work with clients remotely across different time zones.
                                Communication is primarily via email, with video calls available when needed.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 mb-2 rounded-xl overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq3">
                                What information should I include in my message?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                The more detail, the better. Include your project type, expected timeline,
                                budget range (if known), and any existing designs or requirements documents.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
