@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>New Category</h1>
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
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
    max-width: 600px;
}

h1 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
    font-weight: bold;
    text-align: center;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    font-size: 16px;
    color: #555;
    margin-bottom: 5px;
    font-weight: bold;
}

input.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    color: #333;
}

input.form-control:focus {
    border-color: #4CAF50;
    box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
    outline: none;
}

button.btn-primary {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    display: block;
    width: 100%;
    text-align: center;
}

button.btn-primary:hover {
    background-color: #45a049;
}

.mt-3 {
    margin-top: 20px;
}
</style>
