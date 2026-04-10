@extends('layouts.backend')

@section('title', 'Apply for Leave')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header bg-white py-3 px-4">
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('employee.leaves.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
                    <h5 class="mb-0 fw-bold"><i class="bi bi-calendar-x me-2 text-warning"></i>Apply for Leave</h5>
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
                <form action="{{ route('employee.leaves.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Leave Type <span class="text-danger">*</span></label>
                            <select name="leave_type" class="form-select @error('leave_type') is-invalid @enderror">
                                <option value="">— Select Type —</option>
                                <option value="annual" {{ old('leave_type') === 'annual' ? 'selected' : '' }}>Annual Leave</option>
                                <option value="sick" {{ old('leave_type') === 'sick' ? 'selected' : '' }}>Sick Leave</option>
                                <option value="maternity" {{ old('leave_type') === 'maternity' ? 'selected' : '' }}>Maternity Leave</option>
                                <option value="paternity" {{ old('leave_type') === 'paternity' ? 'selected' : '' }}>Paternity Leave</option>
                                <option value="unpaid" {{ old('leave_type') === 'unpaid' ? 'selected' : '' }}>Unpaid Leave</option>
                                <option value="other" {{ old('leave_type') === 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('leave_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold small">From <span class="text-danger">*</span></label>
                            <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror"
                                value="{{ old('start_date') }}">
                            @error('start_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold small">To <span class="text-danger">*</span></label>
                            <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror"
                                value="{{ old('end_date') }}">
                            @error('end_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small">Reason <span class="text-danger">*</span></label>
                            <textarea name="reason" rows="3" class="form-control @error('reason') is-invalid @enderror"
                                placeholder="Briefly explain the reason for your leave">{{ old('reason') }}</textarea>
                            @error('reason')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-end mt-4">
                        <a href="{{ route('employee.leaves.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-send me-1"></i>Submit Application
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
