@extends('layouts.backend')

@section('title', 'Create Payroll')

@section('content')

    @csrf

    @error('employee_id')
        {{ $message }}
    @enderror

    @error('pay_month')
        {{ $message }}
    @enderror

    @error('pay_year')
        {{ $message }}
    @enderror

    @error('basic_salary')
        {{ $message }}
    @enderror

@endsection
