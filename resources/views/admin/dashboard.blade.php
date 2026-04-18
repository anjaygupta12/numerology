@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('page-title', 'Dashboard')

@section('content')
    <div class="card dashboard-card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Dashboard Overview</h5>
        </div>
        <div class="card-body">
            <!-- Dashboard Cards -->
            <div class="row mb-4">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="card-icon text-primary">
                            <i class="bi bi-people"></i>
                        </div>
                        <h5 class="card-title">Total Users</h5>
                        <h2 class="mb-0">{{ $totalUsers }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="card-icon text-success">
                            <i class="bi bi-box"></i>
                        </div>
                        <h5 class="card-title">Total Packages</h5>
                        <h2 class="mb-0">{{ $totalPackages }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="card-icon text-info">
                            <i class="bi bi-cart"></i>
                        </div>
                        <h5 class="card-title">Total Orders</h5>
                        <h2 class="mb-0">{{ $totalOrders }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Order Status</h5>
                        <div class="mt-4">
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span>Pending Orders</span>
                                    <span>{{ $pendingOrders }}</span>
                                </div>
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $totalOrders > 0 ? ($pendingOrders / $totalOrders) * 100 : 0 }}%"></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span>Completed Orders</span>
                                    <span>{{ $completedOrders }}</span>
                                </div>
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $totalOrders > 0 ? ($completedOrders / $totalOrders) * 100 : 0 }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Quick Actions</h5>
                        <div class="list-group mt-3">
                            <a href="{{ route('admin.packages.create') }}" class="list-group-item list-group-item-action">
                                <i class="bi bi-plus-circle me-2"></i> Add New Package
                            </a>
                            <a href="{{ route('admin.users.create') }}" class="list-group-item list-group-item-action">
                                <i class="bi bi-person-plus me-2"></i> Add New User
                            </a>
                            <a href="{{ route('admin.orders.index') }}" class="list-group-item list-group-item-action">
                                <i class="bi bi-list-check me-2"></i> Manage Orders
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Recent Orders</h5>
            <div>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">View All Orders</a>
            </div>
        </div>
        <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Package</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentOrders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->package->name }}</td>
                                    <td>₹{{ number_format($order->amount, 2) }}</td>
                                    <td>
                                        @if($order->status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($order->status == 'processing')
                                            <span class="badge bg-info">Processing</span>
                                        @elseif($order->status == 'completed')
                                            <span class="badge bg-success">Completed</span>
                                        @elseif($order->status == 'cancelled')
                                            <span class="badge bg-danger">Cancelled</span>
                                        @endif
                                    </td>
                                    <td>{{ $order->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            
                            @if(count($recentOrders) == 0)
                                <tr>
                                    <td colspan="7" class="text-center">No orders found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
