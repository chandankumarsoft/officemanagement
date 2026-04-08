@extends('layouts.backend')

@section('title', 'Schedule Appointment')

@section('content')

    @csrf

    @error('title')
        {{ $message }}
    @enderror

    @error('assigned_to')
        {{ $message }}
    @enderror

    @error('appointment_date')
        {{ $message }}
    @enderror

    @error('start_time')
        {{ $message }}
    @enderror

    @error('end_time')
        {{ $message }}
    @enderror

@endsection
