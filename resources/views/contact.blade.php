
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


        @include('components.newsletter')


@endsection
