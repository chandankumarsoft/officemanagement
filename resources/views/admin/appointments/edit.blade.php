@extends('layouts.backend')

@section('title', 'Edit Appointment')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-white py-3 px-4">
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('admin.appointments.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
                    <h5 class="mb-0 fw-bold"><i class="bi bi-pencil-square me-2 text-warning"></i>Edit Appointment</h5>
                </div>
            </div>
            <div class="card-body p-4">
                @if($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)<li class="small">{{ $error }}</li>@endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.appointments.update', $appointment) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold small">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $appointment->title) }}">
                            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small">Description</label>
                            <textarea name="description" class="form-control" rows="2">{{ old('description', $appointment->description) }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Requested By</label>
                            <select name="requested_by" class="form-select">
                                <option value="">— Select User —</option>
                                @foreach($users ?? [] as $user)
                                    <option value="{{ $user->id }}" {{ old('requested_by', $appointment->requested_by) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Assigned To</label>
                            <select name="assigned_to" class="form-select">
                                <option value="">— Select User —</option>
                                @foreach($users ?? [] as $user)
                                    <option value="{{ $user->id }}" {{ old('assigned_to', $appointment->assigned_to) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Date</label>
                            <input type="date" name="appointment_date" class="form-control"
                                value="{{ old('appointment_date', $appointment->appointment_date->format('Y-m-d')) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Start Time</label>
                            <input type="time" name="start_time" class="form-control"
                                value="{{ old('start_time', $appointment->start_time) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">End Time</label>
                            <input type="time" name="end_time" class="form-control"
                                value="{{ old('end_time', $appointment->end_time) }}">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label fw-semibold small">Location</label>
                            <input type="text" name="location" class="form-control"
                                value="{{ old('location', $appointment->location) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="pending" {{ old('status', $appointment->status) === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ old('status', $appointment->status) === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="completed" {{ old('status', $appointment->status) === 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ old('status', $appointment->status) === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        @if($appointment->status === 'cancelled')
                        <div class="col-12">
                            <label class="form-label fw-semibold small">Cancellation Reason</label>
                            <textarea name="cancellation_reason" class="form-control" rows="2">{{ old('cancellation_reason', $appointment->cancellation_reason) }}</textarea>
                        </div>
                        @endif
                    </div>
                    <div class="d-flex gap-2 justify-content-end mt-4">
                        <a href="{{ route('admin.appointments.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-warning px-4">
                            <i class="bi bi-save me-1"></i>Update Appointment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
