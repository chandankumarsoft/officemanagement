@extends('layouts.backend')

@section('title', 'Employee Profile')

@section('content')

<div class="row g-4">
    {{-- Profile Card --}}
    <div class="col-lg-4">
        <div class="card text-center">
            <div class="card-body py-4">
                @if($employee->profile_photo)
                    <img src="{{ asset('storage/'.$employee->profile_photo) }}"
                        class="rounded-circle mb-3 border border-3 border-primary"
                        style="width:100px;height:100px;object-fit:cover;" alt="Photo">
                @else
                    <div class="rounded-circle bg-primary bg-opacity-10 text-primary mx-auto mb-3 d-flex align-items-center justify-content-center"
                        style="width:100px;height:100px;font-size:2.5rem;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                @endif
                <h5 class="fw-bold mb-0">{{ $employee->full_name }}</h5>
                <p class="text-muted small mb-2">{{ $employee->designation }}</p>
                <span class="badge {{ $employee->status === 'active' ? 'bg-success' : 'bg-secondary' }} mb-3">
                    {{ ucfirst($employee->status) }}
                </span>
                <div class="d-flex gap-2 justify-content-center">
                    <a href="{{ route('admin.employees.edit', $employee) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil me-1"></i>Edit
                    </a>
                    <a href="{{ route('admin.employees.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i>Back
                    </a>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header bg-white py-3 px-4">
                <h6 class="mb-0 fw-bold text-muted">Quick Info</h6>
            </div>
            <div class="card-body px-4 py-3">
                <div class="d-flex justify-content-between py-2 border-bottom small">
                    <span class="text-muted">Code</span>
                    <span class="fw-semibold">{{ $employee->employee_code }}</span>
                </div>
                <div class="d-flex justify-content-between py-2 border-bottom small">
                    <span class="text-muted">Department</span>
                    <span class="fw-semibold">{{ $employee->department->name ?? '—' }}</span>
                </div>
                <div class="d-flex justify-content-between py-2 border-bottom small">
                    <span class="text-muted">Type</span>
                    <span class="fw-semibold">{{ ucfirst(str_replace('_',' ',$employee->employment_type)) }}</span>
                </div>
                <div class="d-flex justify-content-between py-2 border-bottom small">
                    <span class="text-muted">Joined</span>
                    <span class="fw-semibold">{{ $employee->joining_date?->format('d M Y') }}</span>
                </div>
                <div class="d-flex justify-content-between py-2 small">
                    <span class="text-muted">Salary</span>
                    <span class="fw-semibold text-success">${{ number_format($employee->basic_salary, 2) }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Details --}}
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-white py-3 px-4">
                <h6 class="mb-0 fw-bold"><i class="bi bi-person-lines-fill me-2 text-primary"></i>Personal Details</h6>
            </div>
            <div class="card-body px-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="small text-muted mb-1">Full Name</div>
                        <div class="fw-semibold">{{ $employee->full_name }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="small text-muted mb-1">Email</div>
                        <div class="fw-semibold">{{ $employee->user->email ?? '—' }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="small text-muted mb-1">Phone</div>
                        <div class="fw-semibold">{{ $employee->phone ?? '—' }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="small text-muted mb-1">Gender</div>
                        <div class="fw-semibold">{{ ucfirst($employee->gender ?? '—') }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="small text-muted mb-1">Date of Birth</div>
                        <div class="fw-semibold">{{ $employee->date_of_birth?->format('d M Y') ?? '—' }}</div>
                    </div>
                    <div class="col-12">
                        <div class="small text-muted mb-1">Address</div>
                        <div class="fw-semibold">{{ $employee->address ?? '—' }}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Recent Attendance --}}
        <div class="card mt-3">
            <div class="card-header bg-white py-3 px-4">
                <h6 class="mb-0 fw-bold"><i class="bi bi-calendar-check me-2 text-success"></i>Recent Attendance</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle small">
                        <thead>
                            <tr>
                                <th class="ps-4">Date</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Hours</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($employee->attendances->take(5) as $att)
                            <tr>
                                <td class="ps-4">{{ $att->attendance_date->format('d M Y') }}</td>
                                <td>{{ $att->check_in ?? '—' }}</td>
                                <td>{{ $att->check_out ?? '—' }}</td>
                                <td>{{ $att->working_hours ?? '—' }}</td>
                                <td>
                                    <span class="badge bg-{{ match($att->status) { 'present' => 'success', 'absent' => 'danger', 'late' => 'warning', default => 'secondary' } }}">
                                        {{ ucfirst($att->status) }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="5" class="text-center text-muted py-3">No records.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
