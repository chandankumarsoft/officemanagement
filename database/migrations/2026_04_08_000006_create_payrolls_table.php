<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->cascadeOnDelete();
            $table->unsignedSmallInteger('pay_month');
            $table->unsignedSmallInteger('pay_year');
            $table->decimal('basic_salary', 12, 2)->default(0.00);
            $table->decimal('house_rent_allowance', 12, 2)->default(0.00);
            $table->decimal('transport_allowance', 12, 2)->default(0.00);
            $table->decimal('medical_allowance', 12, 2)->default(0.00);
            $table->decimal('other_allowances', 12, 2)->default(0.00);
            $table->decimal('gross_salary', 12, 2)->default(0.00);
            $table->decimal('tax_deduction', 12, 2)->default(0.00);
            $table->decimal('provident_fund', 12, 2)->default(0.00);
            $table->decimal('other_deductions', 12, 2)->default(0.00);
            $table->decimal('total_deductions', 12, 2)->default(0.00);
            $table->decimal('net_salary', 12, 2)->default(0.00);
            $table->unsignedInteger('working_days')->default(0);
            $table->unsignedInteger('present_days')->default(0);
            $table->unsignedInteger('absent_days')->default(0);
            $table->unsignedInteger('leave_days')->default(0);
            $table->enum('status', ['draft', 'processed', 'paid'])->default('draft');
            $table->date('payment_date')->nullable();
            $table->foreignId('generated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['employee_id', 'pay_month', 'pay_year']);
            $table->index('status');
            $table->index(['pay_month', 'pay_year']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
