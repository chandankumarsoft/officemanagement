@extends('layouts.backend')

@section('title', 'Edit Appointment')

@section('content')

    @csrf
    @method('PUT')

    @error('title')
        {{ $message }}
    @enderror

    @error('status')
        {{ $message }}
    @enderror

@endsection
