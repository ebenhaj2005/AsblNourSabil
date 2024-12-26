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

@endsection