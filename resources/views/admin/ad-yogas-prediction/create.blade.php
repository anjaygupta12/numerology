@extends('layouts.admin')

@section('title', 'Create Yogas Predictiona')
@section('page-title', 'Create Yogas Predictiona')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Combination Details</h5>
            <a href="{{ route('admin.md-yoga-prediction.index') }}" class="btn btn-secondary">Back to Combinations</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.ad-yoga-prediction.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="cobination" class="form-label">Cobination/AD</label>
                            <input type="text" name="combination" id="combination" class="form-control @error('combination') is-invalid @enderror"  required>
                            @error('cobination')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                            <div class="mb-3">
                            <label for="cobination" class="form-label">Type</label>
                            <select name="type" class="form-control" >
                                <option value="ad">Ad preduction</option>
                                <option value="cobination">Cobination</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control summernote @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Enter the description for this cobination attribute.</small>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Create Yogas Predictiona</button>
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
        $('.summernote').each(function() {
            $(this).summernote({
                placeholder: 'Enter description here...',
                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']], ['font', ['bold', 'underline', 'clear']], ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']], ['table', ['table']], ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });

        // Auto-capitalize cobination input
        $('#cobination').on('input', function() {
            this.value = this.value.toUpperCase();
        });
    });
</script>
@endsection
