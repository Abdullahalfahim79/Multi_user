@extends('layouts.app')
@section('title', 'Create Profile')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow-sm">
            <div class="card-header">Create profile</div>
            <div class="card-body">
                <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                    @csrf
                    @include('profile._form')
                    <button class="btn btn-primary" type="submit">Save profile</button>
                    <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
