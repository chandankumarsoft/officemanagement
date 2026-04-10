@extends('layouts.backend')

@section('title', 'Edit Department')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header bg-white py-3 px-4">
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('admin.departments.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
                    <h5 class="mb-0 fw-bold"><i class="bi bi-pencil-square me-2 text-warning"></i>Edit Department</h5>
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
                <form action="{{ route('admin.departments.update', $department) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-semibold small">Department Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $department->name) }}">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Code <span class="text-danger">*</span></label>
                            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
                                value="{{ old('code', $department->code) }}">
                            @error('code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description', $department->description) }}</textarea>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label fw-semibold small">Manager</label>
                            <select name="manager_id" class="form-select">
                                <option value="">— No Manager —</option>
                                @foreach($managers ?? [] as $manager)
                                    <option value="{{ $manager->id }}" {{ old('manager_id', $department->manager_id) == $manager->id ? 'selected' : '' }}>
                                        {{ $manager->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Status</label>
                            <select name="is_active" class="form-select">
                                <option value="1" {{ old('is_active', $department->is_active ? '1' : '0') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('is_active', $department->is_active ? '1' : '0') == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-end mt-4">
                        <a href="{{ route('admin.departments.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-warning px-4">
                            <i class="bi bi-save me-1"></i>Update Department
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
