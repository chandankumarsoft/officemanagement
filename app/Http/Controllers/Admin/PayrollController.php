<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Payroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayrollController extends Controller
{
    public function index(Request $request)
    {
        $query = Payroll::with('employee.department');

        if ($request->filled('month')) {
            $query->where('pay_month', $request->input('month'));
        }

        if ($request->filled('year')) {
            $query->where('pay_year', $request->input('year'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $payrolls = $query->orderBy('pay_year', 'desc')
            ->orderBy('pay_month', 'desc')
            ->paginate(20)
            ->withQueryString();

        return view('admin.payrolls.index', [
            'payrolls' => $payrolls,
        ]);
    }

    public function create()
    {
        $employees = Employee::where('status', 'active')->orderBy('first_name')->get();

        return view('admin.payrolls.create', [
            'employees' => $employees,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id'          => ['required', 'integer', 'exists:employees,id'],
            'pay_month'            => ['required', 'integer', 'min:1', 'max:12'],
            'pay_year'             => ['required', 'integer', 'min:2000', 'max:2100'],
            'basic_salary'         => ['required', 'numeric', 'min:0'],
            'house_rent_allowance' => ['required', 'numeric', 'min:0'],
            'transport_allowance'  => ['required', 'numeric', 'min:0'],
            'medical_allowance'    => ['required', 'numeric', 'min:0'],
            'other_allowances'     => ['required', 'numeric', 'min:0'],
            'tax_deduction'        => ['required', 'numeric', 'min:0'],
            'provident_fund'       => ['required', 'numeric', 'min:0'],
            'other_deductions'     => ['required', 'numeric', 'min:0'],
            'working_days'         => ['required', 'integer', 'min:0'],
            'present_days'         => ['required', 'integer', 'min:0'],
            'absent_days'          => ['required', 'integer', 'min:0'],
            'leave_days'           => ['required', 'integer', 'min:0'],
            'remarks'              => ['nullable', 'string', 'max:500'],
        ]);

        $existingPayroll = Payroll::where('employee_id', $request->input('employee_id'))
            ->where('pay_month', $request->input('pay_month'))
            ->where('pay_year', $request->input('pay_year'))
            ->first();

        if ($existingPayroll) {
            return back()->withErrors(['pay_month' => 'Payroll for this employee for the selected month and year already exists.'])->withInput();
        }

        $grossSalary = $request->input('basic_salary')
            + $request->input('house_rent_allowance')
            + $request->input('transport_allowance')
            + $request->input('medical_allowance')
            + $request->input('other_allowances');

        $totalDeductions = $request->input('tax_deduction')
            + $request->input('provident_fund')
            + $request->input('other_deductions');

        $netSalary = $grossSalary - $totalDeductions;

        $payroll = new Payroll();
        $payroll->employee_id          = $request->input('employee_id');
        $payroll->pay_month            = $request->input('pay_month');
        $payroll->pay_year             = $request->input('pay_year');
        $payroll->basic_salary         = $request->input('basic_salary');
        $payroll->house_rent_allowance = $request->input('house_rent_allowance');
        $payroll->transport_allowance  = $request->input('transport_allowance');
        $payroll->medical_allowance    = $request->input('medical_allowance');
        $payroll->other_allowances     = $request->input('other_allowances');
        $payroll->gross_salary         = $grossSalary;
        $payroll->tax_deduction        = $request->input('tax_deduction');
        $payroll->provident_fund       = $request->input('provident_fund');
        $payroll->other_deductions     = $request->input('other_deductions');
        $payroll->total_deductions     = $totalDeductions;
        $payroll->net_salary           = $netSalary;
        $payroll->working_days         = $request->input('working_days');
        $payroll->present_days         = $request->input('present_days');
        $payroll->absent_days          = $request->input('absent_days');
        $payroll->leave_days           = $request->input('leave_days');
        $payroll->status               = 'draft';
        $payroll->generated_by         = Auth::id();
        $payroll->remarks              = $request->input('remarks');
        $payroll->save();

        return redirect()->route('admin.payrolls.index')->with('success', 'Payroll created successfully.');
    }

    public function show(Payroll $payroll)
    {
        $payroll->load(['employee.department', 'generatedBy']);

        return view('admin.payrolls.show', [
            'payroll' => $payroll,
        ]);
    }

    public function markAsPaid(Request $request, Payroll $payroll)
    {
        $request->validate([
            'payment_date' => ['required', 'date'],
        ]);

        if ($payroll->status === 'paid') {
            return back()->with('error', 'This payroll has already been marked as paid.');
        }

        $payroll->status       = 'paid';
        $payroll->payment_date = $request->input('payment_date');
        $payroll->save();

        return redirect()->route('admin.payrolls.show', $payroll)->with('success', 'Payroll marked as paid.');
    }

    public function destroy(Payroll $payroll)
    {
        if ($payroll->status === 'paid') {
            return back()->with('error', 'Cannot delete a payroll that has been marked as paid.');
        }

        $payroll->delete();

        return redirect()->route('admin.payrolls.index')->with('success', 'Payroll record deleted successfully.');
    }
}
