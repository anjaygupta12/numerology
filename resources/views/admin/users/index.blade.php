@extends('layouts.admin')

@section('title', 'Manage Users')

@section('page-title', 'Manage Users')

@section('content')
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Users List</h5>
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Add New User</a>
        </div>
        <div class="card-body">
            @if ($users->isEmpty())
                <div class="alert alert-info">
                    No users found.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Registered On</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->role == 'admin')
                                            <span class="badge bg-danger">Admin</span>
                                        @else
                                            <span class="badge bg-primary">User</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.users.edit', $user) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <a href="{{ route('admin.users.show', $user) }}"
                                                class="btn btn-sm btn-info">View</a>
                                            @if ($user->id != auth()->id())
                                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                                <a href="{{ route('admin.users.release', $user) }}"
                                                onclick="return confirm('Are you sure you want to Release for login?');"
                                                class="btn btn-sm btn-secondary">Released</a>
                                                {{-- success --}}
                                            @endif
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
