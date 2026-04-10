@extends('layouts.backend')

@section('title', 'Edit Employee')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header bg-white py-3 px-4">
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('admin.employees.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <h5 class="mb-0 fw-bold"><i class="bi bi-pencil-square me-2 text-warning"></i>Edit Employee</h5>
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

                <form action="{{ route('admin.employees.update', $employee) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <h6 class="text-primary fw-bold border-bottom pb-2 mb-3">Personal Information</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">First Name <span class="text-danger">*</span></label>
                            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                                value="{{ old('first_name', $employee->first_name) }}">
                            @error('first_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Last Name <span class="text-danger">*</span></label>
                            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                                value="{{ old('last_name', $employee->last_name) }}">
                            @error('last_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Date of Birth</label>
                            <input type="date" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror"
                                value="{{ old('date_of_birth', $employee->date_of_birth?->format('Y-m-d')) }}">
                            @error('date_of_birth')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Gender</label>
                            <select name="gender" class="form-select">
                                <option value="">— Select —</option>
                                <option value="male" {{ old('gender', $employee->gender) === 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender', $employee->gender) === 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('gender', $employee->gender) === 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Phone</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone', $employee->phone) }}">
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small">Address</label>
                            <textarea name="address" class="form-control" rows="2">{{ old('address', $employee->address) }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Profile Photo</label>
                            @if($employee->profile_photo)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/'.$employee->profile_photo) }}"
                                        alt="Photo" class="rounded" style="height:48px;width:48px;object-fit:cover;">
                                </div>
                            @endif
                            <input type="file" name="profile_photo" class="form-control" accept="image/*">
                        </div>
                    </div>

                    <h6 class="text-primary fw-bold border-bottom pb-2 mb-3">Employment Details</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Employee Code <span class="text-danger">*</span></label>
                            <input type="text" name="employee_code" class="form-control @error('employee_code') is-invalid @enderror"
                                value="{{ old('employee_code', $employee->employee_code) }}">
                            @error('employee_code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Department <span class="text-danger">*</span></label>
                            <select name="department_id" class="form-select @error('department_id') is-invalid @enderror">
                                <option value="">— Select —</option>
                                @foreach($departments ?? [] as $dept)
                                    <option value="{{ $dept->id }}" {{ old('department_id', $employee->department_id) == $dept->id ? 'selected' : '' }}>
                                        {{ $dept->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('department_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Designation <span class="text-danger">*</span></label>
                            <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror"
                                value="{{ old('designation', $employee->designation) }}">
                            @error('designation')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Employment Type</label>
                            <select name="employment_type" class="form-select">
                                <option value="full_time" {{ old('employment_type', $employee->employment_type) === 'full_time' ? 'selected' : '' }}>Full Time</option>
                                <option value="part_time" {{ old('employment_type', $employee->employment_type) === 'part_time' ? 'selected' : '' }}>Part Time</option>
                                <option value="contract" {{ old('employment_type', $employee->employment_type) === 'contract' ? 'selected' : '' }}>Contract</option>
                                <option value="intern" {{ old('employment_type', $employee->employment_type) === 'intern' ? 'selected' : '' }}>Intern</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Joining Date <span class="text-danger">*</span></label>
                            <input type="date" name="joining_date" class="form-control @error('joining_date') is-invalid @enderror"
                                value="{{ old('joining_date', $employee->joining_date?->format('Y-m-d')) }}">
                            @error('joining_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Leaving Date</label>
                            <input type="date" name="leaving_date" class="form-control @error('leaving_date') is-invalid @enderror"
                                value="{{ old('leaving_date', $employee->leaving_date?->format('Y-m-d')) }}">
                            @error('leaving_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Basic Salary <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" name="basic_salary" class="form-control @error('basic_salary') is-invalid @enderror"
                                    value="{{ old('basic_salary', $employee->basic_salary) }}">
                            </div>
                            @error('basic_salary')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Status</label>
                            <select name="status" class="form-select">
                                <option value="active" {{ old('status', $employee->status) === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $employee->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="terminated" {{ old('status', $employee->status) === 'terminated' ? 'selected' : '' }}>Terminated</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('admin.employees.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-warning px-4">
                            <i class="bi bi-save me-1"></i>Update Employee
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

    @error('department_id')
        {{ $message }}
    @enderror

    @error('designation')
        {{ $message }}
    @enderror

    @error('joining_date')
        {{ $message }}
    @enderror

    @error('leaving_date')
        {{ $message }}
    @enderror

    @error('basic_salary')
        {{ $message }}
    @enderror

@endsection
