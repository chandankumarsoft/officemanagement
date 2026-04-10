@extends('layouts.backend')

@section('title', 'Add Employee')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header bg-white py-3 px-4">
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('admin.employees.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <h5 class="mb-0 fw-bold"><i class="bi bi-person-plus me-2 text-primary"></i>Add New Employee</h5>
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

                <form action="{{ route('admin.employees.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <h6 class="text-primary fw-bold border-bottom pb-2 mb-3">Personal Information</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">First Name <span class="text-danger">*</span></label>
                            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                                value="{{ old('first_name') }}" placeholder="John">
                            @error('first_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Last Name <span class="text-danger">*</span></label>
                            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                                value="{{ old('last_name') }}" placeholder="Doe">
                            @error('last_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">User Account <span class="text-danger">*</span></label>
                            <select name="user_id" class="form-select @error('user_id') is-invalid @enderror">
                                <option value="">— Select User —</option>
                                @foreach($users ?? [] as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Date of Birth</label>
                            <input type="date" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror"
                                value="{{ old('date_of_birth') }}">
                            @error('date_of_birth')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Gender</label>
                            <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                                <option value="">— Select —</option>
                                <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('gender') === 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('gender')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Phone</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone') }}" placeholder="+1 234 567 890">
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small">Address</label>
                            <textarea name="address" class="form-control @error('address') is-invalid @enderror"
                                rows="2" placeholder="Full address">{{ old('address') }}</textarea>
                            @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Profile Photo</label>
                            <input type="file" name="profile_photo" class="form-control @error('profile_photo') is-invalid @enderror"
                                accept="image/*">
                            @error('profile_photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <h6 class="text-primary fw-bold border-bottom pb-2 mb-3">Employment Details</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Employee Code <span class="text-danger">*</span></label>
                            <input type="text" name="employee_code" class="form-control @error('employee_code') is-invalid @enderror"
                                value="{{ old('employee_code') }}" placeholder="EMP-001">
                            @error('employee_code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Department <span class="text-danger">*</span></label>
                            <select name="department_id" class="form-select @error('department_id') is-invalid @enderror">
                                <option value="">— Select Department —</option>
                                @foreach($departments ?? [] as $dept)
                                    <option value="{{ $dept->id }}" {{ old('department_id') == $dept->id ? 'selected' : '' }}>
                                        {{ $dept->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('department_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Designation <span class="text-danger">*</span></label>
                            <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror"
                                value="{{ old('designation') }}" placeholder="Software Engineer">
                            @error('designation')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Employment Type</label>
                            <select name="employment_type" class="form-select @error('employment_type') is-invalid @enderror">
                                <option value="full_time" {{ old('employment_type','full_time') === 'full_time' ? 'selected' : '' }}>Full Time</option>
                                <option value="part_time" {{ old('employment_type') === 'part_time' ? 'selected' : '' }}>Part Time</option>
                                <option value="contract" {{ old('employment_type') === 'contract' ? 'selected' : '' }}>Contract</option>
                                <option value="intern" {{ old('employment_type') === 'intern' ? 'selected' : '' }}>Intern</option>
                            </select>
                            @error('employment_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Joining Date <span class="text-danger">*</span></label>
                            <input type="date" name="joining_date" class="form-control @error('joining_date') is-invalid @enderror"
                                value="{{ old('joining_date') }}">
                            @error('joining_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Basic Salary <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" name="basic_salary" class="form-control @error('basic_salary') is-invalid @enderror"
                                    value="{{ old('basic_salary') }}" placeholder="0.00">
                            </div>
                            @error('basic_salary')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Status</label>
                            <select name="status" class="form-select">
                                <option value="active" {{ old('status','active') === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="terminated" {{ old('status') === 'terminated' ? 'selected' : '' }}>Terminated</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('admin.employees.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle me-1"></i>Save Employee
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
