@extends('layouts.backend')

@section('title', 'My Leaves')

@section('content')

<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 px-4">
        <h5 class="mb-0 fw-bold"><i class="bi bi-calendar-x me-2 text-warning"></i>My Leave Requests</h5>
        <a href="{{ route('employee.leaves.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Apply Leave
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th class="ps-4">#</th>
                        <th>Leave Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Days</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leaves as $leave)
                    <tr>
                        <td class="ps-4 text-muted small">{{ $loop->iteration }}</td>
                        <td class="small">{{ ucfirst(str_replace('_', ' ', $leave->leave_type)) }}</td>
                        <td class="small">{{ $leave->start_date->format('d M Y') }}</td>
                        <td class="small">{{ $leave->end_date->format('d M Y') }}</td>
                        <td class="small">{{ $leave->total_days }}</td>
                        <td class="small text-muted">{{ Str::limit($leave->reason, 30) }}</td>
                        <td>
                            @php
                                $badge = match($leave->status) {
                                    'approved'  => 'success', 'rejected'  => 'danger',
                                    'cancelled' => 'secondary', default => 'warning'
                                };
                            @endphp
                            <span class="badge bg-{{ $badge }}">{{ ucfirst($leave->status) }}</span>
                        </td>
                        <td class="text-end pe-4">
                            <a href="{{ route('employee.leaves.show', $leave) }}" class="btn btn-sm btn-outline-info">
                                <i class="bi bi-eye"></i>
                            </a>
                            @if($leave->status === 'pending')
                            <form action="{{ route('employee.leaves.cancel', $leave) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Cancel this leave request?')">
                                @csrf
                                <button class="btn btn-sm btn-outline-danger" title="Cancel">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="8" class="text-center text-muted py-5">You have no leave requests yet.</td></tr>
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
