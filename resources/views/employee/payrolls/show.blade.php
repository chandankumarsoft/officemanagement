@extends('layouts.backend')

@section('title', 'Payslip Details')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header bg-white d-flex align-items-center gap-2 py-3 px-4">
                <a href="{{ route('employee.payrolls.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
                <h5 class="mb-0 fw-bold"><i class="bi bi-receipt me-2 text-success"></i>Payslip</h5>
                <span class="ms-auto badge {{ $payroll->status === 'paid' ? 'bg-success' : 'bg-warning text-dark' }}">
                    {{ ucfirst($payroll->status) }}
                </span>
            </div>
            <div class="card-body p-4">
                {{-- Header --}}
                <div class="row g-3 pb-3 mb-4 border-bottom">
                    <div class="col-md-4">
                        <div class="small text-muted">Employee</div>
                        <div class="fw-bold">{{ $payroll->employee->full_name ?? '—' }}</div>
                        <div class="text-muted small">{{ $payroll->employee->employee_code ?? '' }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="small text-muted">Department</div>
                        <div class="fw-bold">{{ $payroll->employee->department->name ?? '—' }}</div>
                        <div class="text-muted small">{{ $payroll->employee->designation ?? '' }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="small text-muted">Pay Period</div>
                        <div class="fw-bold">
                            {{ DateTime::createFromFormat('!m', $payroll->pay_month)->format('F') }}
                            {{ $payroll->pay_year }}
                        </div>
                        @if($payroll->payment_date)
                        <div class="text-muted small">Paid: {{ $payroll->payment_date->format('d M Y') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <h6 class="text-success fw-bold mb-3">Earnings</h6>
                        <table class="table table-sm">
                            <tr><td class="text-muted">Basic Salary</td><td class="text-end fw-semibold">${{ number_format($payroll->basic_salary, 2) }}</td></tr>
                            <tr><td class="text-muted">House Rent Allowance</td><td class="text-end">${{ number_format($payroll->house_rent_allowance, 2) }}</td></tr>
                            <tr><td class="text-muted">Transport Allowance</td><td class="text-end">${{ number_format($payroll->transport_allowance, 2) }}</td></tr>
                            <tr><td class="text-muted">Medical Allowance</td><td class="text-end">${{ number_format($payroll->medical_allowance, 2) }}</td></tr>
                            <tr><td class="text-muted">Other Allowances</td><td class="text-end">${{ number_format($payroll->other_allowances, 2) }}</td></tr>
                            <tr class="table-success fw-bold">
                                <td>Gross Salary</td>
                                <td class="text-end">${{ number_format($payroll->gross_salary, 2) }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-danger fw-bold mb-3">Deductions</h6>
                        <table class="table table-sm">
                            <tr><td class="text-muted">Tax Deduction</td><td class="text-end">${{ number_format($payroll->tax_deduction, 2) }}</td></tr>
                            <tr><td class="text-muted">Provident Fund</td><td class="text-end">${{ number_format($payroll->provident_fund, 2) }}</td></tr>
                            <tr><td class="text-muted">Other Deductions</td><td class="text-end">${{ number_format($payroll->other_deductions, 2) }}</td></tr>
                            <tr class="table-danger fw-bold">
                                <td>Total Deductions</td>
                                <td class="text-end">-${{ number_format($payroll->total_deductions, 2) }}</td>
                            </tr>
                        </table>
                        <div class="bg-success bg-opacity-10 border border-success rounded p-3 mt-3">
                            <div class="text-success small fw-semibold">Net Salary</div>
                            <div class="fw-bold fs-4 text-success">${{ number_format($payroll->net_salary, 2) }}</div>
                        </div>
                    </div>
                </div>

                {{-- Attendance --}}
                <div class="row g-3 mt-2 pt-3 border-top">
                    <div class="col-12"><h6 class="fw-bold text-muted">Attendance Summary</h6></div>
                    <div class="col-3 text-center">
                        <div class="small text-muted">Working Days</div>
                        <div class="fw-bold fs-5">{{ $payroll->working_days }}</div>
                    </div>
                    <div class="col-3 text-center">
                        <div class="small text-muted">Present Days</div>
                        <div class="fw-bold fs-5 text-success">{{ $payroll->present_days }}</div>
                    </div>
                    <div class="col-3 text-center">
                        <div class="small text-muted">Absent Days</div>
                        <div class="fw-bold fs-5 text-danger">{{ $payroll->absent_days }}</div>
                    </div>
                    <div class="col-3 text-center">
                        <div class="small text-muted">Leave Days</div>
                        <div class="fw-bold fs-5 text-warning">{{ $payroll->leave_days }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
