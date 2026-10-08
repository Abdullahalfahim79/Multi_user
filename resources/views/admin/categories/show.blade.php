@extends('layouts.app')
@section('title', 'Category Details')

@section('content')
<div class="row justify-content-center"><div class="col-md-8">
    <div class="card shadow-sm mb-3">
        <div class="card-header">Category details</div>
        <div class="card-body">
            <h4>{{ $category->category_name }}</h4>
            <p>{{ $category->description ?: 'No description.' }}</p>
            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Back</a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header">Products in this category ({{ $category->products->count() }})</div>
        <ul class="list-group list-group-flush">
            @forelse($category->products as $product)
                <li class="list-group-item d-flex justify-content-between">
                    <a href="{{ route('admin.products.show', $product) }}">{{ $product->name }}</a>
                    <span>{{ number_format($product->price, 2) }}</span>
                </li>
            @empty
                <li class="list-group-item text-muted">No products in this category yet.</li>
            @endforelse
        </ul>
    </div>
</div></div>
@endsection
