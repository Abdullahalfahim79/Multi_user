@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<h3 class="mb-4">Welcome, {{ $user->name }}</h3>

<div class="row g-3">
    <div class="col-md-6">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Your account</h5>
                <p class="mb-1"><strong>Email:</strong> {{ $user->email }}</p>
                <p class="mb-0"><strong>Role:</strong> <span class="badge bg-secondary">User</span></p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Your profile</h5>
                @if($profile)
                    <p class="mb-1"><strong>Phone:</strong> {{ $profile->phone ?: 'Not set' }}</p>
                    <p><strong>Address:</strong> {{ $profile->address ?: 'Not set' }}</p>
                    <a href="{{ route('profile.show') }}" class="btn btn-sm btn-primary">View profile</a>
                @else
                    <p class="text-muted">You have not created a profile yet.</p>
                    <a href="{{ route('profile.create') }}" class="btn btn-sm btn-primary">Create profile</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
