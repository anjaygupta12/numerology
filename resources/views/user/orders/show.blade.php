@extends('layouts.user')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <h4 class="content-title"><i class="fas fa-file-invoice me-2"></i>Order Details</h4>
        <a href="{{ route('user.orders.index') }}" class="btn btn-sm btn-outline-primary">
            <i class="fas fa-arrow-left me-1"></i> Back to Orders
        </a>
    </div>
    <div class="content-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-muted">Order Information</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <th>Order ID:</th>
                                    <td>{{ $order->id }}</td>
                                </tr>
                                <tr>
                                    <th>Date:</th>
                                    <td>{{ $order->created_at->format('M d, Y h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Status:</th>
                                    <td>
                                        @if($order->status == 'pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @elseif($order->status == 'completed')
                                            <span class="badge bg-success">Completed</span>
                                        @elseif($order->status == 'cancelled')
                                            <span class="badge bg-danger">Cancelled</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Payment Method:</th>
                                    <td>{{ $order->payment_method }}</td>
                                </tr>
                                <tr>
                                    <th>Amount:</th>
                                    <td>₹{{ number_format($order->amount, 2) }}</td>
                                </tr>
                            </table>
                        </div>
                        
                        <div class="col-md-6">
                            <h6 class="text-muted">Package Information</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <th>Package:</th>
                                    <td>{{ $order->package->name }}</td>
                                </tr>
                                <tr>
                                    <th>Type:</th>
                                    <td>{{ ucfirst($order->package->type) }} Numerology</td>
                                </tr>
                                <tr>
                                    <th>Price:</th>
                                    <td>₹{{ number_format($order->package->price, 2) }}</td>
                                </tr>
                            </table>
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
                    
                    @if($order->status == 'completed')
                        <div class="mt-4">
                            <h6 class="text-muted">Access Your Numerology Report</h6>
                            <p>Your order has been completed. You can now access your numerology report.</p>
                            
                            @if($order->package->type == 'name')
                                <a href="{{ route('user.numerology.name') }}" class="btn btn-primary">Access Name Numerology</a>
                            @elseif($order->package->type == 'mobile')
                                <a href="{{ route('user.numerology.mobile') }}" class="btn btn-primary">Access Mobile Numerology</a>
                            @elseif($order->package->type == 'birth')
                                <a href="{{ route('user.numerology.birth') }}" class="btn btn-primary">Access Birth Numerology</a>
                            @endif
                        </div>
                    @endif
    </div>
</div>
@endsection
