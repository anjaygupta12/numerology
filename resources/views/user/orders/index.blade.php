@extends('layouts.user')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <h4 class="content-title"><i class="fas fa-shopping-bag me-2"></i>My Orders</h4>
        <span>Track your numerology service purchases</span>
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
                    
                    @if($orders->isEmpty())
                        <div class="alert alert-info">
                            You haven't placed any orders yet. Browse our packages to get started.
                        </div>
                        <a href="{{ route('home') }}" class="btn btn-primary">Browse Packages</a>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
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
                                                <a href="{{ route('user.orders.show', $order) }}" class="btn btn-sm btn-info">View</a>
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
