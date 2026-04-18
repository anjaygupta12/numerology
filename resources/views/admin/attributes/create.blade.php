@extends('layouts.admin')

@section('title', 'Create Attribute')

@section('page-title', 'Create New Attribute')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Attribute Details</h5>
            <a href="{{ route('admin.attributes.index') }}" class="btn btn-secondary">Back to Attributes</a>
        </div>
        <div class="card-body">
            
            <form action="{{ route('admin.attributes.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="compound_number" class="form-label">Compound Number</label>
                    <input type="number" class="form-control @error('compound_number') is-invalid @enderror" id="compound_number" name="compound_number" value="{{ old('compound_number') }}" required>
                    @error('compound_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">This number must be unique.</small>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control summernote @error('description') is-invalid @enderror" id="description" name="description" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Create Attribute</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            placeholder: 'Enter attribute description here...',
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
</script>
@endsection
