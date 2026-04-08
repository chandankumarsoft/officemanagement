@extends('layouts.backend')

@section('title', 'Edit Department')

@section('content')

    @csrf
    @method('PUT')

    @error('name')
        {{ $message }}
    @enderror

    @error('code')
        {{ $message }}
    @enderror

@endsection
