@extends('layouts.app')
@section('title', 'Edit Product')

@section('content')
<div class="row justify-content-center"><div class="col-md-7">
    <div class="card shadow-sm">
        <div class="card-header">Edit product</div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
                @csrf @method('PUT')
                @include('admin.products._form')
                <button class="btn btn-primary" type="submit">Save changes</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div></div>
@endsection
