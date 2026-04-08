@extends('layouts.frontend')

@section('title', 'Login')

@section('content')

    @error('email')
        {{ $message }}
    @enderror

@endsection
