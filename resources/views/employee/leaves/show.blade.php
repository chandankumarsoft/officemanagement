@extends('layouts.backend')

@section('title', 'Leave Details')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header bg-white d-flex align-items-center gap-2 py-3 px-4">
                <a href="{{ route('employee.leaves.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
                <h5 class="mb-0 fw-bold"><i class="bi bi-calendar-x me-2 text-warning"></i>Leave Request</h5>
                <span class="ms-auto badge {{ match($leave->status) { 'approved' => 'bg-success', 'rejected' => 'bg-danger', 'cancelled' => 'bg-secondary', default => 'bg-warning text-dark' } }}">
                    {{ ucfirst($leave->status) }}
                </span>
            </div>
            <div class="card-body p-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="small text-muted mb-1">Leave Type</div>
                        <div class="fw-semibold">{{ ucfirst(str_replace('_', ' ', $leave->leave_type)) }}</div>
                    </div>
                    <div class="col-md-3">
                        <div class="small text-muted mb-1">From</div>
                        <div class="fw-semibold">{{ $leave->start_date->format('d M Y') }}</div>
                    </div>
                    <div class="col-md-3">
                        <div class="small text-muted mb-1">To</div>
                        <div class="fw-semibold">{{ $leave->end_date->format('d M Y') }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="small text-muted mb-1">Total Days</div>
                        <div class="fw-semibold">{{ $leave->total_days }} day(s)</div>
                    </div>
                    <div class="col-md-4">
                        <div class="small text-muted mb-1">Applied On</div>
                        <div class="fw-semibold">{{ $leave->created_at->format('d M Y') }}</div>
                    </div>
                    <div class="col-12">
                        <div class="small text-muted mb-1">Reason</div>
                        <div>{{ $leave->reason }}</div>
                    </div>
                    @if($leave->approval_remarks)
                    <div class="col-12">
                        <div class="small text-muted mb-1">Remarks from HR/Admin</div>
                        <div class="p-3 bg-light rounded">{{ $leave->approval_remarks }}</div>
                    </div>
                    @endif
                    @if($leave->approved_by)
                    <div class="col-md-6">
                        <div class="small text-muted mb-1">Reviewed By</div>
                        <div class="fw-semibold">{{ $leave->approvedBy->name ?? '—' }}</div>
                    </div>
                    @endif
                </div>

                @if($leave->status === 'pending')
                <div class="mt-4">
                    <form action="{{ route('employee.leaves.cancel', $leave) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Are you sure you want to cancel this request?')">
                        @csrf
                        <button class="btn btn-outline-danger btn-sm">
                            <i class="bi bi-x-circle me-1"></i>Cancel Request
                        </button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
