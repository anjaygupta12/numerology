@extends('layouts.admin')

@section('title', 'View Attribute')

@section('page-title', 'View Attribute')

@section('content')
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Attribute Details</h5>
            <div>
                <a href="{{ route('admin.attributes.edit', $attribute) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('admin.attributes.index') }}" class="btn btn-secondary">Back to Attributes</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th style="width: 200px;">ID</th>
                            <td>{{ $attribute->id }}</td>
                        </tr>
                        <tr>
                            <th>Compound Number</th>
                            <td>{{ $attribute->compound_number }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{!! $attribute->description !!}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $attribute->created_at->format('d M Y, h:i A') }}</td>
                        </tr>
                        <tr>
                            <th>Last Updated</th>
                            <td>{{ $attribute->updated_at->format('d M Y, h:i A') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <form action="{{ route('admin.attributes.destroy', $attribute) }}" method="POST" class="mt-3" onsubmit="return confirm('Are you sure you want to delete this attribute?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Attribute</button>
            </form>
        </div>
    </div>
@endsection
