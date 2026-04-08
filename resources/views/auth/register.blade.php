@extends('layouts.frontend')

@section('title', 'Register')

@section('content')

    @error('name')
        {{ $message }}
    @enderror

    @error('email')
        {{ $message }}
    @enderror

    @error('password')
        {{ $message }}
    @enderror

@endsection
