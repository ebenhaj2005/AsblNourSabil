@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Categorieën</h1>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Nieuwe Categorie</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
<style>
.container {
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
}

h1 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
    font-weight: bold;
    text-align: center;
}

a.btn-primary {
    background-color: #007bff;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    margin-bottom: 15px;
}

a.btn-primary:hover {
    background-color: #0056b3;
}

.alert-success {
    padding: 10px;
    margin-bottom: 15px;
    color: #155724;
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    border-radius: 5px;
    font-size: 14px;
}

table.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table.table thead {
    background-color: #4CAF50;
    color: white;
    text-align: left;
}

table.table th, table.table td {
    padding: 15px;
    border: 1px solid #ddd;
}

table.table tr:nth-child(even) {
    background-color: #f2f2f2;
}

table.table tr:hover {
    background-color: #eaf3e2;
}

.btn-warning {
    background-color: #ffc107;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    font-size: 12px;
    cursor: pointer;
}

.btn-warning:hover {
    background-color: #e0a800;
}

.btn-danger {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    font-size: 12px;
    cursor: pointer;
}

.btn-danger:hover {
    background-color: #c82333;
}

form {
    display: inline-block;
    margin: 0;
}

button {
    border: none;
    font-family: inherit;
    cursor: pointer;
}

button:focus {
    outline: none;
}
</style>
