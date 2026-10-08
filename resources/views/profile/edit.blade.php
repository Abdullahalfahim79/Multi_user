@extends('layouts.app')
@section('title', 'Edit Profile')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow-sm">
            <div class="card-header">Edit profile</div>
            <div class="card-body">
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    @include('profile._form')
                    <button class="btn btn-primary" type="submit">Save changes</button>
                    <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
