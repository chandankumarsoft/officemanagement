@extends('layouts.backend')

@section('title', 'Leave Request Details')

@section('content')

    @csrf

    @error('approval_remarks')
        {{ $message }}
    @enderror

@endsection
