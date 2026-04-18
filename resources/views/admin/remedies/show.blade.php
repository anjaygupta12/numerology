@extends('layouts.admin')

@section('title', 'View Remedy')

@section('page-title', 'View Remedy')

@section('content')
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Remedy Details</h5>
            <div>
                <a href="{{ route('admin.remedies.edit', $remedy) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('admin.remedies.index') }}" class="btn btn-secondary">Back to Remedies</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th style="width: 200px;">ID</th>
                            <td>{{ $remedy->id }}</td>
                        </tr>
                        <tr>
                            <th>Number</th>
                            <td>
                                <span class="badge bg-primary fs-5">{{ $remedy->number }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($remedy->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>BN (Birth Number) Remedies</th>
                            <td>{!! $remedy->bn ?: '<span class="text-muted">No BN remedies defined.</span>' !!}</td>
                        </tr>
                        <tr>
                            <th>DN (Destiny Number) Remedies</th>
                            <td>{!! $remedy->dn ?: '<span class="text-muted">No DN remedies defined.</span>' !!}</td>
                        </tr>
                        <tr>
                            <th>NN (Name Number) Remedies</th>
                            <td>{!! $remedy->nn ?: '<span class="text-muted">No NN remedies defined.</span>' !!}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $remedy->created_at->format('d M Y, h:i A') }}</td>
                        </tr>
                        <tr>
                            <th>Last Updated</th>
                            <td>{{ $remedy->updated_at->format('d M Y, h:i A') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <form action="{{ route('admin.remedies.destroy', $remedy) }}" method="POST" class="mt-3" onsubmit="return confirm('Are you sure you want to delete this remedy?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Remedy</button>
            </form>
        </div>
    </div>
@endsection 