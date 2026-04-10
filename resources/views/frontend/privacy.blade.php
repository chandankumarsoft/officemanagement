@extends('layouts.frontend')

@section('title', 'Privacy Policy')
@section('meta_description', 'Read the fmtserv privacy policy to understand how we collect, use, and protect your personal data.')

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<section class="page-header">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Privacy Policy</li>
            </ol>
        </nav>
        <h1>Privacy Policy</h1>
        <p>Last updated: {{ date('d F Y') }}</p>
    </div>
</section>

{{-- ===== CONTENT ===== --}}
<section class="section-py bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                {{-- Table of Contents --}}
                <div class="legal-toc mb-5">
                    <p class="fw-bold mb-3 small text-uppercase" style="letter-spacing:1px;">Table of Contents</p>
                    <a href="#section-intro">1. Introduction</a>
                    <a href="#section-collect">2. Information We Collect</a>
                    <a href="#section-use">3. How We Use Your Information</a>
                    <a href="#section-share">4. Sharing of Information</a>
                    <a href="#section-cookies">5. Cookies &amp; Tracking</a>
                    <a href="#section-security">6. Data Security</a>
                    <a href="#section-rights">7. Your Rights</a>
                    <a href="#section-links">8. Third-Party Links</a>
                    <a href="#section-changes">9. Changes to This Policy</a>
                    <a href="#section-contact">10. Contact Us</a>
                </div>

                <div class="legal-content">

                    <h2 id="section-intro">1. Introduction</h2>
                    <p>
                        Welcome to <strong>fmtserv</strong> ("we", "our", or "us"), operating at
                        <a href="https://fmtserv.com">fmtserv.com</a>. We are committed to protecting
                        your personal data and your right to privacy. This Privacy Policy explains
                        what information we collect, why we collect it, and how we use it when you
                        visit our website or use our services.
                    </p>
                    <p>
                        Please read this policy carefully. If you do not agree with the terms of
                        this policy, please do not access our website.
                    </p>

                    <h2 id="section-collect">2. Information We Collect</h2>
                    <p>We may collect the following types of information:</p>
                    <ul>
                        <li>
                            <strong>Contact information</strong> — When you use our contact form,
                            we collect your name, email address, and any message content you submit.
                        </li>
                        <li>
                            <strong>Usage data</strong> — We may collect information about how you
                            access and use our website, including your IP address, browser type,
                            referring URLs, and pages visited.
                        </li>
                        <li>
                            <strong>Cookies</strong> — Our website may use cookies to improve your
                            experience. See Section 5 for details.
                        </li>
                    </ul>
                    <p>We do not collect sensitive personal information such as payment card details directly through this website.</p>

                    <h2 id="section-use">3. How We Use Your Information</h2>
                    <p>We use the information we collect for the following purposes:</p>
                    <ul>
                        <li>To respond to your inquiries and provide customer support</li>
                        <li>To send you information relevant to your request</li>
                        <li>To improve our website and services</li>
                        <li>To monitor and analyse usage patterns for performance improvements</li>
                        <li>To comply with legal obligations</li>
                    </ul>
                    <p>We will never use your information for unsolicited marketing without your consent.</p>

                    <h2 id="section-share">4. Sharing of Information</h2>
                    <p>
                        We do not sell, trade, or rent your personal information to third parties.
                        We may share information in the following limited circumstances:
                    </p>
                    <ul>
                        <li>
                            <strong>Service providers</strong> — Trusted third-party services (such as
                            email or hosting providers) that help us operate our website, strictly
                            for that purpose only.
                        </li>
                        <li>
                            <strong>Legal requirements</strong> — When required to do so by law, or
                            to protect the rights and safety of fmtserv, our clients, or others.
                        </li>
                    </ul>

                    <h2 id="section-cookies">5. Cookies &amp; Tracking</h2>
                    <p>
                        Cookies are small text files stored on your device by your browser.
                        Our website may use cookies to:
                    </p>
                    <ul>
                        <li>Remember your session preferences</li>
                        <li>Understand how visitors interact with our website</li>
                        <li>Improve the overall user experience</li>
                    </ul>
                    <p>
                        You can control or disable cookies through your browser settings.
                        Note that disabling cookies may affect certain features of our website.
                    </p>

                    <h2 id="section-security">6. Data Security</h2>
                    <p>
                        We take the security of your personal data seriously. We implement appropriate
                        technical and organisational measures to protect your information from unauthorised
                        access, disclosure, alteration, or destruction.
                    </p>
                    <p>
                        However, no method of transmission over the internet is 100% secure. While we
                        strive to use commercially acceptable means to protect your data, we cannot
                        guarantee its absolute security.
                    </p>

                    <h2 id="section-rights">7. Your Rights</h2>
                    <p>Depending on your location, you may have the right to:</p>
                    <ul>
                        <li>Access the personal data we hold about you</li>
                        <li>Request correction of inaccurate information</li>
                        <li>Request deletion of your personal data</li>
                        <li>Object to or restrict certain processing of your data</li>
                        <li>Withdraw consent at any time where processing is based on consent</li>
                    </ul>
                    <p>To exercise any of these rights, please contact us at <a href="mailto:info@fmtserv.com">info@fmtserv.com</a>.</p>

                    <h2 id="section-links">8. Third-Party Links</h2>
                    <p>
                        Our website may contain links to third-party websites. We are not responsible
                        for the privacy practices of those sites. We encourage you to read the privacy
                        policy of every website you visit.
                    </p>

                    <h2 id="section-changes">9. Changes to This Policy</h2>
                    <p>
                        We may update this Privacy Policy from time to time. The updated version will
                        be indicated by a revised date at the top of this page. We encourage you to
                        review this policy periodically.
                    </p>

                    <h2 id="section-contact">10. Contact Us</h2>
                    <p>
                        If you have any questions, concerns, or requests regarding this Privacy Policy,
                        please contact us:
                    </p>
                    <ul>
                        <li>Email: <a href="mailto:info@fmtserv.com">info@fmtserv.com</a></li>
                        <li>Website: <a href="https://fmtserv.com" target="_blank" rel="noopener">fmtserv.com</a></li>
                    </ul>

                </div>

                {{-- Bottom nav --}}
                <div class="d-flex flex-wrap gap-3 mt-5 pt-4 border-top">
                    <a href="{{ url('/terms') }}" class="btn btn-outline-primary rounded-pill">
                        <i class="bi bi-file-text me-2"></i>Terms &amp; Conditions
                    </a>
                    <a href="{{ url('/contact') }}" class="btn btn-outline-secondary rounded-pill">
                        <i class="bi bi-envelope me-2"></i>Contact Us
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
