@extends('layouts.backend')

@section('title', 'HR Dashboard')

@section('content')

<div class="row g-4 mb-4">
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
                <div class="stat-icon bg-warning bg-opacity-10 text-warning"><i class="bi bi-clock-history"></i></div>
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
                <div class="stat-icon bg-success bg-opacity-10 text-success"><i class="bi bi-check-circle-fill"></i></div>
                <div>
                    <div class="text-muted small">Approved Leaves</div>
                    <div class="fw-bold fs-4">{{ $approvedLeaves ?? 0 }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card h-100 p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon bg-danger bg-opacity-10 text-danger"><i class="bi bi-x-circle-fill"></i></div>
                <div>
                    <div class="text-muted small">Rejected Leaves</div>
                    <div class="fw-bold fs-4">{{ $rejectedLeaves ?? 0 }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 px-4">
        <h6 class="mb-0 fw-bold"><i class="bi bi-calendar-x me-2 text-warning"></i>Pending Leave Requests</h6>
        <a href="{{ route('hr.leaves.index') }}" class="btn btn-sm btn-outline-warning">View All</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th class="ps-4">Employee</th>
                        <th>Leave Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Days</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendingLeaveRequests ?? [] as $leave)
                    <tr>
                        <td class="ps-4 fw-semibold small">{{ $leave->employee->full_name ?? '—' }}</td>
                        <td class="small">{{ ucfirst($leave->leave_type) }}</td>
                        <td class="small">{{ $leave->start_date->format('d M Y') }}</td>
                        <td class="small">{{ $leave->end_date->format('d M Y') }}</td>
                        <td class="small">{{ $leave->total_days }}</td>
                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                        <td>
                            <a href="{{ route('hr.leaves.show', $leave) }}" class="btn btn-sm btn-outline-primary py-0 px-2" style="font-size:0.78rem">Review</a>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center text-muted py-4">No pending leave requests.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
