<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::with('manager')
            ->withCount('employees')
            ->orderBy('name')
            ->paginate(15);

        return view('admin.departments.index', [
            'departments' => $departments,
        ]);
    }

    public function create()
    {
        $managers = User::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('admin.departments.create', [
            'managers' => $managers,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => ['required', 'string', 'max:150', 'unique:departments,name'],
            'code'        => ['required', 'string', 'max:20', 'unique:departments,code'],
            'description' => ['nullable', 'string', 'max:1000'],
            'manager_id'  => ['nullable', 'integer', 'exists:users,id'],
            'is_active'   => ['required', 'boolean'],
        ]);

        $department = new Department();
        $department->name        = $request->input('name');
        $department->code        = strtoupper($request->input('code'));
        $department->description = $request->input('description');
        $department->manager_id  = $request->input('manager_id');
        $department->is_active   = $request->boolean('is_active');
        $department->save();

        return redirect()->route('admin.departments.index')->with('success', 'Department created successfully.');
    }

    public function show(Department $department)
    {
        $department->load(['manager', 'employees.user']);

        return view('admin.departments.show', [
            'department' => $department,
        ]);
    }

    public function edit(Department $department)
    {
        $managers = User::where('is_active', true)->orderBy('name')->get();

        return view('admin.departments.edit', [
            'department' => $department,
            'managers'   => $managers,
        ]);
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name'        => ['required', 'string', 'max:150', Rule::unique('departments', 'name')->ignore($department->id)],
            'code'        => ['required', 'string', 'max:20', Rule::unique('departments', 'code')->ignore($department->id)],
            'description' => ['nullable', 'string', 'max:1000'],
            'manager_id'  => ['nullable', 'integer', 'exists:users,id'],
            'is_active'   => ['required', 'boolean'],
        ]);

        $department->name        = $request->input('name');
        $department->code        = strtoupper($request->input('code'));
        $department->description = $request->input('description');
        $department->manager_id  = $request->input('manager_id');
        $department->is_active   = $request->boolean('is_active');
        $department->save();

        return redirect()->route('admin.departments.index')->with('success', 'Department updated successfully.');
    }

    public function destroy(Department $department)
    {
        if ($department->employees()->count() > 0) {
            return redirect()->route('admin.departments.index')
                ->with('error', 'Cannot delete a department that has employees assigned to it.');
        }

        $department->delete();

        return redirect()->route('admin.departments.index')->with('success', 'Department deleted successfully.');
    }
}
