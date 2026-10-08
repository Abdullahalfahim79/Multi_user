@extends('layouts.app')
@section('title', 'Products')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Products</h3>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add product</a>
</div>

<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead><tr><th>Image</th><th>Name</th><th>Category</th><th>Price</th><th class="text-end">Actions</th></tr></thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" class="thumb" alt="">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->category_name ?? 'None' }}</td>
                    <td>{{ number_format($product->price, 2) }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.products.show', $product) }}" class="btn btn-sm btn-outline-secondary">View</a>
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="d-inline"
                              onsubmit="return confirm('Delete this product?');">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center text-muted py-4">No products yet. Add your first product.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">{{ $products->links('pagination::bootstrap-5') }}</div>
@endsection
