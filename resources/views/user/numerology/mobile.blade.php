@extends('layouts.user')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <h4 class="content-title"><i class="fas fa-mobile-alt me-2"></i>Mobile Number Numerology</h4>
            <span>Discover the influence of your mobile number</span>
        </div>
        <div class="content-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="alert alert-info">
                <p><strong>Mobile Number Numerology</strong> analyzes the vibrations of your phone number to reveal its
                    influence on your daily communications, relationships, and opportunities.</p>
            </div>

            <form action="{{ route('user.numerology.mobile.calculate') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="mobile_number" class="form-label">Enter Mobile Number</label>
                        <input type="text" class="form-control @error('mobile_number') is-invalid @enderror"
                            id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}"
                            placeholder="e.g., 9876543210" required>
                        <div class="form-text">Enter your 10-digit mobile number without country code.</div>
                        @error('mobile_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="birth_date" class="form-label">Birth Date</label>
                        <input type="date" class="form-control @error('birth_date') is-invalid @enderror" id="birth_date"
                            name="birth_date" value="{{ old('birth_date', $result['birth_date'] ?? '') }}" required>
                        @error('birth_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="birth_date" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="birth_date"
                            name="name" value="{{ old('name', $result['name'] ?? '') }}" required>
                        @error('birth_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Calculate Mobile Numerology</button>
                </div>
            </form>

            @if (isset($result))
                <div class="mt-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Numerology Results for: {{ $mobile_number }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Mobile Number Sum</h6>
                                    <div class="display-4 text-center mb-3">{{ $result['mobile_sum'] }}</div>
                                    <p>{{ $result['mobile_sum_meaning'] }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6>Reduced Number</h6>
                                    <div class="display-4 text-center mb-3">{{ $result['reduced_number'] }}</div>
                                    <p>{{ $result['reduced_number_meaning'] }}</p>
                                </div>

                            </div>

                            <div class="mt-4">
                                <h6>Number Frequency Analysis</h6>
                                <div class="row">
                                    @foreach ($result['number_frequency'] as $number => $frequency)
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <h5>Number {{ $number }}</h5>
                                                    <p class="mb-0">Appears {{ $frequency }} times</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mt-4">
                                <h6>Compatibility</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Career Compatibility:</strong> {{ $result['career_compatibility'] }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Relationship Compatibility:</strong>
                                            {{ $result['relationship_compatibility'] }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <h6>Detailed Analysis</h6>
                                <p>{{ $result['detailed_analysis'] }}</p>
                            </div>

                            <div class="mt-4">
                                <h6>Recommendations</h6>
                                <ul>
                                    @foreach ($result['recommendations'] as $recommendation)
                                        <li>{{ $recommendation }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
