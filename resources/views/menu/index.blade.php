@extends('layouts.app')

@section('title', 'Food Menu')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5 fw-bold text-success">Our Menu</h1>

    <!-- Search & Filter -->
    <div class="row mb-5 justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('menu.index') }}" method="GET" class="d-flex gap-2">
                <select name="category" class="form-select w-auto" onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    <option value="food" {{ request('category') == 'food' ? 'selected' : '' }}>Food</option>
                    <option value="drinks" {{ request('category') == 'drinks' ? 'selected' : '' }}>Drinks</option>
                </select>
                <select name="sort" class="form-select w-auto" onchange="this.form.submit()">
                    <option value="">Sort By</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name: A - Z</option>
                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name: Z - A</option>
                </select>
                <input type="text" name="search" class="form-control" placeholder="Search menu..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-success">Search</button>
            </form>
        </div>
    </div>

    <div class="row">
        @forelse($menus as $menu)
        <div class="col-md-4 mb-4 fade-in">
            <div class="card h-100 shadow-sm border-0">
                <div class="position-relative">
                    <img src="{{ $menu->image ? asset('storage/' . $menu->image) : 'https://placehold.co/400x300?text=No+Image' }}" class="card-img-top" alt="{{ $menu->name }}" style="height: 250px; object-fit: cover;">
                    <span class="position-absolute top-0 end-0 bg-warning text-dark fw-bold px-3 py-1 m-2 rounded">{{ ucfirst($menu->category) }}</span>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="card-title fw-bold mb-0">{{ $menu->name }}</h5>
                        <span class="text-success fw-bold">Rp {{ number_format($menu->price, 0, ',', '.') }}</span>
                    </div>
                    <p class="card-text text-muted small">{{ $menu->description }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <h3>No menu items found.</h3>
            <p class="text-muted">Try adjusting your search or category.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
