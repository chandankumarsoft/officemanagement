@extends('layouts.backend')

@section('title', 'Create Department')

@section('content')

    @csrf

    @error('name')
        {{ $message }}
    @enderror

    @error('code')
        {{ $message }}
    @enderror

@endsection
