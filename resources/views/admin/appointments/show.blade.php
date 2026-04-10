@extends('layouts.backend')

@section('title', 'Appointment Details')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header bg-white d-flex align-items-center gap-2 py-3 px-4">
                <a href="{{ route('admin.appointments.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
                <h5 class="mb-0 fw-bold"><i class="bi bi-calendar-event me-2 text-primary"></i>Appointment Details</h5>
                <span class="ms-auto badge {{ match($appointment->status) { 'confirmed' => 'bg-success', 'cancelled' => 'bg-danger', 'completed' => 'bg-secondary', default => 'bg-warning text-dark' } }}">
                    {{ ucfirst($appointment->status) }}
                </span>
            </div>
            <div class="card-body p-4">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="small text-muted mb-1">Title</div>
                        <div class="fw-bold fs-6">{{ $appointment->title }}</div>
                    </div>
                    @if($appointment->description)
                    <div class="col-12">
                        <div class="small text-muted mb-1">Description</div>
                        <div>{{ $appointment->description }}</div>
                    </div>
                    @endif
                    <div class="col-md-6">
                        <div class="small text-muted mb-1">Requested By</div>
                        <div class="fw-semibold">{{ $appointment->requestedBy->name ?? '—' }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="small text-muted mb-1">Assigned To</div>
                        <div class="fw-semibold">{{ $appointment->assignedTo->name ?? '—' }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="small text-muted mb-1">Date</div>
                        <div class="fw-semibold">{{ $appointment->appointment_date->format('d M Y') }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="small text-muted mb-1">Time</div>
                        <div class="fw-semibold">{{ $appointment->start_time }} &mdash; {{ $appointment->end_time }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="small text-muted mb-1">Location</div>
                        <div class="fw-semibold">{{ $appointment->location ?? '—' }}</div>
                    </div>
                    @if($appointment->cancellation_reason)
                    <div class="col-12">
                        <div class="small text-muted mb-1">Cancellation Reason</div>
                        <div class="text-danger">{{ $appointment->cancellation_reason }}</div>
                    </div>
                    @endif
                </div>
                <div class="d-flex gap-2 mt-4">
                    <a href="{{ route('admin.appointments.edit', $appointment) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil me-1"></i>Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
