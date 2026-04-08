<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payroll extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'employee_id',
        'pay_month',
        'pay_year',
        'basic_salary',
        'house_rent_allowance',
        'transport_allowance',
        'medical_allowance',
        'other_allowances',
        'gross_salary',
        'tax_deduction',
        'provident_fund',
        'other_deductions',
        'total_deductions',
        'net_salary',
        'working_days',
        'present_days',
        'absent_days',
        'leave_days',
        'status',
        'payment_date',
        'generated_by',
        'remarks',
    ];

    protected function casts(): array
    {
        return [
            'payment_date'         => 'date',
            'basic_salary'         => 'decimal:2',
            'house_rent_allowance' => 'decimal:2',
            'transport_allowance'  => 'decimal:2',
            'medical_allowance'    => 'decimal:2',
            'other_allowances'     => 'decimal:2',
            'gross_salary'         => 'decimal:2',
            'tax_deduction'        => 'decimal:2',
            'provident_fund'       => 'decimal:2',
            'other_deductions'     => 'decimal:2',
            'total_deductions'     => 'decimal:2',
            'net_salary'           => 'decimal:2',
        ];
    }

    // Relationships

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function generatedBy()
    {
        return $this->belongsTo(User::class, 'generated_by');
    }
}
