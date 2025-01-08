
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
<h1> </h1>
<form class="contact-form">
        @csrf
        <h2>Contactez nous</h2>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Your name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Your email" required>

        <label for="message">Message</label>
        <textarea id="message" name="message" rows="4" placeholder="Your message" required></textarea>

        <button type="submit">Envoyer</button>
    </form>


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
    @include('components.newsletter')


@endsection
