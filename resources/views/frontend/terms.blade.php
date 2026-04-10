@extends('layouts.frontend')

@section('title', 'Terms & Conditions')
@section('meta_description', 'Read the fmtserv terms and conditions governing the use of our website and services.')

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<section class="page-header">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Terms &amp; Conditions</li>
            </ol>
        </nav>
        <h1>Terms &amp; Conditions</h1>
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
                    <a href="#tc-acceptance">1. Acceptance of Terms</a>
                    <a href="#tc-services">2. Description of Services</a>
                    <a href="#tc-obligations">3. Client Obligations</a>
                    <a href="#tc-ip">4. Intellectual Property</a>
                    <a href="#tc-payment">5. Payment Terms</a>
                    <a href="#tc-revisions">6. Revisions &amp; Scope Changes</a>
                    <a href="#tc-liability">7. Limitation of Liability</a>
                    <a href="#tc-warranty">8. Warranties &amp; Disclaimers</a>
                    <a href="#tc-termination">9. Termination</a>
                    <a href="#tc-governing">10. Governing Law</a>
                    <a href="#tc-contact">11. Contact Information</a>
                </div>

                <div class="legal-content">

                    <h2 id="tc-acceptance">1. Acceptance of Terms</h2>
                    <p>
                        By accessing or using the website at <a href="https://fmtserv.com">fmtserv.com</a>
                        or engaging fmtserv for any services, you agree to be bound by these Terms and
                        Conditions. If you do not agree to these terms, please do not use our website
                        or engage our services.
                    </p>
                    <p>
                        These terms apply to all visitors, clients, and others who access or use our
                        services. We reserve the right to update these terms at any time, and your
                        continued use of our services constitutes acceptance of any changes.
                    </p>

                    <h2 id="tc-services">2. Description of Services</h2>
                    <p>fmtserv provides professional digital services including but not limited to:</p>
                    <ul>
                        <li>Web development (frontend and backend)</li>
                        <li>Full stack application development</li>
                        <li>PHP and Laravel development</li>
                        <li>Software engineering and consulting</li>
                        <li>Website hosting setup and support</li>
                    </ul>
                    <p>
                        The specific scope of any service engagement will be defined in a separate
                        project agreement, proposal, or statement of work agreed upon by both parties.
                    </p>

                    <h2 id="tc-obligations">3. Client Obligations</h2>
                    <p>As a client, you agree to:</p>
                    <ul>
                        <li>Provide accurate and complete project requirements in a timely manner</li>
                        <li>Supply any necessary materials, assets, content, or credentials promptly</li>
                        <li>Notify us of any changes to requirements as soon as possible</li>
                        <li>Review and provide feedback on deliverables within agreed timeframes</li>
                        <li>Make payments according to the agreed payment schedule</li>
                        <li>Not use our services for any unlawful, harmful, or deceptive purposes</li>
                    </ul>

                    <h2 id="tc-ip">4. Intellectual Property</h2>
                    <p>
                        Upon receipt of full payment, fmtserv grants the client full ownership of all
                        custom code and deliverables created specifically for the client's project,
                        unless otherwise agreed in writing.
                    </p>
                    <p>
                        fmtserv retains the right to use general methodologies, frameworks, libraries,
                        tools, and knowledge developed during the project in future work for other clients.
                    </p>
                    <p>
                        Third-party components, open-source libraries, and frameworks used in the project
                        remain subject to their respective licenses. The client is responsible for
                        compliance with those licenses.
                    </p>
                    <p>
                        fmtserv may reference the project in its portfolio unless explicitly requested
                        otherwise in writing by the client.
                    </p>

                    <h2 id="tc-payment">5. Payment Terms</h2>
                    <ul>
                        <li>Payment terms will be outlined in the project proposal or agreement</li>
                        <li>A deposit may be required before work commences, as specified per project</li>
                        <li>Final deliverables or access to hosted services may be withheld until full payment is received</li>
                        <li>Late payments may result in work being paused until the outstanding balance is settled</li>
                        <li>All prices are quoted in the currency specified in the project agreement</li>
                    </ul>

                    <h2 id="tc-revisions">6. Revisions &amp; Scope Changes</h2>
                    <p>
                        The number of revision rounds included in a project will be specified in the
                        project agreement. Revisions that fall within the original scope are included
                        at no extra cost.
                    </p>
                    <p>
                        Requests that expand or change the original project scope (including new features,
                        significant design changes, or additional functionality) will be treated as
                        change requests and may incur additional charges. We will notify you and obtain
                        approval before proceeding with any out-of-scope work.
                    </p>

                    <h2 id="tc-liability">7. Limitation of Liability</h2>
                    <p>
                        To the fullest extent permitted by law, fmtserv shall not be liable for any
                        indirect, incidental, special, consequential, or punitive damages arising from
                        the use of our services or website.
                    </p>
                    <p>
                        Our total liability to you for any claim arising under these terms shall not
                        exceed the total amount paid by you to fmtserv for the specific service giving
                        rise to the claim.
                    </p>

                    <h2 id="tc-warranty">8. Warranties &amp; Disclaimers</h2>
                    <p>
                        fmtserv warrants that services will be performed with reasonable skill and care
                        in accordance with professionally accepted standards.
                    </p>
                    <p>
                        However, our website and services are provided "as is" without any warranty of
                        uninterrupted availability, freedom from errors, or fitness for any particular
                        purpose beyond what is explicitly agreed. We do not guarantee specific outcomes
                        such as search engine rankings or business results.
                    </p>

                    <h2 id="tc-termination">9. Termination</h2>
                    <p>
                        Either party may terminate a project engagement by providing written notice.
                        Upon termination, the client will be invoiced for all work completed up to
                        the termination date, and any applicable deposit may be forfeited as per the
                        project agreement.
                    </p>
                    <p>
                        fmtserv reserves the right to refuse or discontinue service to any party
                        that violates these terms or engages in behaviour we deem harmful or unethical.
                    </p>

                    <h2 id="tc-governing">10. Governing Law</h2>
                    <p>
                        These Terms and Conditions shall be governed by and construed in accordance
                        with applicable laws. Any disputes arising from these terms or the use of
                        our services shall be resolved through good-faith negotiation in the first
                        instance.
                    </p>

                    <h2 id="tc-contact">11. Contact Information</h2>
                    <p>
                        If you have any questions regarding these Terms and Conditions, please contact us:
                    </p>
                    <ul>
                        <li>Email: <a href="mailto:info@fmtserv.com">info@fmtserv.com</a></li>
                        <li>Website: <a href="https://fmtserv.com" target="_blank" rel="noopener">fmtserv.com</a></li>
                    </ul>

                </div>

                {{-- Bottom nav --}}
                <div class="d-flex flex-wrap gap-3 mt-5 pt-4 border-top">
                    <a href="{{ url('/privacy') }}" class="btn btn-outline-primary rounded-pill">
                        <i class="bi bi-shield-check me-2"></i>Privacy Policy
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
