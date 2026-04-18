@extends('layouts.admin')

@section('title', 'Manage Orders')

@section('page-title', 'Manage Orders')

@section('content')
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Orders List</h5>
        </div>
        <div class="card-body">
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
                    
                    <div class="mb-3">
                        <div class="btn-group" role="group">
                            <a href="{{ route('admin.orders.index') }}" class="btn {{ request()->query('status') == null ? 'btn-primary' : 'btn-outline-primary' }}">All Orders</a>
                            <a href="{{ route('admin.orders.index', ['status' => 'pending']) }}" class="btn {{ request()->query('status') == 'pending' ? 'btn-primary' : 'btn-outline-primary' }}">Pending</a>
                            <a href="{{ route('admin.orders.index', ['status' => 'processing']) }}" class="btn {{ request()->query('status') == 'processing' ? 'btn-primary' : 'btn-outline-primary' }}">Processing</a>
                            <a href="{{ route('admin.orders.index', ['status' => 'completed']) }}" class="btn {{ request()->query('status') == 'completed' ? 'btn-primary' : 'btn-outline-primary' }}">Completed</a>
                            <a href="{{ route('admin.orders.index', ['status' => 'cancelled']) }}" class="btn {{ request()->query('status') == 'cancelled' ? 'btn-primary' : 'btn-outline-primary' }}">Cancelled</a>
                        </div>
                    </div>
                    
                    @if($orders->isEmpty())
                        <div class="alert alert-info">
                            No orders found.
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped">
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
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->package->name }}</td>
                                            <td>₹{{ number_format($order->amount, 2) }}</td>
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
                                            <td>{{ $order->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-info">View</a>
                                                    <a href="{{ route('admin.orders.edit', $order) }}" class="btn btn-sm btn-primary">Edit</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
@endsection
