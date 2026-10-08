@extends('layouts.app')
@section('title', 'Admin Dashboard')

@section('content')
<h3 class="mb-4">Admin dashboard</h3>

<div class="row g-3 mb-4">
    @foreach([
        ['Users', $totalUsers, 'admin.users.index'],
        ['Admins', $totalAdmins, 'admin.users.index'],
        ['Products', $totalProducts, 'admin.products.index'],
        ['Categories', $totalCategories, 'admin.categories.index'],
    ] as [$label, $count, $route])
        <div class="col-6 col-lg-3">
            <a href="{{ route($route) }}" class="text-decoration-none">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-muted">{{ $label }}</div>
                        <div class="fs-2 fw-semibold text-dark">{{ $count }}</div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>

<div class="card shadow-sm">
    <div class="card-header">Newest users</div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead><tr><th>Name</th><th>Email</th><th>Role</th><th>Joined</th></tr></thead>
            <tbody>
            @foreach($latestUsers as $u)
                <tr>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{!! $u->is_admin ? '<span class="badge bg-danger">Admin</span>' : '<span class="badge bg-secondary">User</span>' !!}</td>
                    <td>{{ $u->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
