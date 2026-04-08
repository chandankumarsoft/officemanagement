<?php

namespace App\Http\Controllers\Hr;

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

        $leaves = $query->orderBy('created_at', 'desc')->paginate(15)->withQueryString();

        return view('hr.leaves.index', [
            'leaves' => $leaves,
        ]);
    }

    public function show(Leave $leave)
    {
        $leave->load(['employee.department', 'approvedBy']);

        return view('hr.leaves.show', [
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

        return redirect()->route('hr.leaves.index')->with('success', 'Leave request approved successfully.');
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

        return redirect()->route('hr.leaves.index')->with('success', 'Leave request rejected.');
    }
}
