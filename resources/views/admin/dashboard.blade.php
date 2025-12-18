@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Dashboard Overview</h1>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card bg-success text-white shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Total Menu Items</h6>
                            <h2 class="display-4 fw-bold my-2">{{ \App\Models\Menu::count() }}</h2>
                        </div>
                        <i class="bi bi-cup-hot display-4 opacity-50"></i>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="{{ route('admin.menus.index') }}" class="text-white text-decoration-none">Manage Menu &rarr;</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-warning text-dark shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Gallery Photos</h6>
                            <h2 class="display-4 fw-bold my-2">{{ \App\Models\Gallery::count() }}</h2>
                        </div>
                        <i class="bi bi-images display-4 opacity-50"></i>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="{{ route('admin.galleries.index') }}" class="text-dark text-decoration-none">Manage Gallery &rarr;</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-primary text-white shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Admin Users</h6>
                            <h2 class="display-4 fw-bold my-2">{{ \App\Models\User::count() }}</h2>
                        </div>
                        <i class="bi bi-people display-4 opacity-50"></i>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <span class="text-white-50">System Administrators</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Recent Menu Items</h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(\App\Models\Menu::latest()->take(5)->get() as $menu)
                            <tr>
                                <td>{{ $menu->name }}</td>
                                <td><span class="badge bg-secondary">{{ $menu->category }}</span></td>
                                <td>{{ number_format($menu->price) }}</td>
                                <td>{{ $menu->created_at->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
