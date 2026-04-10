@extends('layouts.backend')

@section('title', 'Department Details')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-white d-flex align-items-center gap-2 py-3 px-4">
                <a href="{{ route('admin.departments.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
                <h5 class="mb-0 fw-bold"><i class="bi bi-diagram-3 me-2 text-primary"></i>{{ $department->name }}</h5>
                <span class="ms-auto badge {{ $department->is_active ? 'bg-success' : 'bg-secondary' }}">
                    {{ $department->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
            <div class="card-body p-4">
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="small text-muted mb-1">Department Name</div>
                        <div class="fw-semibold">{{ $department->name }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="small text-muted mb-1">Code</div>
                        <div class="fw-semibold">{{ $department->code }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="small text-muted mb-1">Manager</div>
                        <div class="fw-semibold">{{ $department->manager->name ?? '—' }}</div>
                    </div>
                    <div class="col-12">
                        <div class="small text-muted mb-1">Description</div>
                        <div>{{ $department->description ?? '—' }}</div>
                    </div>
                </div>

                <h6 class="fw-bold border-bottom pb-2 mb-3"><i class="bi bi-people me-2"></i>Employees ({{ $department->employees->count() }})</h6>
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle small">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Type</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($department->employees as $emp)
                            <tr>
                                <td class="fw-semibold">{{ $emp->full_name }}</td>
                                <td>{{ $emp->designation }}</td>
                                <td>{{ ucfirst(str_replace('_',' ',$emp->employment_type)) }}</td>
                                <td><span class="badge {{ $emp->status === 'active' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($emp->status) }}</span></td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center text-muted py-3">No employees in this department.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex gap-2 mt-4">
                    <a href="{{ route('admin.departments.edit', $department) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil me-1"></i>Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
