@extends('layouts.basic')
@section('title', 'Account - Nour Sabil')
@section('css')
<link rel="stylesheet" href="css/newspublic.css">
@endsection
@section('content')

<div class="news-list">
    @forelse($newsItems as $newsitem)  
        <div class="news-item">
            <h2>{{ $newsitem->title }}</h2>
            <img 
                src="{{ $newsitem->image ? asset('storage/' . $newsitem->image) : asset('images/placeholder.png') }}" 
                alt="{{ $newsitem->title }}"
                 class="news-item-img"
                 onclick="openLightbox('{{ $newsitem->image ? asset('storage/' . $newsitem->image) : asset('images/placeholder.png') }}')"
                onerror="this.src='{{ asset('images/placeholder.png') }}';"
            >
            <p>{{$newsitem->content}}</p>
            <small>Published on: {{ \Carbon\Carbon::parse($newsitem->publication_date)->format('d M Y') }}</small>
        </div>
    @empty
        <p>No news items found.</p>
    @endforelse
</div>

<div id="lightbox" class="lightbox" onclick="closeLightbox()">
    <img id="lightbox-img" class="lightbox-img" alt="Enlarged view">
</div>


<script>
    function openLightbox(imageSrc) {
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        lightboxImg.src = imageSrc;
        lightbox.style.display = 'flex';
    }

    function closeLightbox() {
        const lightbox = document.getElementById('lightbox');
        lightbox.style.display = 'none';
    }
</script>
@endsection


