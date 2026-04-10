@extends('layouts.backend')

@section('title', 'Admin Dashboard')

@section('content')

<div class="row g-4 mb-4">
    {{-- Stat Cards --}}
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card h-100 p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon bg-primary bg-opacity-10 text-primary"><i class="bi bi-people-fill"></i></div>
                <div>
                    <div class="text-muted small">Total Employees</div>
                    <div class="fw-bold fs-4">{{ $totalEmployees ?? 0 }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card h-100 p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon bg-success bg-opacity-10 text-success"><i class="bi bi-diagram-3-fill"></i></div>
                <div>
                    <div class="text-muted small">Departments</div>
                    <div class="fw-bold fs-4">{{ $totalDepartments ?? 0 }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card h-100 p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon bg-warning bg-opacity-10 text-warning"><i class="bi bi-calendar-x-fill"></i></div>
                <div>
                    <div class="text-muted small">Pending Leaves</div>
                    <div class="fw-bold fs-4">{{ $pendingLeaves ?? 0 }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card h-100 p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon bg-info bg-opacity-10 text-info"><i class="bi bi-cash-stack"></i></div>
                <div>
                    <div class="text-muted small">Payrolls This Month</div>
                    <div class="fw-bold fs-4">{{ $payrollsThisMonth ?? 0 }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    {{-- Recent Employees --}}
    <div class="col-lg-7">
        <div class="card h-100">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 px-4">
                <h6 class="mb-0 fw-bold"><i class="bi bi-people me-2 text-primary"></i>Recent Employees</h6>
                <a href="{{ route('admin.employees.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle">
                        <thead>
                            <tr>
                                <th class="ps-4">Name</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentEmployees ?? [] as $employee)
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-semibold small">{{ $employee->full_name }}</div>
                                    <div class="text-muted" style="font-size:0.78rem">{{ $employee->employee_code }}</div>
                                </td>
                                <td class="small">{{ $employee->department->name ?? '—' }}</td>
                                <td class="small">{{ $employee->designation }}</td>
                                <td>
                                    <span class="badge {{ $employee->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                        {{ ucfirst($employee->status) }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center text-muted py-4">No employees found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Pending Leave Requests --}}
    <div class="col-lg-5">
        <div class="card h-100">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 px-4">
                <h6 class="mb-0 fw-bold"><i class="bi bi-calendar-x me-2 text-warning"></i>Pending Leaves</h6>
                <a href="{{ route('admin.leaves.index') }}" class="btn btn-sm btn-outline-warning">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle">
                        <thead>
                            <tr>
                                <th class="ps-4">Employee</th>
                                <th>Type</th>
                                <th>Days</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pendingLeaveRequests ?? [] as $leave)
                            <tr>
                                <td class="ps-4 small fw-semibold">{{ $leave->employee->full_name ?? '—' }}</td>
                                <td class="small">{{ ucfirst($leave->leave_type) }}</td>
                                <td class="small">{{ $leave->total_days }}</td>
                                <td>
                                    <a href="{{ route('admin.leaves.show', $leave) }}" class="btn btn-xs btn-sm btn-outline-primary py-0 px-2" style="font-size:0.75rem">Review</a>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center text-muted py-4">No pending requests.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
