@extends('layouts.admin')

@section('title', 'Create Package')

@section('page-title', 'Create New Package')

@section('content')
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Package Details</h5>
            <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">Back to Packages</a>
        </div>
        <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('admin.packages.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Package Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="type" class="form-label">Package Type</label>
                            <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                                <option value="">Select Type</option>
                                <option value="name" {{ old('type') == 'name' ? 'selected' : '' }}>Name Numerology</option>
                                <option value="mobile" {{ old('type') == 'mobile' ? 'selected' : '' }}>Mobile Numerology</option>
                                <option value="birth" {{ old('type') == 'birth' ? 'selected' : '' }}>Birth Numerology</option>
                                <option value="comprehensive" {{ old('type') == 'comprehensive' ? 'selected' : '' }}>Comprehensive Package</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="price" class="form-label">Price (₹)</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" min="0" step="0.01" required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input @error('active') is-invalid @enderror" type="checkbox" id="active" name="active" value="1" {{ old('active') ? 'checked' : '' }}>
                                <label class="form-check-label" for="active">
                                    Active
                                </label>
                                @error('active')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Create Package</button>
                        </div>
                    </form>
                </div>
            </div>
@endsection
