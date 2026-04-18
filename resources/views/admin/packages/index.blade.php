@extends('layouts.admin')

@section('title', 'Manage Packages')

@section('page-title', 'Manage Packages')

@section('content')
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Packages List</h5>
            {{-- <a href="{{ route('admin.packages.create') }}" class="btn btn-primary">Add New Package</a> --}}
        </div>
        <div class="card-body">
            @if ($packages->isEmpty())
                <div class="alert alert-info">
                    No packages found. Create your first package.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($packages as $package)
                                <tr>
                                    <td>{{ $package->id }}</td>
                                    <td>{{ $package->name }}</td>
                                    <td>{{ ucfirst($package->type) }}</td>
                                    <td>₹{{ number_format($package->price, 2) }}</td>
                                    <td>
                                        @if ($package->active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.packages.edit', $package) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <a href="{{ route('admin.packages.show', $package) }}"
                                                class="btn btn-sm btn-info">View</a>
                                            <form action="{{ route('admin.packages.destroy', $package) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this package?');">
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
            @endif
        </div>
    </div>
@endsection
