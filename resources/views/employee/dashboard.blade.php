@extends('layouts.backend')

@section('title', 'My Dashboard')

@section('content')

<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card h-100 p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon bg-primary bg-opacity-10 text-primary"><i class="bi bi-calendar-check-fill"></i></div>
                <div>
                    <div class="text-muted small">Present This Month</div>
                    <div class="fw-bold fs-4">{{ $presentDays ?? 0 }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card h-100 p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon bg-danger bg-opacity-10 text-danger"><i class="bi bi-calendar2-x-fill"></i></div>
                <div>
                    <div class="text-muted small">Absent This Month</div>
                    <div class="fw-bold fs-4">{{ $absentDays ?? 0 }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card h-100 p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon bg-warning bg-opacity-10 text-warning"><i class="bi bi-hourglass-split"></i></div>
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
                <div class="stat-icon bg-success bg-opacity-10 text-success"><i class="bi bi-cash-coin"></i></div>
                <div>
                    <div class="text-muted small">Last Net Salary</div>
                    <div class="fw-bold fs-4">${{ number_format($lastSalary ?? 0, 2) }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    {{-- Recent Attendance --}}
    <div class="col-lg-7">
        <div class="card h-100">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 px-4">
                <h6 class="mb-0 fw-bold"><i class="bi bi-calendar-check me-2 text-primary"></i>Recent Attendance</h6>
                <a href="{{ route('employee.attendances.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle">
                        <thead>
                            <tr>
                                <th class="ps-4">Date</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Hours</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentAttendances ?? [] as $att)
                            <tr>
                                <td class="ps-4 small">{{ $att->attendance_date->format('d M Y') }}</td>
                                <td class="small">{{ $att->check_in ?? '—' }}</td>
                                <td class="small">{{ $att->check_out ?? '—' }}</td>
                                <td class="small">{{ $att->working_hours ?? '—' }}</td>
                                <td>
                                    @php
                                        $badgeColor = match($att->status) {
                                            'present' => 'success',
                                            'absent'  => 'danger',
                                            'late'    => 'warning',
                                            'half_day'=> 'info',
                                            default   => 'secondary'
                                        };
                                    @endphp
                                    <span class="badge bg-{{ $badgeColor }}">{{ ucfirst($att->status) }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="5" class="text-center text-muted py-4">No attendance records found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- My Leave Requests --}}
    <div class="col-lg-5">
        <div class="card h-100">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 px-4">
                <h6 class="mb-0 fw-bold"><i class="bi bi-calendar-x me-2 text-warning"></i>My Leaves</h6>
                <a href="{{ route('employee.leaves.create') }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-plus"></i> Apply
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle">
                        <thead>
                            <tr>
                                <th class="ps-4">Type</th>
                                <th>From</th>
                                <th>Days</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentLeaves ?? [] as $leave)
                            <tr>
                                <td class="ps-4 small">{{ ucfirst($leave->leave_type) }}</td>
                                <td class="small">{{ $leave->start_date->format('d M') }}</td>
                                <td class="small">{{ $leave->total_days }}</td>
                                <td>
                                    @php
                                        $leaveBadge = match($leave->status) {
                                            'approved' => 'success',
                                            'rejected' => 'danger',
                                            'cancelled'=> 'secondary',
                                            default    => 'warning'
                                        };
                                    @endphp
                                    <span class="badge bg-{{ $leaveBadge }}">{{ ucfirst($leave->status) }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center text-muted py-4">No leave records.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
