@extends('layouts.backend')

@section('title', 'Create Payroll')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header bg-white py-3 px-4">
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('admin.payrolls.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
                    <h5 class="mb-0 fw-bold"><i class="bi bi-cash-stack me-2 text-success"></i>Generate Payroll</h5>
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
                <form action="{{ route('admin.payrolls.store') }}" method="POST">
                    @csrf
                    <h6 class="text-primary fw-bold border-bottom pb-2 mb-3">Basic Info</h6>
                    <div class="row g-3 mb-4">
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
                        <div class="col-md-3">
                            <label class="form-label fw-semibold small">Month <span class="text-danger">*</span></label>
                            <select name="pay_month" class="form-select @error('pay_month') is-invalid @enderror">
                                @foreach(range(1,12) as $m)
                                    <option value="{{ $m }}" {{ old('pay_month', date('n')) == $m ? 'selected' : '' }}>
                                        {{ DateTime::createFromFormat('!m', $m)->format('F') }}
                                    </option>
                                @endforeach
                            </select>
                            @error('pay_month')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold small">Year <span class="text-danger">*</span></label>
                            <input type="number" name="pay_year" class="form-control @error('pay_year') is-invalid @enderror"
                                value="{{ old('pay_year', date('Y')) }}" min="2020" max="2099">
                            @error('pay_year')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <h6 class="text-primary fw-bold border-bottom pb-2 mb-3">Earnings</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Basic Salary <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" name="basic_salary" class="form-control @error('basic_salary') is-invalid @enderror"
                                    value="{{ old('basic_salary') }}">
                            </div>
                            @error('basic_salary')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">House Rent Allowance</label>
                            <div class="input-group"><span class="input-group-text">$</span>
                                <input type="number" step="0.01" name="house_rent_allowance" class="form-control" value="{{ old('house_rent_allowance', 0) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Transport Allowance</label>
                            <div class="input-group"><span class="input-group-text">$</span>
                                <input type="number" step="0.01" name="transport_allowance" class="form-control" value="{{ old('transport_allowance', 0) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Medical Allowance</label>
                            <div class="input-group"><span class="input-group-text">$</span>
                                <input type="number" step="0.01" name="medical_allowance" class="form-control" value="{{ old('medical_allowance', 0) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Other Allowances</label>
                            <div class="input-group"><span class="input-group-text">$</span>
                                <input type="number" step="0.01" name="other_allowances" class="form-control" value="{{ old('other_allowances', 0) }}">
                            </div>
                        </div>
                    </div>

                    <h6 class="text-danger fw-bold border-bottom pb-2 mb-3">Deductions</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Tax Deduction</label>
                            <div class="input-group"><span class="input-group-text">$</span>
                                <input type="number" step="0.01" name="tax_deduction" class="form-control" value="{{ old('tax_deduction', 0) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Provident Fund</label>
                            <div class="input-group"><span class="input-group-text">$</span>
                                <input type="number" step="0.01" name="provident_fund" class="form-control" value="{{ old('provident_fund', 0) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Other Deductions</label>
                            <div class="input-group"><span class="input-group-text">$</span>
                                <input type="number" step="0.01" name="other_deductions" class="form-control" value="{{ old('other_deductions', 0) }}">
                            </div>
                        </div>
                    </div>

                    <h6 class="text-secondary fw-bold border-bottom pb-2 mb-3">Attendance</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-3">
                            <label class="form-label fw-semibold small">Working Days</label>
                            <input type="number" name="working_days" class="form-control" value="{{ old('working_days', 26) }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold small">Present Days</label>
                            <input type="number" name="present_days" class="form-control" value="{{ old('present_days', 26) }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold small">Absent Days</label>
                            <input type="number" name="absent_days" class="form-control" value="{{ old('absent_days', 0) }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold small">Leave Days</label>
                            <input type="number" name="leave_days" class="form-control" value="{{ old('leave_days', 0) }}">
                        </div>
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label fw-semibold small">Remarks</label>
                        <textarea name="remarks" class="form-control" rows="2">{{ old('remarks') }}</textarea>
                    </div>

                    <div class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('admin.payrolls.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success px-4">
                            <i class="bi bi-check-circle me-1"></i>Generate Payroll
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
