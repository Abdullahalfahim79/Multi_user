@extends('layouts.app')
@section('title', 'Edit Category')

@section('content')
<div class="row justify-content-center"><div class="col-md-6">
    <div class="card shadow-sm">
        <div class="card-header">Edit category</div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.categories.update', $category) }}">
                @csrf @method('PUT')
                @include('admin.categories._form')
                <button class="btn btn-primary" type="submit">Save changes</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div></div>
@endsection
