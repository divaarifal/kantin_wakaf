@extends('layouts.admin')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h2 class="text-white fw-bold">Customer Management</h2>
        <p class="text-white-50">Manage registered customers and view their achievements.</p>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card border-0 shadow-sm glass-panel text-white">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-dark table-hover mb-0 align-middle">
                <thead class="bg-dark text-white-50">
                    <tr>
                        <th class="ps-4">No</th>
                        <th>User</th>
                        <th>Transactions</th>
                        <th>Vouchers Earned</th>
                        <th>Progress to Next</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $index => $user)
                    <tr>
                        <td class="ps-4">{{ $index + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                @if($user->avatar)
                                    <img src="{{ asset('storage/' . $user->avatar) }}" class="rounded-circle me-3" width="40" height="40" alt="Avatar">
                                @else
                                    <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                        <i class="bi bi-person-fill"></i>
                                    </div>
                                @endif
                                <div>
                                    <div class="fw-bold">{{ $user->name }}</div>
                                    <div class="small text-white-50">{{ $user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-primary rounded-pill">{{ $user->transactions_count }}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-ticket-perforated-fill text-warning me-2"></i>
                                <span class="fw-bold">{{ $user->vouchers_earned }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center" style="width: 150px;">
                                <div class="progress flex-grow-1" style="height: 6px; background: rgba(255,255,255,0.1);">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $user->progress }}%" aria-valuenow="{{ $user->progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="small ms-2 text-white-50">{{ $user->progress }}%</span>
                            </div>
                        </td>
                        <td class="text-end pe-4">
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-white-50">
                            <i class="bi bi-people fs-1 d-block mb-3"></i>
                            No users found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
