@extends('layouts.admin')

@section('title', 'Manage Attributes')

@section('page-title', 'Manage Attributes')

@section('content')
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Attributes List</h5>
            <a href="{{ route('admin.attributes.create') }}" class="btn btn-primary">Add New Attribute</a>
        </div>
        <div class="card-body">
            
            @if($attributes->isEmpty())
                <div class="alert alert-info">
                    No attributes found. Create your first attribute.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Compound Number</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attributes as $attribute)
                                <tr>
                                    <td>
                                        <span class="badge bg-primary">{{ $attribute->compound_number }}</span>
                                    </td>
                                    <td>{{ Str::limit(strip_tags($attribute->description), 50) }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.attributes.edit', $attribute) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="{{ route('admin.attributes.show', $attribute) }}" class="btn btn-sm btn-info">View</a>
                                            <form action="{{ route('admin.attributes.destroy', $attribute) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this attribute?');">
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
