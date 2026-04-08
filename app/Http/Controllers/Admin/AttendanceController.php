<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $query = Attendance::with('employee.department');

        if ($request->filled('date')) {
            $query->where('attendance_date', $request->input('date'));
        } else {
            $query->where('attendance_date', now()->toDateString());
        }

        if ($request->filled('employee_id')) {
            $query->where('employee_id', $request->input('employee_id'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $attendances = $query->orderBy('attendance_date', 'desc')->paginate(20)->withQueryString();
        $employees   = Employee::where('status', 'active')->orderBy('first_name')->get();

        return view('admin.attendances.index', [
            'attendances' => $attendances,
            'employees'   => $employees,
        ]);
    }

    public function create()
    {
        $employees = Employee::where('status', 'active')->orderBy('first_name')->get();

        return view('admin.attendances.create', [
            'employees' => $employees,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id'     => ['required', 'integer', 'exists:employees,id'],
            'attendance_date' => ['required', 'date'],
            'check_in'        => ['nullable', 'date_format:H:i'],
            'check_out'       => ['nullable', 'date_format:H:i', 'after:check_in'],
            'status'          => ['required', 'in:present,absent,late,half_day,on_leave'],
            'remarks'         => ['nullable', 'string', 'max:500'],
        ]);

        $existingRecord = Attendance::where('employee_id', $request->input('employee_id'))
            ->where('attendance_date', $request->input('attendance_date'))
            ->first();

        if ($existingRecord) {
            return back()->withErrors(['attendance_date' => 'Attendance for this employee on this date already exists.'])->withInput();
        }

        $workingHours = null;
        if ($request->filled('check_in') && $request->filled('check_out')) {
            $checkIn      = \Carbon\Carbon::createFromFormat('H:i', $request->input('check_in'));
            $checkOut     = \Carbon\Carbon::createFromFormat('H:i', $request->input('check_out'));
            $workingHours = round($checkIn->diffInMinutes($checkOut) / 60, 2);
        }

        $attendance = new Attendance();
        $attendance->employee_id     = $request->input('employee_id');
        $attendance->attendance_date = $request->input('attendance_date');
        $attendance->check_in        = $request->input('check_in');
        $attendance->check_out       = $request->input('check_out');
        $attendance->working_hours   = $workingHours;
        $attendance->status          = $request->input('status');
        $attendance->remarks         = $request->input('remarks');
        $attendance->recorded_by     = auth()->id();
        $attendance->save();

        return redirect()->route('admin.attendances.index')->with('success', 'Attendance recorded successfully.');
    }

    public function edit(Attendance $attendance)
    {
        $employees = Employee::where('status', 'active')->orderBy('first_name')->get();

        return view('admin.attendances.edit', [
            'attendance' => $attendance,
            'employees'  => $employees,
        ]);
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'check_in'  => ['nullable', 'date_format:H:i'],
            'check_out' => ['nullable', 'date_format:H:i', 'after:check_in'],
            'status'    => ['required', 'in:present,absent,late,half_day,on_leave'],
            'remarks'   => ['nullable', 'string', 'max:500'],
        ]);

        $workingHours = null;
        if ($request->filled('check_in') && $request->filled('check_out')) {
            $checkIn      = \Carbon\Carbon::createFromFormat('H:i', $request->input('check_in'));
            $checkOut     = \Carbon\Carbon::createFromFormat('H:i', $request->input('check_out'));
            $workingHours = round($checkIn->diffInMinutes($checkOut) / 60, 2);
        }

        $attendance->check_in      = $request->input('check_in');
        $attendance->check_out     = $request->input('check_out');
        $attendance->working_hours = $workingHours;
        $attendance->status        = $request->input('status');
        $attendance->remarks       = $request->input('remarks');
        $attendance->save();

        return redirect()->route('admin.attendances.index')->with('success', 'Attendance updated successfully.');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()->route('admin.attendances.index')->with('success', 'Attendance record deleted successfully.');
    }
}
