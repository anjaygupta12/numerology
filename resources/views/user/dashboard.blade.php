@extends('layouts.user')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <h4 class="content-title">Dashboard</h4>
        <span>Welcome to your numerology journey</span>
    </div>
    <div class="content-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
                    
        <!-- User Details -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="dashboard-card-header">
                        <h5 class="mb-0"><i class="fas fa-user-circle me-2"></i>Your Numerology Profile</h5>
                    </div>
                    <div class="dashboard-card-body">
                        <div class="row align-items-center">
                            <div class="col-md-3 text-center mb-4 mb-md-0">
                                <div class="rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 120px; height: 120px; background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); color: white; font-size: 3rem;">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="text-muted small">Full Name</label>
                                            <p class="mb-0 fw-bold">{{ $user->name }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-muted small">Email Address</label>
                                            <p class="mb-0">{{ $user->email }}</p>
                                        </div>
                                        <div>
                                            <label class="text-muted small">Member Since</label>
                                            <p class="mb-0">{{ $user->created_at->format('F d, Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="text-muted small">Account Status</label>
                                            <p class="mb-0"><span class="badge bg-success">Active</span></p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-muted small">Total Orders</label>
                                            <p class="mb-0">{{ count($orders) }}</p>
                                        </div>
                                        <div>
                                            <label class="text-muted small">Completed Orders</label>
                                            <p class="mb-0">{{ $completedOrders }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        
        <!-- Pending Orders -->
        <div class="dashboard-card mb-4">
            <div class="dashboard-card-header">
                <h5 class="mb-0"><i class="fas fa-shopping-bag me-2"></i>Pending Orders</h5>
            </div>
            <div class="dashboard-card-body">
                @if($pendingOrders > 0)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Package</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pendingOrdersList as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->package->name }}</td>
                                        <td>₹{{ number_format($order->amount, 2) }}</td>
                                        <td>{{ $order->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <a href="{{ route('user.orders.show', $order) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-eye me-1"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                        <h5>No Pending Orders</h5>
                        <p class="text-muted">You don't have any pending orders at the moment.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
