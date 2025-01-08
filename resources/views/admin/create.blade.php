@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('content')
<h2>Create News Item</h2>

<!-- Create News Item Form -->
<form action="{{ route('admin.newsitems.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" value="{{ old('title') }}" required>
    @error('title')
    <div class="error">{{ $message }}</div>
    @enderror

    <label for="content">Content:</label>
    <textarea name="content" required>{{ old('content') }}</textarea>
    @error('content')
    <div class="error">{{ $message }}</div>
    @enderror

    <label for="picture">Picture:</label>
    <input type="file" name="picture">
    @error('picture')
    <div class="error">{{ $message }}</div>
    @enderror

    <label for="publication_date">Publication Date:</label>
    <input type="datetime-local" name="publication_date" value="{{ old('publication_date') }}" required>
    @error('publication_date')
    <div class="error">{{ $message }}</div>
    @enderror

    <button type="submit">Submit</button>
</form>

@endsection
