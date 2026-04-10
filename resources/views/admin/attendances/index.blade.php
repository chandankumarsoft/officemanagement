@extends('layouts.backend')

@section('title', 'Attendance Records')

@section('content')

<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 px-4">
        <h5 class="mb-0 fw-bold"><i class="bi bi-calendar-check me-2 text-primary"></i>Attendance Records</h5>
        <a href="{{ route('admin.attendances.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Record Attendance
        </a>
    </div>
    {{-- Filter bar --}}
    <div class="filter-bar">
        <form method="GET" action="{{ route('admin.attendances.index') }}" class="d-flex flex-wrap gap-2 w-100">
            <input type="text" name="search" class="form-control form-control-sm" style="max-width:200px"
                placeholder="Search employee…" value="{{ request('search') }}">
            <input type="date" name="date" class="form-control form-control-sm" style="max-width:160px"
                value="{{ request('date') }}">
            <select name="status" class="form-select form-select-sm" style="max-width:150px">
                <option value="">All Status</option>
                <option value="present"  {{ request('status') === 'present'  ? 'selected' : '' }}>Present</option>
                <option value="absent"   {{ request('status') === 'absent'   ? 'selected' : '' }}>Absent</option>
                <option value="late"     {{ request('status') === 'late'     ? 'selected' : '' }}>Late</option>
                <option value="half_day" {{ request('status') === 'half_day' ? 'selected' : '' }}>Half Day</option>
            </select>
            <button class="btn btn-primary btn-sm"><i class="bi bi-search me-1"></i>Filter</button>
            @if(request()->hasAny(['search','date','status']))
            <a href="{{ route('admin.attendances.index') }}" class="btn btn-outline-secondary btn-sm">Clear</a>
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
                        <th>Date</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Hours</th>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attendances as $attendance)
                    <tr>
                        <td class="ps-4 text-muted small">{{ $loop->iteration }}</td>
                        <td class="fw-semibold small">{{ $attendance->employee->full_name ?? '—' }}</td>
                        <td class="small">{{ $attendance->attendance_date->format('d M Y') }}</td>
                        <td class="small">{{ $attendance->check_in ?? '—' }}</td>
                        <td class="small">{{ $attendance->check_out ?? '—' }}</td>
                        <td class="small">{{ $attendance->working_hours ?? '—' }} hrs</td>
                        <td>
                            @php
                                $color = match($attendance->status) {
                                    'present'  => 'success',
                                    'absent'   => 'danger',
                                    'late'     => 'warning',
                                    'half_day' => 'info',
                                    default    => 'secondary'
                                };
                            @endphp
                            <span class="badge bg-{{ $color }}">{{ ucfirst($attendance->status) }}</span>
                        </td>
                        <td class="small text-muted">{{ $attendance->remarks ?? '—' }}</td>
                        <td class="text-end pe-4">
                            <a href="{{ route('admin.attendances.edit', $attendance) }}" class="btn btn-sm btn-outline-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-danger"
                                data-bs-toggle="modal" data-bs-target="#deleteModal"
                                data-action="{{ route('admin.attendances.destroy', $attendance) }}"
                                data-message="Delete attendance record for '{{ $attendance->employee->full_name ?? 'this employee' }}' on {{ $attendance->attendance_date->format('d M Y') }}?"
                                title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="9" class="text-center text-muted py-5">No attendance records found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if(isset($attendances) && $attendances instanceof \Illuminate\Pagination\LengthAwarePaginator && $attendances->hasPages())
    <div class="card-footer bg-white d-flex justify-content-between align-items-center py-3 px-4">
        <small class="text-muted">Showing {{ $attendances->firstItem() }}–{{ $attendances->lastItem() }} of {{ $attendances->total() }}</small>
        {{ $attendances->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>

@endsection
