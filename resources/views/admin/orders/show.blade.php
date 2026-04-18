@extends('layouts.admin')

@section('title', 'Order Details')

@section('page-title', 'Order Details')

@section('content')
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Order #{{ $order->id }}</h5>
            <div>
                <a href="{{ route('admin.orders.edit', $order) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Back to Orders</a>
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
                            <h6 class="text-muted">Order Information</h6>
                            <table class="table">
                                <tr>
                                    <th style="width: 150px;">Order ID</th>
                                    <td>{{ $order->id }}</td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td>{{ $order->created_at->format('M d, Y h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if($order->status == 'pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @elseif($order->status == 'processing')
                                            <span class="badge bg-info">Processing</span>
                                        @elseif($order->status == 'completed')
                                            <span class="badge bg-success">Completed</span>
                                        @elseif($order->status == 'cancelled')
                                            <span class="badge bg-danger">Cancelled</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Payment Method</th>
                                    <td>{{ $order->payment_method }}</td>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <td>₹{{ number_format($order->amount, 2) }}</td>
                                </tr>
                            </table>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <h6 class="text-muted">User Information</h6>
                                    <table class="table">
                                        <tr>
                                            <th style="width: 100px;">User ID</th>
                                            <td>{{ $order->user->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ $order->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $order->user->email }}</td>
                                        </tr>
                                    </table>
                                    <a href="{{ route('admin.users.show', $order->user) }}" class="btn btn-sm btn-outline-primary">View User Profile</a>
                                </div>
                                
                                <div class="col-md-12">
                                    <h6 class="text-muted">Package Information</h6>
                                    <table class="table">
                                        <tr>
                                            <th style="width: 100px;">Package</th>
                                            <td>{{ $order->package->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Type</th>
                                            <td>{{ ucfirst($order->package->type) }} Numerology</td>
                                        </tr>
                                        <tr>
                                            <th>Price</th>
                                            <td>₹{{ number_format($order->package->price, 2) }}</td>
                                        </tr>
                                    </table>
                                    <a href="{{ route('admin.packages.show', $order->package) }}" class="btn btn-sm btn-outline-primary">View Package Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @if($order->description)
                        <div class="mt-4">
                            <h6 class="text-muted">Additional Information</h6>
                            <p>{{ $order->description }}</p>
                        </div>
                    @endif
                    
                    @if($order->payment_screenshot)
                        <div class="mt-4">
                            <h6 class="text-muted">Payment Screenshot</h6>
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $order->payment_screenshot) }}" alt="Payment Screenshot" class="img-fluid img-thumbnail" style="max-height: 300px;">
                            </div>
                        </div>
                    @endif
                    
                    <div class="mt-4">
                        <h6 class="text-muted">Update Order Status</h6>
                        <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="update_status" value="1">
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <select class="form-select" name="status">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary">Update Status</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection
