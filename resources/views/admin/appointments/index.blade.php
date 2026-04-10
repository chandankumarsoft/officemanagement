@extends('layouts.backend')

@section('title', 'Appointments')

@section('content')

<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 px-4">
        <h5 class="mb-0 fw-bold"><i class="bi bi-calendar-event me-2 text-primary"></i>Appointments</h5>
        <a href="{{ route('admin.appointments.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Schedule Appointment
        </a>
    </div>
    {{-- Filter bar --}}
    <div class="filter-bar">
        <form method="GET" action="{{ route('admin.appointments.index') }}" class="d-flex flex-wrap gap-2 w-100">
            <input type="text" name="search" class="form-control form-control-sm" style="max-width:200px"
                placeholder="Search title…" value="{{ request('search') }}">
            <input type="date" name="date" class="form-control form-control-sm" style="max-width:160px"
                value="{{ request('date') }}">
            <select name="status" class="form-select form-select-sm" style="max-width:150px">
                <option value="">All Status</option>
                <option value="pending"   {{ request('status') === 'pending'   ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ request('status') === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
            <button class="btn btn-primary btn-sm"><i class="bi bi-search me-1"></i>Filter</button>
            @if(request()->hasAny(['search','date','status']))
            <a href="{{ route('admin.appointments.index') }}" class="btn btn-outline-secondary btn-sm">Clear</a>
            @endif
        </form>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th class="ps-4">#</th>
                        <th>Title</th>
                        <th>Requested By</th>
                        <th>Assigned To</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $appointment)
                    <tr>
                        <td class="ps-4 text-muted small">{{ $loop->iteration }}</td>
                        <td class="fw-semibold small">{{ $appointment->title }}</td>
                        <td class="small">{{ $appointment->requestedBy->name ?? '—' }}</td>
                        <td class="small">{{ $appointment->assignedTo->name ?? '—' }}</td>
                        <td class="small">{{ $appointment->appointment_date->format('d M Y') }}</td>
                        <td class="small">{{ $appointment->start_time }} - {{ $appointment->end_time }}</td>
                        <td class="small">{{ $appointment->location ?? '—' }}</td>
                        <td>
                            @php
                                $badge = match($appointment->status) {
                                    'confirmed'  => 'success',
                                    'cancelled'  => 'danger',
                                    'completed'  => 'secondary',
                                    default      => 'warning'
                                };
                            @endphp
                            <span class="badge bg-{{ $badge }}">{{ ucfirst($appointment->status) }}</span>
                        </td>
                        <td class="text-end pe-4">
                            <a href="{{ route('admin.appointments.show', $appointment) }}" class="btn btn-sm btn-outline-info" title="View">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('admin.appointments.edit', $appointment) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-danger"
                                data-bs-toggle="modal" data-bs-target="#deleteModal"
                                data-action="{{ route('admin.appointments.destroy', $appointment) }}"
                                data-message="Delete appointment '{{ $appointment->title }}'? This cannot be undone."
                                title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="9" class="text-center text-muted py-5">No appointments found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if(isset($appointments) && $appointments instanceof \Illuminate\Pagination\LengthAwarePaginator && $appointments->hasPages())
    <div class="card-footer bg-white d-flex justify-content-between align-items-center py-3 px-4">
        <small class="text-muted">Showing {{ $appointments->firstItem() }}–{{ $appointments->lastItem() }} of {{ $appointments->total() }}</small>
        {{ $appointments->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>

@endsection
