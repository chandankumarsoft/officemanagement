@extends('layouts.backend')

@section('title', 'Add Employee')

@section('content')

    @csrf

    @error('user_id')
        {{ $message }}
    @enderror

    @error('employee_code')
        {{ $message }}
    @enderror

    @error('first_name')
        {{ $message }}
    @enderror

    @error('last_name')
        {{ $message }}
    @enderror

    @error('department_id')
        {{ $message }}
    @enderror

    @error('designation')
        {{ $message }}
    @enderror

    @error('joining_date')
        {{ $message }}
    @enderror

    @error('basic_salary')
        {{ $message }}
    @enderror

@endsection
