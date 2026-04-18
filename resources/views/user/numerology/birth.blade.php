@extends('layouts.user')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <h4 class="content-title"><i class="fas fa-calendar-alt me-2"></i>Birth Numerology</h4>
        <span>Understand your life path through birth date</span>
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
                    
                    <div class="alert alert-info">
                        <p><strong>Birth Numerology</strong> reveals your life path number, destiny number, and other important numbers based on your birth date, providing insights into your personality, strengths, challenges, and life purpose.</p>
                    </div>
                    
                    <form action="{{ route('user.numerology.birth.calculate') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="birth_day" class="form-label">Day</label>
                                <select class="form-select @error('birth_day') is-invalid @enderror" id="birth_day" name="birth_day" required>
                                    <option value="">Select Day</option>
                                    @for($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}" {{ old('birth_day') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('birth_day')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="birth_month" class="form-label">Month</label>
                                <select class="form-select @error('birth_month') is-invalid @enderror" id="birth_month" name="birth_month" required>
                                    <option value="">Select Month</option>
                                    <option value="1" {{ old('birth_month') == 1 ? 'selected' : '' }}>January</option>
                                    <option value="2" {{ old('birth_month') == 2 ? 'selected' : '' }}>February</option>
                                    <option value="3" {{ old('birth_month') == 3 ? 'selected' : '' }}>March</option>
                                    <option value="4" {{ old('birth_month') == 4 ? 'selected' : '' }}>April</option>
                                    <option value="5" {{ old('birth_month') == 5 ? 'selected' : '' }}>May</option>
                                    <option value="6" {{ old('birth_month') == 6 ? 'selected' : '' }}>June</option>
                                    <option value="7" {{ old('birth_month') == 7 ? 'selected' : '' }}>July</option>
                                    <option value="8" {{ old('birth_month') == 8 ? 'selected' : '' }}>August</option>
                                    <option value="9" {{ old('birth_month') == 9 ? 'selected' : '' }}>September</option>
                                    <option value="10" {{ old('birth_month') == 10 ? 'selected' : '' }}>October</option>
                                    <option value="11" {{ old('birth_month') == 11 ? 'selected' : '' }}>November</option>
                                    <option value="12" {{ old('birth_month') == 12 ? 'selected' : '' }}>December</option>
                                </select>
                                @error('birth_month')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="birth_year" class="form-label">Year</label>
                                <select class="form-select @error('birth_year') is-invalid @enderror" id="birth_year" name="birth_year" required>
                                    <option value="">Select Year</option>
                                    @for($i = date('Y') - 80; $i <= date('Y'); $i++)
                                        <option value="{{ $i }}" {{ old('birth_year') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('birth_year')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Calculate Birth Numerology</button>
                        </div>
                    </form>
                    
                    @if(isset($result))
                        <div class="mt-4">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Numerology Results for: {{ $birth_date->format('d F, Y') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card mb-3">
                                                <div class="card-body text-center">
                                                    <h6>Life Path Number</h6>
                                                    <div class="display-4 mb-2">{{ $result['life_path_number'] }}</div>
                                                    <p class="mb-0">{{ $result['life_path_meaning'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="card mb-3">
                                                <div class="card-body text-center">
                                                    <h6>Birth Day Number</h6>
                                                    <div class="display-4 mb-2">{{ $result['birth_day_number'] }}</div>
                                                    <p class="mb-0">{{ $result['birth_day_meaning'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="card mb-3">
                                                <div class="card-body text-center">
                                                    <h6>Expression Number</h6>
                                                    <div class="display-4 mb-2">{{ $result['expression_number'] }}</div>
                                                    <p class="mb-0">{{ $result['expression_meaning'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <h6>Personality Traits</h6>
                                        <ul>
                                            @foreach($result['traits'] as $trait)
                                                <li>{{ $trait }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <h6>Lucky Elements</h6>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p><strong>Lucky Numbers:</strong> {{ $result['lucky_numbers'] }}</p>
                                            </div>
                                            <div class="col-md-3">
                                                <p><strong>Lucky Colors:</strong> {{ $result['lucky_colors'] }}</p>
                                            </div>
                                            <div class="col-md-3">
                                                <p><strong>Lucky Days:</strong> {{ $result['lucky_days'] }}</p>
                                            </div>
                                            <div class="col-md-3">
                                                <p><strong>Lucky Gemstone:</strong> {{ $result['lucky_gemstone'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <h6>Life Cycles</h6>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <h6 class="text-center">First Cycle (0-{{ $result['cycles']['first']['end_age'] }})</h6>
                                                        <div class="text-center mb-2 fs-2">{{ $result['cycles']['first']['number'] }}</div>
                                                        <p class="mb-0">{{ $result['cycles']['first']['meaning'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <h6 class="text-center">Second Cycle ({{ $result['cycles']['first']['end_age'] + 1 }}-{{ $result['cycles']['second']['end_age'] }})</h6>
                                                        <div class="text-center mb-2 fs-2">{{ $result['cycles']['second']['number'] }}</div>
                                                        <p class="mb-0">{{ $result['cycles']['second']['meaning'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <h6 class="text-center">Third Cycle ({{ $result['cycles']['second']['end_age'] + 1 }}+)</h6>
                                                        <div class="text-center mb-2 fs-2">{{ $result['cycles']['third']['number'] }}</div>
                                                        <p class="mb-0">{{ $result['cycles']['third']['meaning'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <h6>Detailed Analysis</h6>
                                        <p>{{ $result['detailed_analysis'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
    </div>
</div>
@endsection
