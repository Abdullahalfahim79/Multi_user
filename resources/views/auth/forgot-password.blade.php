@extends('layouts.app')
@section('title', 'Forgot password')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-header">Reset your password</div>
            <div class="card-body">
                <p class="text-muted">Enter your email and we will send you a link to choose a new password.</p>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                               class="form-control @error('email') is-invalid @enderror">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <button class="btn btn-primary w-100" type="submit">Send reset link</button>
                </form>
            </div>
            <div class="card-footer text-center"><a href="{{ route('login') }}">Back to login</a></div>
        </div>
    </div>
</div>
@endsection
