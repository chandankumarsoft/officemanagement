<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $employee = Auth::user()->employee;

        if (!$employee) {
            return view('employee.attendances.index', [
                'attendances' => collect(),
            ]);
        }

        $attendances = $employee->attendances()
            ->orderBy('attendance_date', 'desc')
            ->paginate(20);

        return view('employee.attendances.index', [
            'attendances' => $attendances,
        ]);
    }
}
