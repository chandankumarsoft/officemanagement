{{-- resources/views/layouts/partials/sidebar.blade.php --}}
<div class="sidebar" id="sidebar">
    <div class="brand">
        <a href="#"><i class="bi bi-building me-2"></i>OfficeMgmt</a>
    </div>
    <nav class="mt-2 pb-4">
        @auth
            @if(auth()->user()->role === 'admin')
                <div class="nav-section">Main</div>
                <a href="{{ route('admin.dashboard') }}"
                   class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>

                <div class="nav-section">Management</div>
                <a href="{{ route('admin.departments.index') }}"
                   class="nav-link {{ request()->routeIs('admin.departments.*') ? 'active' : '' }}">
                    <i class="bi bi-diagram-3"></i> Departments
                </a>
                <a href="{{ route('admin.employees.index') }}"
                   class="nav-link {{ request()->routeIs('admin.employees.*') ? 'active' : '' }}">
                    <i class="bi bi-people"></i> Employees
                </a>

                <div class="nav-section">Operations</div>
                <a href="{{ route('admin.attendances.index') }}"
                   class="nav-link {{ request()->routeIs('admin.attendances.*') ? 'active' : '' }}">
                    <i class="bi bi-calendar-check"></i> Attendance
                </a>
                <a href="{{ route('admin.leaves.index') }}"
                   class="nav-link {{ request()->routeIs('admin.leaves.*') ? 'active' : '' }}">
                    <i class="bi bi-calendar-x"></i> Leaves
                </a>
                <a href="{{ route('admin.payrolls.index') }}"
                   class="nav-link {{ request()->routeIs('admin.payrolls.*') ? 'active' : '' }}">
                    <i class="bi bi-cash-stack"></i> Payroll
                </a>
                <a href="{{ route('admin.appointments.index') }}"
                   class="nav-link {{ request()->routeIs('admin.appointments.*') ? 'active' : '' }}">
                    <i class="bi bi-calendar-event"></i> Appointments
                </a>

            @elseif(auth()->user()->role === 'hr')
                <div class="nav-section">Main</div>
                <a href="{{ route('hr.dashboard') }}"
                   class="nav-link {{ request()->routeIs('hr.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
                <div class="nav-section">Operations</div>
                <a href="{{ route('hr.leaves.index') }}"
                   class="nav-link {{ request()->routeIs('hr.leaves.*') ? 'active' : '' }}">
                    <i class="bi bi-calendar-x"></i> Leave Requests
                </a>

            @elseif(auth()->user()->role === 'employee')
                <div class="nav-section">Main</div>
                <a href="{{ route('employee.dashboard') }}"
                   class="nav-link {{ request()->routeIs('employee.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
                <div class="nav-section">My Records</div>
                <a href="{{ route('employee.attendances.index') }}"
                   class="nav-link {{ request()->routeIs('employee.attendances.*') ? 'active' : '' }}">
                    <i class="bi bi-calendar-check"></i> My Attendance
                </a>
                <a href="{{ route('employee.leaves.index') }}"
                   class="nav-link {{ request()->routeIs('employee.leaves.*') ? 'active' : '' }}">
                    <i class="bi bi-calendar-x"></i> My Leaves
                </a>
                <a href="{{ route('employee.payrolls.index') }}"
                   class="nav-link {{ request()->routeIs('employee.payrolls.*') ? 'active' : '' }}">
                    <i class="bi bi-cash-stack"></i> My Payroll
                </a>
            @endif
        @endauth
    </nav>
</div>

{{-- Mobile overlay --}}
<div id="sidebarOverlay" class="d-md-none"
     style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:999;transition:.2s;">
</div>
