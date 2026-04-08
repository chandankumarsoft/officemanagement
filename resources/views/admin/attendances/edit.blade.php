@extends('layouts.backend')

@section('title', 'Edit Attendance')

@section('content')

    @csrf
    @method('PUT')

    @error('status')
        {{ $message }}
    @enderror

@endsection
