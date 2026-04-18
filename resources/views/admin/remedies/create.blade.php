@extends('layouts.admin')

@section('title', 'Create Remedy')

@section('page-title', 'Create New Remedy')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Remedy Details</h5>
            <a href="{{ route('admin.remedies.index') }}" class="btn btn-secondary">Back to Remedies</a>
        </div>
        <div class="card-body">
            
            <form action="{{ route('admin.remedies.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="number" class="form-label">Number</label>
                            <input type="number" name="number" id="number" class="form-control @error('number') is-invalid @enderror" value="{{ old('number') }}" min="1" max="9" required>
                            @error('number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Enter a number between 1 and 9. This number must be unique.</small>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" id="status" name="status" value="1" {{ old('status', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="bn" class="form-label">BN (Birth Number) Remedies</label>
                    <textarea class="form-control summernote @error('bn') is-invalid @enderror" id="bn" name="bn">{{ old('bn') }}</textarea>
                    @error('bn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Enter remedies for Birth Number (BN).</small>
                </div>

                <div class="mb-3">
                    <label for="dn" class="form-label">DN (Destiny Number) Remedies</label>
                    <textarea class="form-control summernote @error('dn') is-invalid @enderror" id="dn" name="dn">{{ old('dn') }}</textarea>
                    @error('dn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Enter remedies for Destiny Number (DN).</small>
                </div>

                <div class="mb-3">
                    <label for="nn" class="form-label">NN (Name Number) Remedies</label>
                    <textarea class="form-control summernote @error('nn') is-invalid @enderror" id="nn" name="nn">{{ old('nn') }}</textarea>
                    @error('nn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Enter remedies for Name Number (NN).</small>
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Create Remedy</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize Summernote editors
        $('.summernote').each(function() {
            $(this).summernote({
                placeholder: 'Enter remedy details here...',
                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    });
</script>
@endsection 