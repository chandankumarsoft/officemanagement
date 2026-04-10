@extends('layouts.backend')

@section('title', 'Departments')

@section('content')

<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 px-4">
        <h5 class="mb-0 fw-bold"><i class="bi bi-diagram-3 me-2 text-primary"></i>All Departments</h5>
        <a href="{{ route('admin.departments.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Add Department
        </a>
    </div>
    {{-- Search --}}
    <div class="filter-bar">
        <form method="GET" action="{{ route('admin.departments.index') }}" class="d-flex flex-wrap gap-2 w-100">
            <input type="text" name="search" class="form-control form-control-sm" style="max-width:240px"
                placeholder="Search name or code…" value="{{ request('search') }}">
            <select name="status" class="form-select form-select-sm" style="max-width:150px">
                <option value="">All Status</option>
                <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
            </select>
            <button class="btn btn-primary btn-sm"><i class="bi bi-search me-1"></i>Filter</button>
            @if(request()->hasAny(['search','status']))
            <a href="{{ route('admin.departments.index') }}" class="btn btn-outline-secondary btn-sm">Clear</a>
            @endif
        </form>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th class="ps-4">#</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Manager</th>
                        <th>Employees</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($departments as $department)
                    <tr>
                        <td class="ps-4 text-muted small">{{ $loop->iteration }}</td>
                        <td class="fw-semibold small">{{ $department->name }}</td>
                        <td class="small text-muted">{{ $department->code }}</td>
                        <td class="small">{{ $department->manager->name ?? '—' }}</td>
                        <td class="small">{{ $department->employees->count() }}</td>
                        <td>
                            <span class="badge {{ $department->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $department->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="text-end pe-4">
                            <a href="{{ route('admin.departments.edit', $department) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-danger"
                                data-bs-toggle="modal" data-bs-target="#deleteModal"
                                data-action="{{ route('admin.departments.destroy', $department) }}"
                                data-message="Delete department '{{ $department->name }}'? This cannot be undone."
                                title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center text-muted py-5">No departments found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($departments instanceof \Illuminate\Pagination\LengthAwarePaginator && $departments->hasPages())
    <div class="card-footer bg-white d-flex justify-content-between align-items-center py-3 px-4">
        <small class="text-muted">Showing {{ $departments->firstItem() }}–{{ $departments->lastItem() }} of {{ $departments->total() }}</small>
        {{ $departments->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>
