@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Veelgestelde Vragen</h1>
    @foreach($categories as $category)
        <div class="faq-category">
            <h2>{{ $category->name }}</h2>
            @foreach($category->faqs as $faq)
                <div class="faq-item">
                    <p class="faq-question">{{ $faq->question }}</p>
                    <div class="faq-answer" style="display: none;">
                        {{ $faq->answer }}
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>

<script>
    document.querySelectorAll('.faq-question').forEach(question => {
        question.addEventListener('click', () => {
            const answer = question.nextElementSibling;
            answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
        });
    });
</script>
@endsection
