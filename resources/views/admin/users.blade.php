@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="card mb-4">
        <div class="card-header text-center bg-success text-white">
            <h1>Manage Users</h1>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered ">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                                <td class="d-flex justify-content-between">
                                    <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>

                                    @if (!$user->is_admin)
                                        <form action="{{ route('admin.makeAdmin', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-sm">Make Admin</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .container {
        margin-top: 30px;
    }

    h1 {
        font-size: 2.5rem;
        font-weight: bold;
    }

    .card {
        border: 1px solid #ddd;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .card-header {
        border-bottom: 1px solid #ddd;
        padding: 15px;
    }

    .table {
        margin-top: 20px;
    }

    .table th, .table td {
        text-align: center;
        vertical-align: middle;
        padding: 15px;
    }

    .table th {
        background-color: #f8f9fa;
        font-weight: bold;
    }

    .btn-danger {
        color: #fff;
        background-color: #e3342f;
        border-color: #e3342f;
        margin-right: 10px;
        margin-bottom: 10px;
        padding: 5px 10px;
    }

    .btn-danger:hover {
        background-color: #cc1f1a;
        border-color: #cc1f1a;
    }

    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
        margin-right: 10px;
        margin-bottom: 10px;    

    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .alert-success {
        margin-bottom: 20px;
        text-align: center;
        font-weight: bold;
    }
</style>
