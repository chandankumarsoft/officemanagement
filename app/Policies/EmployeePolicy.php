<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\User;

class EmployeePolicy
{
    /**
     * Admins can view the employee list.
     * HRs can view the employee list.
     * Employees can view only their own profile.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['admin', 'hr']);
    }

    /**
     * Admin and HR can view any employee.
     * Employee can only view their own record.
     */
    public function view(User $user, Employee $employee): bool
    {
        if (in_array($user->role, ['admin', 'hr'])) {
            return true;
        }

        return $user->employee !== null && $user->employee->id === $employee->id;
    }

    /**
     * Only admin and HR can create employees.
     */
    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'hr']);
    }

    /**
     * Only admin and HR can update employees.
     */
    public function update(User $user, Employee $employee): bool
    {
        return in_array($user->role, ['admin', 'hr']);
    }

    /**
     * Only admin can delete employees.
     */
    public function delete(User $user, Employee $employee): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Only admin can restore soft-deleted employees.
     */
    public function restore(User $user, Employee $employee): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Only admin can permanently delete employees.
     */
    public function forceDelete(User $user, Employee $employee): bool
    {
        return $user->role === 'admin';
    }
}
