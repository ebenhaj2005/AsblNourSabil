
@extends('layouts.basic')
@section('title', 'Contact - Nour Sabil')
@section('css')
<link rel="stylesheet" href="css/contact.css">

@endsection
@section('content')

<div class="Person">
        <img class="personimg" src="images/hammadi2.jpg" alt="person" class="Person__img" width="500px" height = "500px">
        <div class="Person__info">
            <h1 class="Person__name">Hammadi Benhaj</h1>
            <p class="Person__title">Président de l'Asbl Nour Sabil</p>
            <a href="mailto:delta63012@gmail.com">delta63012@gmail.com</a>

</div>
        


</div>

<div class="Person">
        <img class="personimg" src="images/hammadi2.jpg" alt="person" class="Person__img" width="500px" height = "500px">
        <div class="Person__info">
            <h1 class="Person__name">Omar Agzennai</h1>
            <p class="Person__title">Président de l'Asbl Nour Sabil</p>
            <a href="mailto:delta63012@gmail.com">delta63012@gmail.com</a>

</div>
        


</div>
<div class="Person">
        <img class="personimg" src="images/hammadi2.jpg" alt="person" class="Person__img" width="500px" height = "500px">
        <div class="Person__info">
            <h1 class="Person__name">Omar Agzennai</h1>
            <p class="Person__title">Président de l'Asbl Nour Sabil</p>
            <a href="mailto:delta63012@gmail.com">delta63012@gmail.com</a>

</div>
        


</div>

<form action="{{ url('/contact') }}" method="POST" class="contact-form">
    @csrf
    <h2>Contactez nous</h2>
    <label for="name">Name</label>
    <input type="text" id="name" name="name" placeholder="Votre nom" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Votre mail" required>

    <label for="message">Message</label>
    <textarea id="message" name="message" rows="4" placeholder="Votre message" required></textarea>

    <button type="submit">Envoyer</button>
</form>




<div class="container">
    <h1>Veelgestelde Vragen</h1>
    @foreach($categories as $category)
        <div class="faq-category">
            <h2>{{ $category->name }}</h2>
            @foreach($category->faqs as $faq)
                <div class="faq-item">
                    <p class="faq-question" aria-expanded="false" aria-controls="answer-{{ $faq->id }}">
                        {{ $faq->question }}
                    </p>
                    <div class="faq-answer" id="answer-{{ $faq->id }}" style="display: none;">
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
            const isAnswerVisible = answer.style.display === 'block';
            
            document.querySelectorAll('.faq-answer').forEach(otherAnswer => {
                if (otherAnswer !== answer) {
                    otherAnswer.style.display = 'none';
                }
            });
            
            answer.style.display = isAnswerVisible ? 'none' : 'block';
            question.setAttribute('aria-expanded', !isAnswerVisible);
        });
    });
</script>


    @include('components.newsletter')


@endsection
