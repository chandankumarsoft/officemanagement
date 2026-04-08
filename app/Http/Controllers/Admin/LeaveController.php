<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    public function index(Request $request)
    {
        $query = Leave::with('employee.department');

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('leave_type')) {
            $query->where('leave_type', $request->input('leave_type'));
        }

        if ($request->filled('employee_id')) {
            $query->where('employee_id', $request->input('employee_id'));
        }

        $leaves    = $query->orderBy('created_at', 'desc')->paginate(15)->withQueryString();
        $employees = Employee::where('status', 'active')->orderBy('first_name')->get();

        return view('admin.leaves.index', [
            'leaves'    => $leaves,
            'employees' => $employees,
        ]);
    }

    public function show(Leave $leave)
    {
        $leave->load(['employee.department', 'approvedBy']);

        return view('admin.leaves.show', [
            'leave' => $leave,
        ]);
    }

    public function approve(Request $request, Leave $leave)
    {
        $request->validate([
            'approval_remarks' => ['nullable', 'string', 'max:500'],
        ]);

        if ($leave->status !== 'pending') {
            return back()->with('error', 'Only pending leave requests can be approved.');
        }

        $leave->status           = 'approved';
        $leave->approved_by      = Auth::id();
        $leave->approved_at      = now();
        $leave->approval_remarks = $request->input('approval_remarks');
        $leave->save();

        return redirect()->route('admin.leaves.index')->with('success', 'Leave request approved successfully.');
    }

    public function reject(Request $request, Leave $leave)
    {
        $request->validate([
            'approval_remarks' => ['required', 'string', 'max:500'],
        ]);

        if ($leave->status !== 'pending') {
            return back()->with('error', 'Only pending leave requests can be rejected.');
        }

        $leave->status           = 'rejected';
        $leave->approved_by      = Auth::id();
        $leave->approved_at      = now();
        $leave->approval_remarks = $request->input('approval_remarks');
        $leave->save();

        return redirect()->route('admin.leaves.index')->with('success', 'Leave request rejected.');
    }
}
