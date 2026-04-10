@extends('layouts.backend')

@section('title', 'Employees')

@section('content')

<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 px-4">
        <h5 class="mb-0 fw-bold"><i class="bi bi-people me-2 text-primary"></i>All Employees</h5>
        <a href="{{ route('admin.employees.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Add Employee
        </a>
    </div>
    {{-- Search & Filter --}}
    <div class="filter-bar">
        <form method="GET" action="{{ route('admin.employees.index') }}" class="d-flex flex-wrap gap-2 w-100">
            <input type="text" name="search" class="form-control form-control-sm" style="max-width:220px"
                placeholder="Search name or code…" value="{{ request('search') }}">
            <select name="department" class="form-select form-select-sm" style="max-width:180px">
                <option value="">All Departments</option>
                @foreach(\App\Models\Department::orderBy('name')->get() as $dept)
                    <option value="{{ $dept->id }}" {{ request('department') == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
                @endforeach
            </select>
            <select name="status" class="form-select form-select-sm" style="max-width:140px">
                <option value="">All Status</option>
                <option value="active"   {{ request('status') === 'active'   ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            <button class="btn btn-primary btn-sm"><i class="bi bi-search me-1"></i>Filter</button>
            @if(request()->hasAny(['search','department','status']))
            <a href="{{ route('admin.employees.index') }}" class="btn btn-outline-secondary btn-sm">Clear</a>
            @endif
        </form>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th class="ps-4">#</th>
                        <th>Employee</th>
                        <th>Code</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Type</th>
                        <th>Joined</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $employee)
                    <tr>
                        <td class="ps-4 text-muted small">{{ $loop->iteration }}</td>
                        <td>
                            <div class="fw-semibold small">{{ $employee->full_name }}</div>
                            <div class="text-muted" style="font-size:0.78rem">{{ $employee->user->email ?? '' }}</div>
                        </td>
                        <td class="small text-muted">{{ $employee->employee_code }}</td>
                        <td class="small">{{ $employee->department->name ?? '—' }}</td>
                        <td class="small">{{ $employee->designation }}</td>
                        <td class="small">
                            <span class="badge bg-info text-dark">{{ ucfirst(str_replace('_',' ',$employee->employment_type)) }}</span>
                        </td>
                        <td class="small">{{ $employee->joining_date?->format('d M Y') }}</td>
                        <td>
                            <span class="badge {{ $employee->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($employee->status) }}
                            </span>
                        </td>
                        <td class="text-end pe-4">
                            <a href="{{ route('admin.employees.show', $employee) }}" class="btn btn-sm btn-outline-info" title="View">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('admin.employees.edit', $employee) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-danger"
                                data-bs-toggle="modal" data-bs-target="#deleteModal"
                                data-action="{{ route('admin.employees.destroy', $employee) }}"
                                data-message="Delete employee '{{ $employee->full_name }}'? This cannot be undone."
                                title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="9" class="text-center text-muted py-5">No employees found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($employees instanceof \Illuminate\Pagination\LengthAwarePaginator && $employees->hasPages())
    <div class="card-footer bg-white d-flex justify-content-between align-items-center py-3 px-4">
        <small class="text-muted">Showing {{ $employees->firstItem() }}–{{ $employees->lastItem() }} of {{ $employees->total() }}</small>
        {{ $employees->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>

@endsection
