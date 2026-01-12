@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Sidebar / Stats -->
        <div class="col-md-4 mb-4">
            <div class="card shadow border-0 rounded-4 mb-4 bg-success text-white">
                <div class="card-body p-4 text-center">
                    <div class="d-flex justify-content-center mb-3">
                        @if($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="rounded-circle object-fit-cover shadow-sm bg-white" style="width: 80px; height: 80px; border: 3px solid rgba(255,255,255,0.5);">
                        @else
                            <div class="bg-white text-success rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 80px; height: 80px; font-size: 2rem;">
                                {{ substr($user->username, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    <h4 class="fw-bold">{{ $user->username }}</h4>
                    <p class="mb-0 text-white-50">{{ $user->email }}</p>
                </div>
            </div>

            <!-- Loyalty Stats -->
            <div class="card shadow border-0 rounded-4 mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold text-success mb-3"><i class="bi bi-award-fill me-2"></i> Loyalty Program</h5>
                    
                    <div class="text-center mb-4">
                        <div class="display-4 fw-bold text-dark">{{ $totalMeals }}</div>
                        <div class="text-muted small text-uppercase">Total Meals</div>
                    </div>

                    @if($voucherAvailable)
                        <div class="alert alert-warning border-2 border-warning text-center fade-in">
                            <i class="bi bi-ticket-perforated-fill fs-1 mb-2"></i><br>
                            <strong>🎉 CONGRATULATIONS! 🎉</strong><br>
                            You have a <span class="badge bg-danger">20% OFF</span> voucher available for your next meal!
                            <div class="mt-2 small text-muted">Show this screen to the cashier.</div>
                        </div>
                    @else
                        <div class="progress mb-2" style="height: 10px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($totalMeals % 10) * 10 }}%"></div>
                        </div>
                        <p class="text-center small text-muted">{{ $mealsToNextVoucher }} more meals for a 20% discount!</p>
                    @endif

                    <hr>
                    <div class="d-grid">
                        <a href="{{ route('scan.qr') }}" class="btn btn-outline-dark btn-sm">
                            <i class="bi bi-qr-code-scan me-2"></i> Simulate QR Scan
                        </a>
                        <small class="text-center text-muted mt-2 fst-italic">(Click to simulate onsite scan)</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings & History -->
        <div class="col-md-8">
            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-white border-0 p-4 pb-0">
                    <ul class="nav nav-tabs card-header-tabs" id="profileTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active fw-bold" id="history-tab" data-bs-toggle="tab" href="#history" role="tab">Transaction History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" id="settings-tab" data-bs-toggle="tab" href="#settings" role="tab">Account Settings</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content" id="profileTabContent">
                        <!-- History Tab -->
                        <div class="tab-pane fade show active" id="history" role="tabpanel">
                            @if($transactions->isEmpty())
                                <div class="text-center py-5 text-muted">
                                    <i class="bi bi-receipt fs-1 mb-3"></i>
                                    <p>No transactions yet. Start eating to earn rewards!</p>
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Date & Time</th>
                                                <th>Day</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($transactions as $index => $transaction)
                                            <tr class="{{ $transaction->is_milestone ? 'table-warning' : '' }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $transaction->created_at->format('d M Y, H:i') }}</td>
                                                <td>{{ $transaction->created_at->format('l') }}</td>
                                                <td>
                                                    @if($transaction->is_milestone)
                                                        <span class="badge bg-warning text-dark"><i class="bi bi-star-fill"></i> Milestone (Voucher)</span>
                                                    @else
                                                        <span class="badge bg-secondary">Recorded</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>

                        <!-- Settings Tab -->
                        <div class="tab-pane fade" id="settings" role="tabpanel">
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Profile Picture Upload -->
                                <div class="text-center mb-5">
                                    <div class="position-relative d-inline-block">
                                        @if($user->avatar)
                                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="rounded-circle object-fit-cover shadow-sm" style="width: 150px; height: 150px; border: 4px solid var(--light-bg);">
                                        @else
                                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 150px; height: 150px; border: 4px solid var(--light-bg); font-size: 3rem;">
                                                {{ substr($user->username, 0, 1) }}
                                            </div>
                                        @endif
                                        <label for="avatar_upload" class="position-absolute bottom-0 end-0 bg-white shadow-sm rounded-circle p-2 cursor-pointer hover-scale" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border: 1px solid #ddd;">
                                            <i class="bi bi-pencil-fill text-dark small"></i>
                                        </label>
                                        <input type="file" name="avatar" id="avatar_upload" class="d-none" onchange="previewAvatar(this)">
                                    </div>
                                    <p class="text-muted small mt-2">Click pen icon to change photo</p>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                </div>

                                <hr class="my-4">
                                <h5 class="mb-3 text-success">Change Password</h5>
                                <p class="text-muted small">Leave blank if you don't want to change it.</p>

                                <div class="mb-3">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" id="new_password" class="form-control">
                                        <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('new_password')"><i class="bi bi-eye"></i></button>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Confirm New Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password_confirmation" id="conf_password" class="form-control">
                                        <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('conf_password')"><i class="bi bi-eye"></i></button>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success rounded-pill px-5 fw-bold hover-fluid w-100 w-md-auto">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword(id) {
    const input = document.getElementById(id);
    const icon = event.currentTarget.querySelector('i');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    }
}
</script>
@endsection
