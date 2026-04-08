<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check() && in_array(Auth::user()->role, ['admin', 'hr']);
    }

    public function rules(): array
    {
        $employeeId = $this->route('employee')->id;

        return [
            'department_id'   => ['required', 'integer', 'exists:departments,id'],
            'employee_code'   => ['required', 'string', 'max:50', Rule::unique('employees', 'employee_code')->ignore($employeeId)],
            'first_name'      => ['required', 'string', 'max:100'],
            'last_name'       => ['required', 'string', 'max:100'],
            'phone'           => ['nullable', 'string', 'max:20'],
            'address'         => ['nullable', 'string', 'max:500'],
            'date_of_birth'   => ['nullable', 'date', 'before:today'],
            'gender'          => ['nullable', 'in:male,female,other'],
            'designation'     => ['required', 'string', 'max:150'],
            'employment_type' => ['required', 'in:full_time,part_time,contract'],
            'joining_date'    => ['required', 'date'],
            'leaving_date'    => ['nullable', 'date', 'after_or_equal:joining_date'],
            'basic_salary'    => ['required', 'numeric', 'min:0'],
            'profile_photo'   => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'status'          => ['required', 'in:active,inactive,terminated'],
        ];
    }

    public function messages(): array
    {
        return [
            'employee_code.unique'        => 'This employee code is already taken.',
            'date_of_birth.before'        => 'Date of birth must be in the past.',
            'leaving_date.after_or_equal' => 'Leaving date must be on or after joining date.',
            'profile_photo.max'           => 'Profile photo must not exceed 2MB.',
        ];
    }
}
