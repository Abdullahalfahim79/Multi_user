@extends('layouts.app')
@section('title', 'Product Details')

@section('content')
<div class="row justify-content-center"><div class="col-md-7">
    <div class="card shadow-sm">
        <div class="card-header">Product details</div>
        <div class="card-body">
            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid rounded mb-3" style="max-height:260px" alt="">
            @endif
            <h4>{{ $product->name }}</h4>
            <p class="text-muted">{{ $product->category->category_name ?? 'No category' }}</p>
            <p class="fs-5">{{ number_format($product->price, 2) }}</p>
            <p>{{ $product->description ?: 'No description.' }}</p>
            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">Back</a>
        </div>
    </div>
</div></div>
@endsection
