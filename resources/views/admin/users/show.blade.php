@extends('layouts.app')
@section('title', 'User Details')

@section('content')
<div class="row justify-content-center"><div class="col-md-7">
    <div class="card shadow-sm">
        <div class="card-header">User details</div>
        <div class="card-body">
            @if($user->profile && $user->profile->profile_image)
                <img src="{{ asset('storage/'.$user->profile->profile_image) }}" class="avatar mb-3" alt="Profile image">
            @endif
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> {{ $user->is_admin ? 'Admin' : 'User' }}</p>
            <p><strong>Phone:</strong> {{ $user->profile->phone ?? 'Not set' }}</p>
            <p><strong>Address:</strong> {{ $user->profile->address ?? 'Not set' }}</p>
            <p class="text-muted mb-3">Joined {{ $user->created_at->format('d M Y') }}</p>
            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Back</a>
        </div>
    </div>
</div></div>
@endsection
