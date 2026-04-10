@extends('layouts.backend')

@section('title', 'Record Attendance')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header bg-white py-3 px-4">
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('admin.attendances.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
                    <h5 class="mb-0 fw-bold"><i class="bi bi-calendar-check me-2 text-primary"></i>Record Attendance</h5>
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
                <form action="{{ route('admin.attendances.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Employee <span class="text-danger">*</span></label>
                            <select name="employee_id" class="form-select @error('employee_id') is-invalid @enderror">
                                <option value="">— Select Employee —</option>
                                @foreach($employees ?? [] as $employee)
                                    <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                                        {{ $employee->full_name }} ({{ $employee->employee_code }})
                                    </option>
                                @endforeach
                            </select>
                            @error('employee_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Date <span class="text-danger">*</span></label>
                            <input type="date" name="attendance_date" class="form-control @error('attendance_date') is-invalid @enderror"
                                value="{{ old('attendance_date', date('Y-m-d')) }}">
                            @error('attendance_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="present" {{ old('status','present') === 'present' ? 'selected' : '' }}>Present</option>
                                <option value="absent" {{ old('status') === 'absent' ? 'selected' : '' }}>Absent</option>
                                <option value="late" {{ old('status') === 'late' ? 'selected' : '' }}>Late</option>
                                <option value="half_day" {{ old('status') === 'half_day' ? 'selected' : '' }}>Half Day</option>
                                <option value="on_leave" {{ old('status') === 'on_leave' ? 'selected' : '' }}>On Leave</option>
                            </select>
                            @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Check In</label>
                            <input type="time" name="check_in" class="form-control" value="{{ old('check_in') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Check Out</label>
                            <input type="time" name="check_out" class="form-control" value="{{ old('check_out') }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small">Remarks</label>
                            <textarea name="remarks" class="form-control" rows="2"
                                placeholder="Optional remarks">{{ old('remarks') }}</textarea>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-end mt-4">
                        <a href="{{ route('admin.attendances.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle me-1"></i>Save Record
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
