<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user     = Auth::user();
        $employee = $user->employee;

        if (!$employee) {
            return view('employee.dashboard', [
                'employee'        => null,
                'recentLeaves'    => collect(),
                'todayAttendance' => null,
            ]);
        }

        $employee->load('department');

        $recentLeaves = $employee->leaves()
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $todayAttendance = $employee->attendances()
            ->where('attendance_date', now()->toDateString())
            ->first();

        return view('employee.dashboard', [
            'employee'        => $employee,
            'recentLeaves'    => $recentLeaves,
            'todayAttendance' => $todayAttendance,
        ]);
    }
}
