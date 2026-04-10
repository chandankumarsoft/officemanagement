{{-- resources/views/layouts/partials/topbar.blade.php --}}
<div class="topbar d-flex align-items-center justify-content-between gap-3">

    {{-- Mobile menu toggle --}}
    <button class="btn btn-light btn-sm d-md-none" id="menuToggle" aria-label="Toggle menu">
        <i class="bi bi-list fs-5"></i>
    </button>

    {{-- Page title --}}
    <div class="page-title d-none d-md-block">@yield('title', config('app.name'))</div>

    <div class="d-flex align-items-center gap-3 ms-auto">
        @auth
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-primary text-capitalize">{{ auth()->user()->role }}</span>
                <span class="text-muted small d-none d-sm-inline">
                    <i class="bi bi-person-circle me-1"></i>{{ auth()->user()->name }}
                </span>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="d-inline mb-0">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm">
                    <i class="bi bi-box-arrow-right me-1"></i>
                    <span class="d-none d-sm-inline">Logout</span>
                </button>
            </form>
        @endauth
    </div>

</div>
