@extends('layouts.backend')

@section('title', 'Leave Requests')

@section('content')

<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 px-4">
        <h5 class="mb-0 fw-bold"><i class="bi bi-calendar-x me-2 text-warning"></i>Leave Requests</h5>
    </div>

    {{-- Filter bar --}}
    <div class="filter-bar">
        <form method="GET" action="{{ route('admin.leaves.index') }}" class="d-flex flex-wrap gap-2 w-100">
            <input type="text" name="search" class="form-control form-control-sm" style="max-width:200px"
                placeholder="Search employee…" value="{{ request('search') }}">
            <select name="leave_type" class="form-select form-select-sm" style="max-width:170px">
                <option value="">All Leave Types</option>
                <option value="sick"       {{ request('leave_type') === 'sick'        ? 'selected' : '' }}>Sick Leave</option>
                <option value="casual"     {{ request('leave_type') === 'casual'      ? 'selected' : '' }}>Casual Leave</option>
                <option value="annual"     {{ request('leave_type') === 'annual'      ? 'selected' : '' }}>Annual Leave</option>
                <option value="maternity"  {{ request('leave_type') === 'maternity'   ? 'selected' : '' }}>Maternity</option>
                <option value="paternity"  {{ request('leave_type') === 'paternity'   ? 'selected' : '' }}>Paternity</option>
                <option value="unpaid"     {{ request('leave_type') === 'unpaid'      ? 'selected' : '' }}>Unpaid</option>
            </select>
            <select name="status" class="form-select form-select-sm" style="max-width:150px">
                <option value="">All Status</option>
                <option value="pending"   {{ request('status') === 'pending'   ? 'selected' : '' }}>Pending</option>
                <option value="approved"  {{ request('status') === 'approved'  ? 'selected' : '' }}>Approved</option>
                <option value="rejected"  {{ request('status') === 'rejected'  ? 'selected' : '' }}>Rejected</option>
                <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
            <button class="btn btn-primary btn-sm"><i class="bi bi-search me-1"></i>Filter</button>
            @if(request()->hasAny(['search','leave_type','status']))
            <a href="{{ route('admin.leaves.index') }}" class="btn btn-outline-secondary btn-sm">Clear</a>
            @endif
        </form>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th class="ps-4">#</th>
                        <th>Employee</th>
                        <th>Leave Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Days</th>
                        <th>Applied</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leaves as $leave)
                    <tr>
                        <td class="ps-4 text-muted small">{{ $loop->iteration }}</td>
                        <td class="fw-semibold small">{{ $leave->employee->full_name ?? '—' }}</td>
                        <td class="small">{{ ucfirst(str_replace('_', ' ', $leave->leave_type)) }}</td>
                        <td class="small">{{ $leave->start_date->format('d M Y') }}</td>
                        <td class="small">{{ $leave->end_date->format('d M Y') }}</td>
                        <td class="small">{{ $leave->total_days }}</td>
                        <td class="small text-muted">{{ $leave->created_at->format('d M Y') }}</td>
                        <td>
                            @php
                                $badge = match($leave->status) {
                                    'approved'  => 'success',
                                    'rejected'  => 'danger',
                                    'cancelled' => 'secondary',
                                    default     => 'warning'
                                };
                            @endphp
                            <span class="badge bg-{{ $badge }}">{{ ucfirst($leave->status) }}</span>
                        </td>
                        <td class="text-end pe-4">
                            <a href="{{ route('admin.leaves.show', $leave) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="9" class="text-center text-muted py-5">No leave requests found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if(isset($leaves) && $leaves instanceof \Illuminate\Pagination\LengthAwarePaginator && $leaves->hasPages())
    <div class="card-footer bg-white d-flex justify-content-between align-items-center py-3 px-4">
        <small class="text-muted">Showing {{ $leaves->firstItem() }}–{{ $leaves->lastItem() }} of {{ $leaves->total() }}</small>
        {{ $leaves->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>

@endsection
