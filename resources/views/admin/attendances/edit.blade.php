@extends('layouts.backend')

@section('title', 'Edit Attendance')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header bg-white py-3 px-4">
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('admin.attendances.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
                    <h5 class="mb-0 fw-bold"><i class="bi bi-pencil-square me-2 text-warning"></i>Edit Attendance</h5>
                </div>
            </div>
            <div class="card-body p-4">
                @if($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li class="small">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.attendances.update', $attendance) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Employee</label>
                            <input type="text" class="form-control" value="{{ $attendance->employee->full_name ?? '—' }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Date</label>
                            <input type="date" name="attendance_date" class="form-control"
                                value="{{ old('attendance_date', $attendance->attendance_date->format('Y-m-d')) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="present" {{ old('status', $attendance->status) === 'present' ? 'selected' : '' }}>Present</option>
                                <option value="absent" {{ old('status', $attendance->status) === 'absent' ? 'selected' : '' }}>Absent</option>
                                <option value="late" {{ old('status', $attendance->status) === 'late' ? 'selected' : '' }}>Late</option>
                                <option value="half_day" {{ old('status', $attendance->status) === 'half_day' ? 'selected' : '' }}>Half Day</option>
                                <option value="on_leave" {{ old('status', $attendance->status) === 'on_leave' ? 'selected' : '' }}>On Leave</option>
                            </select>
                            @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Check In</label>
                            <input type="time" name="check_in" class="form-control"
                                value="{{ old('check_in', $attendance->check_in) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Check Out</label>
                            <input type="time" name="check_out" class="form-control"
                                value="{{ old('check_out', $attendance->check_out) }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small">Remarks</label>
                            <textarea name="remarks" class="form-control" rows="2">{{ old('remarks', $attendance->remarks) }}</textarea>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-end mt-4">
                        <a href="{{ route('admin.attendances.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-warning px-4">
                            <i class="bi bi-save me-1"></i>Update Record
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
