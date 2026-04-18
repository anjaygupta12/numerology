@extends('layouts.admin')

@section('title', 'Edit Order')

@section('page-title', 'Edit Order')

@section('content')
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Order #{{ $order->id }}</h5>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Back to Orders</a>
        </div>
        <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="user_id" class="form-label">User</label>
                                    <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id" required>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ old('user_id', $order->user_id) == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }} ({{ $user->email }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="package_id" class="form-label">Package</label>
                                    <select class="form-select @error('package_id') is-invalid @enderror" id="package_id" name="package_id" required>
                                        @foreach($packages as $package)
                                            <option value="{{ $package->id }}" {{ old('package_id', $order->package_id) == $package->id ? 'selected' : '' }}>
                                                {{ $package->name }} (₹{{ number_format($package->price, 2) }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('package_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount', $order->amount) }}" min="0" step="0.01" required>
                                    @error('amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="payment_method" class="form-label">Payment Method</label>
                                    <select class="form-select @error('payment_method') is-invalid @enderror" id="payment_method" name="payment_method" required>
                                        <option value="UPI" {{ old('payment_method', $order->payment_method) == 'UPI' ? 'selected' : '' }}>UPI</option>
                                        <option value="Bank Transfer" {{ old('payment_method', $order->payment_method) == 'Bank Transfer' ? 'selected' : '' }}>Bank Transfer</option>
                                        <option value="PayTM" {{ old('payment_method', $order->payment_method) == 'PayTM' ? 'selected' : '' }}>PayTM</option>
                                        <option value="Google Pay" {{ old('payment_method', $order->payment_method) == 'Google Pay' ? 'selected' : '' }}>Google Pay</option>
                                        <option value="PhonePe" {{ old('payment_method', $order->payment_method) == 'PhonePe' ? 'selected' : '' }}>PhonePe</option>
                                    </select>
                                    @error('payment_method')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                        <option value="pending" {{ old('status', $order->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="processing" {{ old('status', $order->status) == 'processing' ? 'selected' : '' }}>Processing</option>
                                        <option value="completed" {{ old('status', $order->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ old('status', $order->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $order->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        @if($order->payment_screenshot)
                            <div class="mb-3">
                                <label class="form-label">Current Payment Screenshot</label>
                                <div>
                                    <img src="{{ asset('storage/' . $order->payment_screenshot) }}" alt="Payment Screenshot" class="img-fluid img-thumbnail" style="max-height: 200px;">
                                </div>
                            </div>
                        @endif
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Update Order</button>
                        </div>
                    </form>
                </div>
            </div>
@endsection
