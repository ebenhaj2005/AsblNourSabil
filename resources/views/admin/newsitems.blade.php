@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('content')



<form action="{{ route('admin.newsitems.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" required>
    
    <label for="content">Content:</label>
    <textarea name="content" required></textarea>

    <label for="picture">Picture:</label>
    <input type="file" name="picture">

    <label for="publication_date">Publication Date:</label>
    <input type="datetime-local" name="publication_date" required>

    <button type="submit">Submit</button>
</form>



<h2>All News Items</h2>
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Picture</th>
            <th>Publication Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($newsitems as $newsitem)
        <tr>
            <td>{{ $newsitem->title }}</td>
            <td>{{ $newsitem->content }}</td>
            <td>
                @if($newsitem->picture)
                <img src="{{ asset('storage/' . $newsitem->picture) }}" alt="{{ $newsitem->title }}" width="100">
                @endif
            </td>
            <td>{{ $newsitem->publication_date }}</td>
            <td>
                <a href="{{ route('admin.newsitems.edit', $newsitem->id) }}">Edit</a>
                <form action="{{ route('admin.newsitems.destroy', $newsitem->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection



@endsection