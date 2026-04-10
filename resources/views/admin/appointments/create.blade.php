@extends('layouts.backend')

@section('title', 'Schedule Appointment')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-white py-3 px-4">
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('admin.appointments.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
                    <h5 class="mb-0 fw-bold"><i class="bi bi-calendar-plus me-2 text-primary"></i>Schedule Appointment</h5>
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
                <form action="{{ route('admin.appointments.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold small">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title') }}" placeholder="Appointment title">
                            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small">Description</label>
                            <textarea name="description" class="form-control" rows="2"
                                placeholder="Brief description">{{ old('description') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Requested By</label>
                            <select name="requested_by" class="form-select">
                                <option value="">— Select User —</option>
                                @foreach($users ?? [] as $user)
                                    <option value="{{ $user->id }}" {{ old('requested_by') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Assigned To <span class="text-danger">*</span></label>
                            <select name="assigned_to" class="form-select @error('assigned_to') is-invalid @enderror">
                                <option value="">— Select User —</option>
                                @foreach($users ?? [] as $user)
                                    <option value="{{ $user->id }}" {{ old('assigned_to') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('assigned_to')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Date <span class="text-danger">*</span></label>
                            <input type="date" name="appointment_date" class="form-control @error('appointment_date') is-invalid @enderror"
                                value="{{ old('appointment_date') }}">
                            @error('appointment_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Start Time <span class="text-danger">*</span></label>
                            <input type="time" name="start_time" class="form-control @error('start_time') is-invalid @enderror"
                                value="{{ old('start_time') }}">
                            @error('start_time')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">End Time</label>
                            <input type="time" name="end_time" class="form-control @error('end_time') is-invalid @enderror"
                                value="{{ old('end_time') }}">
                            @error('end_time')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-8">
                            <label class="form-label fw-semibold small">Location</label>
                            <input type="text" name="location" class="form-control" value="{{ old('location') }}" placeholder="Meeting room / address">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Status</label>
                            <select name="status" class="form-select">
                                <option value="pending" {{ old('status','pending') === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ old('status') === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-end mt-4">
                        <a href="{{ route('admin.appointments.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle me-1"></i>Save Appointment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
