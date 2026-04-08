<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Employee::class, 'employee');
    }

    public function index(Request $request)
    {
        $query = Employee::with(['department', 'user']);

        if ($request->filled('department_id')) {
            $query->where('department_id', $request->input('department_id'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', '%' . $search . '%')
                  ->orWhere('last_name', 'like', '%' . $search . '%')
                  ->orWhere('employee_code', 'like', '%' . $search . '%');
            });
        }

        $employees   = $query->orderBy('first_name')->paginate(15)->withQueryString();
        $departments = Department::where('is_active', true)->orderBy('name')->get();

        return view('admin.employees.index', [
            'employees'   => $employees,
            'departments' => $departments,
        ]);
    }

    public function create()
    {
        $departments = Department::where('is_active', true)->orderBy('name')->get();
        $users       = User::whereDoesntHave('employee')->where('is_active', true)->orderBy('name')->get();

        return view('admin.employees.create', [
            'departments' => $departments,
            'users'       => $users,
        ]);
    }

    public function store(StoreEmployeeRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('profile_photo')) {
            $validated['profile_photo'] = $request->file('profile_photo')->store('employees/photos', 'public');
        }

        Employee::create($validated);

        return redirect()->route('admin.employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        $employee->load(['department', 'user', 'attendances', 'leaves', 'payrolls']);

        return view('admin.employees.show', [
            'employee' => $employee,
        ]);
    }

    public function edit(Employee $employee)
    {
        $departments = Department::where('is_active', true)->orderBy('name')->get();

        return view('admin.employees.edit', [
            'employee'    => $employee,
            'departments' => $departments,
        ]);
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $validated = $request->validated();

        if ($request->hasFile('profile_photo')) {
            if ($employee->profile_photo) {
                Storage::disk('public')->delete($employee->profile_photo);
            }
            $validated['profile_photo'] = $request->file('profile_photo')->store('employees/photos', 'public');
        }

        $employee->update($validated);

        return redirect()->route('admin.employees.show', $employee)->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        if ($employee->profile_photo) {
            Storage::disk('public')->delete($employee->profile_photo);
        }

        $employee->delete();

        return redirect()->route('admin.employees.index')->with('success', 'Employee deleted successfully.');
    }
}
