@extends('layouts.frontend')

@section('title', 'Register')

@section('styles')
<style>
    body { background: linear-gradient(135deg, #1a1f36 0%, #2d3561 100%); min-height: 100vh; }
    .auth-card { border-radius: 16px; overflow: hidden; }
    .auth-brand { font-size: 1.8rem; font-weight: 700; color: #fff; }
</style>
@endsection

@section('content')
<div class="d-flex align-items-center justify-content-center py-5" style="min-height: calc(100vh - 60px);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="text-center mb-4">
                    <div class="auth-brand"><i class="bi bi-building me-2"></i>OfficeMgmt</div>
                    <p class="text-white-50 mt-1">Create your account</p>
                </div>
                <div class="card auth-card shadow-lg">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold mb-4 text-center">Register Account</h5>

                        @if($errors->any())
                            <div class="alert alert-danger py-2">
                                <ul class="mb-0 ps-3">
                                    @foreach($errors->all() as $error)
                                        <li class="small">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('register') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold small">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" placeholder="John Doe" required autofocus>
                                </div>
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold small">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" placeholder="you@example.com" required>
                                </div>
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold small">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="password" name="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Min. 8 characters" required>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label fw-semibold small">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control" placeholder="Re-enter password" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 fw-semibold">
                                <i class="bi bi-person-plus me-2"></i>Create Account
                            </button>
                        </form>
                    </div>
                    <div class="card-footer bg-light text-center py-3">
                        <span class="small text-muted">Already have an account?</span>
                        <a href="{{ route('login') }}" class="small fw-semibold ms-1">Sign In</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
