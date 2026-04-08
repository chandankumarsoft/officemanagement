<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    public function index()
    {
        $employee = Auth::user()->employee;

        if (!$employee) {
            return view('employee.leaves.index', [
                'leaves' => collect(),
            ]);
        }

        $leaves = $employee->leaves()->orderBy('created_at', 'desc')->paginate(10);

        return view('employee.leaves.index', [
            'leaves' => $leaves,
        ]);
    }

    public function create()
    {
        return view('employee.leaves.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'leave_type' => ['required', 'in:annual,sick,casual,maternity,paternity,unpaid,other'],
            'start_date' => ['required', 'date', 'after_or_equal:today'],
            'end_date'   => ['required', 'date', 'after_or_equal:start_date'],
            'reason'     => ['required', 'string', 'max:1000'],
        ]);

        $employee = Auth::user()->employee;

        if (!$employee) {
            return back()->with('error', 'Your employee profile has not been set up yet. Please contact HR.');
        }

        $startDate  = \Carbon\Carbon::parse($request->input('start_date'));
        $endDate    = \Carbon\Carbon::parse($request->input('end_date'));
        $totalDays  = $startDate->diffInDays($endDate) + 1;

        $leave = new Leave();
        $leave->employee_id = $employee->id;
        $leave->leave_type  = $request->input('leave_type');
        $leave->start_date  = $request->input('start_date');
        $leave->end_date    = $request->input('end_date');
        $leave->total_days  = $totalDays;
        $leave->reason      = $request->input('reason');
        $leave->status      = 'pending';
        $leave->save();

        return redirect()->route('employee.leaves.index')->with('success', 'Leave request submitted successfully.');
    }

    public function show(Leave $leave)
    {
        $employee = Auth::user()->employee;

        if (!$employee || $leave->employee_id !== $employee->id) {
            abort(403, 'You are not authorized to view this leave request.');
        }

        return view('employee.leaves.show', [
            'leave' => $leave,
        ]);
    }

    public function cancel(Leave $leave)
    {
        $employee = Auth::user()->employee;

        if (!$employee || $leave->employee_id !== $employee->id) {
            abort(403, 'You are not authorized to cancel this leave request.');
        }

        if ($leave->status !== 'pending') {
            return back()->with('error', 'Only pending leave requests can be cancelled.');
        }

        $leave->status = 'cancelled';
        $leave->save();

        return redirect()->route('employee.leaves.index')->with('success', 'Leave request cancelled successfully.');
    }
}
