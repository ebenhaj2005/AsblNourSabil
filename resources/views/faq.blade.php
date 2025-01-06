
@extends('layouts.basic')
@section('title', 'Galerie - Nour Sabil')
@section('css')
<link rel="stylesheet" href="css/galerie.css">
@endsection

@section('content')






    <div class="container">
        <h1>FAQs</h1>
        <a href="{{ route('faqs.create') }}" class="btn btn-primary mb-3">Create FAQ</a>
        
        @foreach ($categories as $category)
            <h3>{{ $category->name }}</h3>
            <ul>
                @foreach ($category->faqs as $faq)
                    <li>
                        <strong>{{ $faq->question }}</strong>
                        <p>{{ $faq->answer }}</p>
                        <a href="{{ route('faqs.edit', $faq) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('faqs.destroy', $faq) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endforeach
    </div>


extends('layouts.newsletter')

@endsection
