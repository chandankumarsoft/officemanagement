@extends('layouts.backend')

@section('title', 'Apply for Leave')

@section('content')

    @csrf

    @error('leave_type')
        {{ $message }}
    @enderror

    @error('start_date')
        {{ $message }}
    @enderror

    @error('end_date')
        {{ $message }}
    @enderror

    @error('reason')
        {{ $message }}
    @enderror

@endsection
