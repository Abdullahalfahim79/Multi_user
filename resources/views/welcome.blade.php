@extends('layouts.app')
@section('title', 'Home')

@section('content')
<div class="p-5 mb-4 bg-white rounded-3 border">
    <h1 class="display-6">Multi User Management System</h1>
    <p class="lead mb-4">Manage users, products, categories and profiles with admin and user roles.</p>
    @guest
        <a href="{{ route('login') }}" class="btn btn-primary me-2">Log in</a>
        <a href="{{ route('register') }}" class="btn btn-outline-primary">Create an account</a>
    @else
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Go to dashboard</a>
    @endguest
</div>
@endsection
