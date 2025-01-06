@extends('layouts.basic')
@section('title', 'Account - Nour Sabil')
@section('css')
<link rel="stylesheet" href="css/newspublic.css">
@endsection
@section('content')

<div class="news-list">
    @foreach($newsItems as $newsitem)  <!-- Corrected variable to $newsItems -->
        <div class="news-item">
            <h2>{{ $newsitem->title }}</h2>
            <img src="{{ asset('storage/' . $newsitem->image) }}" alt="{{ $newsitem->title }}">
            <p>{{ $newsitem->content }}</p>
            <small>Published on: {{ \Carbon\Carbon::parse($newsitem->publication_date)->format('d M Y') }}</small>
        
        </div>
    @endforeach
</div>

@endsection
