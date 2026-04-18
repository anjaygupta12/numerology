@extends('layouts.admin')

@section('title', 'View First Letter Attribute')
@section('page-title', 'View First Letter Attribute')

@section('content')
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">First Letter Attribute Details</h5>
            <div>
                <a href="{{ route('admin.first-letter-attributes.edit', $firstLetterAttribute) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('admin.first-letter-attributes.index') }}" class="btn btn-secondary">Back to First Letter Attributes</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $firstLetterAttribute->id }}</td>
                        </tr>
                        <tr>
                            <th>Letter</th>
                            <td><span class="badge bg-primary fs-5">{{ strtoupper($firstLetterAttribute->letter) }}</span></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{!! $firstLetterAttribute->description ?: '<span class="text-muted">No description provided.</span>' !!}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $firstLetterAttribute->created_at->format('d M Y, h:i A') }}</td>
                        </tr>
                        <tr>
                            <th>Last Updated</th>
                            <td>{{ $firstLetterAttribute->updated_at->format('d M Y, h:i A') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <form action="{{ route('admin.first-letter-attributes.destroy', $firstLetterAttribute) }}" method="POST" class="mt-3" onsubmit="return confirm('Are you sure you want to delete this first letter attribute?');">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete First Letter Attribute</button>
            </form>
        </div>
    </div>
@endsection 