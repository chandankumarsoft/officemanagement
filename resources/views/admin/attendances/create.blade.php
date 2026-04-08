@extends('layouts.backend')

@section('title', 'Record Attendance')

@section('content')

    @csrf

    @error('employee_id')
        {{ $message }}
    @enderror

    @error('attendance_date')
        {{ $message }}
    @enderror

    @error('status')
        {{ $message }}
    @enderror

@endsection
