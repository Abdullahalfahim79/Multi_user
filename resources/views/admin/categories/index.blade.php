@extends('layouts.app')
@section('title', 'Categories')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Categories</h3>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add category</a>
</div>

<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead><tr><th>#</th><th>Name</th><th>Description</th><th>Products</th><th class="text-end">Actions</th></tr></thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($category->description, 60) }}</td>
                    <td>{{ $category->products_count }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.categories.show', $category) }}" class="btn btn-sm btn-outline-secondary">View</a>
                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" class="d-inline"
                              onsubmit="return confirm('Delete this category? Its products will be kept without a category.');">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center text-muted py-4">No categories yet. Add your first category.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">{{ $categories->links('pagination::bootstrap-5') }}</div>
@endsection
