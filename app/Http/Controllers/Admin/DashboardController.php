<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEmployees    = Employee::where('status', 'active')->count();
        $totalUsers        = User::where('is_active', true)->count();
        $totalDepartments  = \App\Models\Department::where('is_active', true)->count();
        $pendingLeaves     = \App\Models\Leave::where('status', 'pending')->count();
        $todayAttendance   = \App\Models\Attendance::where('attendance_date', now()->toDateString())->count();
        $upcomingAppointments = \App\Models\Appointment::where('appointment_date', '>=', now()->toDateString())
                                    ->where('status', 'confirmed')
                                    ->orderBy('appointment_date')
                                    ->limit(5)
                                    ->get();

        return view('admin.dashboard', [
            'totalEmployees'       => $totalEmployees,
            'totalUsers'           => $totalUsers,
            'totalDepartments'     => $totalDepartments,
            'pendingLeaves'        => $pendingLeaves,
            'todayAttendance'      => $todayAttendance,
            'upcomingAppointments' => $upcomingAppointments,
        ]);
    }
}
