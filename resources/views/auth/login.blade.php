@extends('layouts.frontend')

@section('title', 'Login')

@section('styles')
<style>
    body { background: linear-gradient(135deg, #1a1f36 0%, #2d3561 100%); min-height: 100vh; }
    .auth-card { border-radius: 16px; overflow: hidden; }
    .auth-brand { font-size: 1.8rem; font-weight: 700; color: #fff; }
</style>
@endsection

@section('content')
<div class="d-flex align-items-center justify-content-center" style="min-height: calc(100vh - 60px);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="text-center mb-4">
                    <div class="auth-brand"><i class="bi bi-building me-2"></i>OfficeMgmt</div>
                    <p class="text-white-50 mt-1">Sign in to your account</p>
                </div>
                <div class="card auth-card shadow-lg">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold mb-4 text-center">Welcome Back</h5>

                        @if($errors->any())
                            <div class="alert alert-danger py-2">
                                <ul class="mb-0 ps-3">
                                    @foreach($errors->all() as $error)
                                        <li class="small">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold small">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" placeholder="you@example.com" required autofocus>
                                </div>
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold small">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="password" name="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="••••••••" required>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label small" for="remember">Remember me</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 fw-semibold">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                            </button>
                        </form>
                    </div>
                    <div class="card-footer bg-light text-center py-3">
                        <span class="small text-muted">Don't have an account?</span>
                        <a href="{{ route('register') }}" class="small fw-semibold ms-1">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
