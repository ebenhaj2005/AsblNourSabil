@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">

@endsection

@section('content')
<h2 id="editnews">Edit News Item</h2>

<!-- Edit News Item Form -->
<form action="{{ route('admin.newsitems.update', $newsItem->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <label for="title">Title:</label>
    <input type="text" name="title" value="{{ old('title', $newsItem->title) }}" required>
    @error('title')
    <div class="error">{{ $message }}</div>
    @enderror

    <label for="content">Content:</label>
    <textarea name="content" required>{{ old('content', $newsItem->content) }}</textarea>
    @error('content')
    <div class="error">{{ $message }}</div>
    @enderror

    <label for="picture">Picture (Optional):</label>
    <input type="file" name="picture">
    @if($newsItem->picture)
    <div>
        <img src="{{ asset('storage/' . $newsItem->picture) }}" width="100" alt="Current Image">
    </div>
    @endif
    @error('picture')
    <div class="error">{{ $message }}</div>
    @enderror

    <label for="publication_date">Publication Date:</label>
    <input type="datetime-local" name="publication_date" value="{{ old('publication_date', $newsItem->publication_date) }}" required>
    @error('publication_date')
    <div class="error">{{ $message }}</div>
    @enderror

    <button type="submit">Update</button>
</form>

@endsection