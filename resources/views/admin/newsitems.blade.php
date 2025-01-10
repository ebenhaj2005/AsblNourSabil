@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('content')

<!-- Create News Item Form -->
<h2>Create News Item</h2>

<form action="{{ route('admin.newsitems.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
    @csrf
    
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ old('title') }}" required class="form-control">
        @error('title')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="content">Content:</label>
        <textarea name="content" required class="form-control">{{ old('content') }}</textarea>
        @error('content')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="image">Picture (Optional):</label>
        <input type="file" name="picture" class="form-control">
        @error('picture')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="publication_date">Publication Date:</label>
        <input type="datetime-local" name="publication_date" value="{{ old('publication_date') ? \Carbon\Carbon::parse(old('publication_date'))->format('Y-m-d\TH:i') : '' }}" required class="form-control">
        @error('publication_date')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<!-- All News Items Table -->
<h2>All News Items</h2>
<table class="table">
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
        @forelse($newsitems as $newsItem)
        <tr>
            <td>{{ $newsItem->title }}</td>
            <td>{{ Str::limit($newsItem->content, 50) }}</td>
            <td>
                @if($newsItem->image)
                <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" width="100" class="img-thumbnail">
                @endif
            </td>
            <td>{{ \Carbon\Carbon::parse($newsItem->publication_date)->format('d-m-Y H:i') }}</td>
            <td>
                <a href="{{ route('admin.newsitems.edit', $newsItem->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.newsitems.destroy', $newsItem->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this news item?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">No news items available.</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection
