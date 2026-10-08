@extends('layouts.app')
@section('title', 'My Profile')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow-sm">
            <div class="card-header">My profile</div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    @if($profile && $profile->profile_image)
                        <img src="{{ asset('storage/'.$profile->profile_image) }}" class="avatar me-3" alt="Profile image">
                    @endif
                    <div>
                        <h5 class="mb-0">{{ $user->name }}</h5>
                        <div class="text-muted">{{ $user->email }}</div>
                    </div>
                </div>

                @if($profile)
                    <p><strong>Phone:</strong> {{ $profile->phone ?: 'Not set' }}</p>
                    <p><strong>Address:</strong> {{ $profile->address ?: 'Not set' }}</p>

                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit profile</a>
                    <form method="POST" action="{{ route('profile.destroy') }}" class="d-inline"
                          onsubmit="return confirm('Delete your profile?');">
                        @csrf @method('DELETE')
                        <button class="btn btn-outline-danger" type="submit">Delete profile</button>
                    </form>
                @else
                    <p class="text-muted">You have not created a profile yet.</p>
                    <a href="{{ route('profile.create') }}" class="btn btn-primary">Create profile</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
