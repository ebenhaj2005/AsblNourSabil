@extends('layouts.admin')

@section('content')
<h2>{{ $newsitem->title }}</h2>

<p><strong>Published on:</strong> {{ $newsitem->publication_date }}</p>
<p><strong>Content:</strong> </p>
<p>{{ $newsitem->content }}</p>

@if($newsitem->picture)
    <img src="{{ asset('storage/' . $newsitem->picture) }}" alt="{{ $newsitem->title }}" width="300">
@endif

<br><br>
<a href="{{ route('admin.newsitems.index') }}">Back to all news items</a>
@endsection
