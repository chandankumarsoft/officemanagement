<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PayrollController extends Controller
{
    public function index()
    {
        $employee = Auth::user()->employee;

        if (!$employee) {
            return view('employee.payrolls.index', [
                'payrolls' => collect(),
            ]);
        }

        $payrolls = $employee->payrolls()
            ->where('status', 'paid')
            ->orderBy('pay_year', 'desc')
            ->orderBy('pay_month', 'desc')
            ->paginate(12);

        return view('employee.payrolls.index', [
            'payrolls' => $payrolls,
        ]);
    }

    public function show(\App\Models\Payroll $payroll)
    {
        $employee = Auth::user()->employee;

        if (!$employee || $payroll->employee_id !== $employee->id) {
            abort(403, 'You are not authorized to view this payslip.');
        }

        $payroll->load(['employee.department', 'generatedBy']);

        return view('employee.payrolls.show', [
            'payroll' => $payroll,
        ]);
    }
}
