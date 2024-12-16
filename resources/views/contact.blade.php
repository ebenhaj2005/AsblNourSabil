
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
    @include('components.newsletter')


@endsection
