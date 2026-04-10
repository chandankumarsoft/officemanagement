@extends('layouts.backend')

@section('title', 'Leave Request Details')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-white d-flex align-items-center gap-2 py-3 px-4">
                <a href="{{ route('hr.leaves.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
                <h5 class="mb-0 fw-bold"><i class="bi bi-calendar-x me-2 text-warning"></i>Leave Request Details</h5>
                <span class="ms-auto badge {{ match($leave->status) { 'approved' => 'bg-success', 'rejected' => 'bg-danger', 'cancelled' => 'bg-secondary', default => 'bg-warning text-dark' } }} fs-6">
                    {{ ucfirst($leave->status) }}
                </span>
            </div>
            <div class="card-body p-4">
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="small text-muted mb-1">Employee</div>
                        <div class="fw-semibold">{{ $leave->employee->full_name ?? '—' }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="small text-muted mb-1">Department</div>
                        <div class="fw-semibold">{{ $leave->employee->department->name ?? '—' }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="small text-muted mb-1">Leave Type</div>
                        <div class="fw-semibold">{{ ucfirst(str_replace('_', ' ', $leave->leave_type)) }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="small text-muted mb-1">From</div>
                        <div class="fw-semibold">{{ $leave->start_date->format('d M Y') }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="small text-muted mb-1">To</div>
                        <div class="fw-semibold">{{ $leave->end_date->format('d M Y') }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="small text-muted mb-1">Total Days</div>
                        <div class="fw-semibold">{{ $leave->total_days }} day(s)</div>
                    </div>
                    <div class="col-12">
                        <div class="small text-muted mb-1">Reason</div>
                        <div class="fw-semibold">{{ $leave->reason }}</div>
                    </div>
                    @if($leave->approval_remarks)
                    <div class="col-12">
                        <div class="small text-muted mb-1">Approval Remarks</div>
                        <div class="fw-semibold">{{ $leave->approval_remarks }}</div>
                    </div>
                    @endif
                </div>

                @if($leave->status === 'pending')
                <hr>
                <h6 class="fw-bold mb-3">Take Action</h6>
                <div class="row g-3">
                    <div class="col-md-8">
                        <label class="form-label fw-semibold small">Remarks (optional)</label>
                        <textarea id="remarksInput" class="form-control" rows="2" placeholder="Add remarks..."></textarea>
                    </div>
                </div>
                <div class="d-flex gap-2 mt-3">
                    <form action="{{ route('hr.leaves.approve', $leave) }}" method="POST">
                        @csrf
                        <input type="hidden" name="approval_remarks" id="approveRemarks">
                        <button type="submit" class="btn btn-success"
                            onclick="document.getElementById('approveRemarks').value=document.getElementById('remarksInput').value">
                            <i class="bi bi-check-circle me-1"></i>Approve
                        </button>
                    </form>
                    <form action="{{ route('hr.leaves.reject', $leave) }}" method="POST">
                        @csrf
                        <input type="hidden" name="approval_remarks" id="rejectRemarks">
                        <button type="submit" class="btn btn-danger"
                            onclick="document.getElementById('rejectRemarks').value=document.getElementById('remarksInput').value">
                            <i class="bi bi-x-circle me-1"></i>Reject
                        </button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
