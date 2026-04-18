@extends('layouts.admin')

@section('title', 'Manage Remedies')

@section('page-title', 'Manage Remedies')

@section('content')
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Remedies List</h5>
            <a href="{{ route('admin.remedies.create') }}" class="btn btn-primary">Add New Remedy</a>
        </div>
        <div class="card-body">
            
            @if($remedies->isEmpty())
                <div class="alert alert-info">
                    No remedies found. Create your first remedy.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>BN</th>
                                <th>DN</th>
                                <th>NN</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($remedies as $remedy)
                                <tr>
                                    <td>
                                        <span class="badge bg-primary">{{ $remedy->number }}</span>
                                    </td>
                                    <td>{{ Str::limit($remedy->bn, 50) ?: '-' }}</td>
                                    <td>{{ Str::limit($remedy->dn, 50) ?: '-' }}</td>
                                    <td>{{ Str::limit($remedy->nn, 50) ?: '-' }}</td>
                                    <td>
                                        @if($remedy->status)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.remedies.edit', $remedy) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="{{ route('admin.remedies.show', $remedy) }}" class="btn btn-sm btn-info">View</a>
                                            <form action="{{ route('admin.remedies.destroy', $remedy) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this remedy?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                @if($remedies->hasPages())
                    <div class="d-flex justify-content-center mt-3">
                        {{ $remedies->links() }}
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection 