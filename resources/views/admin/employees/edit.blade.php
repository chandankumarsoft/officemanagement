@extends('layouts.backend')

@section('title', 'Edit Employee')

@section('content')

    @csrf
    @method('PUT')

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

    @error('leaving_date')
        {{ $message }}
    @enderror

    @error('basic_salary')
        {{ $message }}
    @enderror

@endsection
