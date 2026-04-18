@extends('layouts.admin')

@section('title', 'Pd Yoda Prediction')
@section('page-title', 'Pd Yoda Prediction')

@section('content')
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Pd Yoda Predictiona</h5>
            <a href="{{ route('admin.pd-yoga-prediction.create') }}" class="btn btn-primary">Add New Combination</a>
        </div>
        <div class="card-body">
            @if($yogaPredictions->isEmpty()) {{-- ✅ fixed variable name --}}
                <div class="alert alert-info">No Combinations found. Create your first attribute.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Combinations</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($yogaPredictions as $attribute) {{-- ✅ fixed variable name --}}
                                <tr>
                                    <td>
                                        <span class="badge bg-primary fs-5">{{ strtoupper($attribute->combination) }}</span>
                                    </td>
                                    <td>{{ Str::limit(strip_tags($attribute->description), 100) ?: '-' }}</td>
                                    <td>{{ ($attribute->type=='ad')? 'AD Prediction' :$attribute->type  }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.pd-yoga-prediction.edit', $attribute) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('admin.pd-yoga-prediction.destroy', $attribute) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this Combination?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($yogaPredictions->hasPages()) {{-- ✅ fixed variable name --}}
                    <div class="d-flex justify-content-center mt-3">{{ $yogaPredictions->links() }}</div>
                @endif
            @endif
        </div>
    </div>
@endsection
