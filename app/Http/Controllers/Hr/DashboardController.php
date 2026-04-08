<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\Attendance;
use App\Models\Department;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEmployees  = Employee::where('status', 'active')->count();
        $totalDepartments = Department::where('is_active', true)->count();
        $pendingLeaves   = Leave::where('status', 'pending')->count();
        $todayAttendance = Attendance::where('attendance_date', now()->toDateString())->count();

        $recentLeaves = Leave::with('employee')
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('hr.dashboard', [
            'totalEmployees'   => $totalEmployees,
            'totalDepartments' => $totalDepartments,
            'pendingLeaves'    => $pendingLeaves,
            'todayAttendance'  => $todayAttendance,
            'recentLeaves'     => $recentLeaves,
        ]);
    }
}
