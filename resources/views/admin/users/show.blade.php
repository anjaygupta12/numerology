@extends('layouts.admin')

@section('title', 'User Details')

@section('page-title', 'User Details')

@section('content')
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ $user->name }}'s Profile</h5>
            <div>
                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back to Users</a>
            </div>
        </div>
        <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-muted">User Information</h6>
                            <table class="table">
                                <tr>
                                    <th style="width: 150px;">User ID</th>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>
                                        @if($user->role == 'admin')
                                            <span class="badge bg-danger">Admin</span>
                                        @else
                                            <span class="badge bg-primary">User</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Registered On</th>
                                    <td>{{ $user->created_at->format('M d, Y h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Last Updated</th>
                                    <td>{{ $user->updated_at->format('M d, Y h:i A') }}</td>
                                </tr>
                            </table>
                        </div>
                        
                        <div class="col-md-6">
                            <h6 class="text-muted">Statistics</h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="card bg-primary text-white">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $user->orders->count() }}</h5>
                                            <p class="card-text">Total Orders</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card bg-success text-white">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $user->orders->where('status', 'completed')->count() }}</h5>
                                            <p class="card-text">Completed Orders</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card bg-warning text-dark">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $user->orders->where('status', 'pending')->count() }}</h5>
                                            <p class="card-text">Pending Orders</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card bg-info text-white">
                                        <div class="card-body">
                                            <h5 class="card-title">₹{{ number_format($user->orders->sum('amount'), 2) }}</h5>
                                            <p class="card-text">Total Spent</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <h6>User Orders</h6>
                        @if($user->orders->isEmpty())
                            <div class="alert alert-info">
                                No orders found for this user.
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Package</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user->orders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->package->name }}</td>
                                                <td>₹{{ number_format($order->amount, 2) }}</td>
                                                <td>
                                                    @if($order->status == 'pending')
                                                        <span class="badge bg-warning text-dark">Pending</span>
                                                    @elseif($order->status == 'completed')
                                                        <span class="badge bg-success">Completed</span>
                                                    @elseif($order->status == 'cancelled')
                                                        <span class="badge bg-danger">Cancelled</span>
                                                    @endif
                                                </td>
                                                <td>{{ $order->created_at->format('M d, Y') }}</td>
                                                <td>
                                                    <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-info">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
@endsection
