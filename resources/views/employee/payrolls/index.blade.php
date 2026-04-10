@extends('layouts.backend')

@section('title', 'My Payslips')

@section('content')

<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 px-4">
        <h5 class="mb-0 fw-bold"><i class="bi bi-cash-stack me-2 text-success"></i>My Payslips</h5>
    </div>

    {{-- Filter --}}
    <div class="filter-bar">
        <form method="GET" action="{{ route('employee.payrolls.index') }}" class="d-flex flex-wrap gap-2 w-100">
            <select name="year" class="form-select form-select-sm" style="max-width:120px">
                <option value="">All Years</option>
                @foreach(range(date('Y'), date('Y')-4) as $y)
                <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                @endforeach
            </select>
            <select name="status" class="form-select form-select-sm" style="max-width:140px">
                <option value="">All Status</option>
                <option value="unpaid" {{ request('status') === 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                <option value="paid"   {{ request('status') === 'paid'   ? 'selected' : '' }}>Paid</option>
            </select>
            <button class="btn btn-primary btn-sm"><i class="bi bi-search me-1"></i>Filter</button>
            @if(request()->hasAny(['year','status']))
            <a href="{{ route('employee.payrolls.index') }}" class="btn btn-outline-secondary btn-sm">Clear</a>
            @endif
        </form>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th class="ps-4">#</th>
                        <th>Period</th>
                        <th>Basic Salary</th>
                        <th>Gross Salary</th>
                        <th>Deductions</th>
                        <th>Net Salary</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($payrolls as $payroll)
                    <tr>
                        <td class="ps-4 text-muted small">{{ $loop->iteration }}</td>
                        <td class="small">
                            {{ DateTime::createFromFormat('!m', $payroll->pay_month)->format('F') }}
                            {{ $payroll->pay_year }}
                        </td>
                        <td class="small">${{ number_format($payroll->basic_salary, 2) }}</td>
                        <td class="small">${{ number_format($payroll->gross_salary, 2) }}</td>
                        <td class="small text-danger">-${{ number_format($payroll->total_deductions, 2) }}</td>
                        <td class="small fw-bold text-success">${{ number_format($payroll->net_salary, 2) }}</td>
                        <td>
                            <span class="badge {{ $payroll->status === 'paid' ? 'bg-success' : 'bg-warning text-dark' }}">
                                {{ ucfirst($payroll->status) }}
                            </span>
                        </td>
                        <td class="text-end pe-4">
                            <a href="{{ route('employee.payrolls.show', $payroll) }}" class="btn btn-sm btn-outline-info">
                                <i class="bi bi-eye"></i> View Slip
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="8" class="text-center text-muted py-5">No payslips available yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if(isset($payrolls) && $payrolls instanceof \Illuminate\Pagination\LengthAwarePaginator && $payrolls->hasPages())
    <div class="card-footer bg-white d-flex justify-content-between align-items-center py-3 px-4">
        <small class="text-muted">Showing {{ $payrolls->firstItem() }}–{{ $payrolls->lastItem() }} of {{ $payrolls->total() }}</small>
        {{ $payrolls->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>

@endsection
