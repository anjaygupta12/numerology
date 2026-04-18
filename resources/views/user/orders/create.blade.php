@extends('layouts.user')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <h4 class="content-title"><i class="fas fa-shopping-cart me-2"></i>Place Order for {{ $package->name }}</h4>
        <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary">
            <i class="fas fa-arrow-left me-1"></i> Back to Packages
        </a>
    </div>
    <div class="content-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $package->name }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ ucfirst($package->type) }} Numerology</h6>
                                    <p class="card-text">{{ $package->description }}</p>
                                    <p class="card-text"><strong>Price: ₹{{ number_format($package->price, 2) }}</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('user.orders.store', $package) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount', $package->price) }}" min="{{ $package->price }}" step="0.01" required>
                            <div class="form-text">The amount must be at least ₹{{ number_format($package->price, 2) }}</div>
                            @error('amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="payment_method" class="form-label">Payment Method</label>
                            <select class="form-select @error('payment_method') is-invalid @enderror" id="payment_method" name="payment_method" required>
                                <option value="">Select Payment Method</option>
                                <option value="UPI" {{ old('payment_method') == 'UPI' ? 'selected' : '' }}>UPI</option>
                                <option value="Bank Transfer" {{ old('payment_method') == 'Bank Transfer' ? 'selected' : '' }}>Bank Transfer</option>
                                <option value="PayTM" {{ old('payment_method') == 'PayTM' ? 'selected' : '' }}>PayTM</option>
                                <option value="Google Pay" {{ old('payment_method') == 'Google Pay' ? 'selected' : '' }}>Google Pay</option>
                                <option value="PhonePe" {{ old('payment_method') == 'PhonePe' ? 'selected' : '' }}>PhonePe</option>
                            </select>
                            @error('payment_method')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="payment_screenshot" class="form-label">Payment Screenshot</label>
                            <input type="file" class="form-control @error('payment_screenshot') is-invalid @enderror" id="payment_screenshot" name="payment_screenshot" accept="image/*" required>
                            <div class="form-text">Please upload a screenshot of your payment confirmation.</div>
                            @error('payment_screenshot')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Additional Information (Optional)</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                            <div class="form-text">Any additional information you'd like to provide.</div>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="alert alert-info">
                            <h6>Payment Instructions:</h6>
                            <p>Please make your payment using one of the following methods:</p>
                            <ul>
                                <li><strong>UPI ID:</strong>
                                    {{-- srknumerology@upi --}}
                                </li>
                                <li><strong>Bank Account:</strong>
                                     {{-- SRK Numerology, Account No: 1234567890, IFSC: SBIN0001234 --}}
                                </li>
                                <li><strong>PayTM/Google Pay/PhonePe:</strong>
                                     {{-- +91 9876543210 --}}
                                    </li>
                            </ul>
                            <p>After making the payment, take a screenshot and upload it above.</p>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Place Order</button>
                        </div>
                    </form>
    </div>
</div>
@endsection
