@extends('layouts.admin')

@section('title', 'Package Details')

@section('page-title', 'Package Details')

@section('content')
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ $package->name }}</h5>
            <div>
                <a href="{{ route('admin.packages.edit', $package) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">Back to Packages</a>
            </div>
        </div>
        <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <tr>
                                    <th style="width: 200px;">Package ID</th>
                                    <td>{{ $package->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $package->name }}</td>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <td>{{ ucfirst($package->type) }} Numerology</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $package->description }}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>₹{{ number_format($package->price, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if($package->active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $package->created_at->format('M d, Y h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Last Updated</th>
                                    <td>{{ $package->updated_at->format('M d, Y h:i A') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <h6>Orders for this Package</h6>
                        @if($package->orders->isEmpty())
                            <div class="alert alert-info">
                                No orders found for this package.
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>User</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($package->orders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->user->name }}</td>
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
