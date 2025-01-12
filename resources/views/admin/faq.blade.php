 
@extends('layouts.admin')
@section('content')
<table>
    <thead>
        <tr>
            <th>Question</th>
            <th>Answer</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            @foreach ($category->faqs as $faq)
                <tr>
                    <td>{{ $faq->question }}</td>
                    <td>{{ $faq->answer }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('admin.faq.edit', $faq->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this FAQ?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
@endsection

<style>
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

thead {
    background-color: #4CAF50;
    color: white;
    text-align: left;
}

th, td {
    padding: 15px;
    text-align: left;
    border: 1px solid #ddd;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}



th {
    font-weight: bold;
    text-transform: uppercase;
}

td a.btn {
    text-decoration: none;
    padding: 8px 12px;
    margin: 0 5px;
    border-radius: 4px;
    font-size: 14px;
    display: inline-block;
    text-align: center;
    cursor: pointer;
}

td a.btn-primary {
    background-color: #007bff;
    color: white;
    border: none;
    margin-bottom: 5px;
}

td a.btn-primary:hover {
    background-color: #0056b3;
}

td button.btn-danger {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
}

td button.btn-danger:hover {
    background-color: #a71d2a;
}

</style>