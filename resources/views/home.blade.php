
@extends('layouts.basic')
@section('title', 'Home - Nour Sabil')

@section('content')

<div id="kidimg">
<div id="imgtxt"></div>


  <p>Besoin d'aide...</p>
  <h1 >Chaque Geste Compte</h1>
  <h1 id="imgtit1">Pour Faire La Difference</h1>
  <div id="donationbutt">
  <button id="donation2">Faire un don</button>
  </div>
</div>

<div id="servicetitle">


<p id="nosservices">Les Services</p>
<p id="text1">Que Nous Offrons</p>


</div>

<div id="services">
    <div id="textbox">
        <h1>Aide A La Population</h1>
        <hr>
        <p>L'ASBL Nour Al Andalous est une association caritative engagée dans l'aide humanitaire internationale. Active dans de nombreux pays, elle consacre ses efforts à venir en aide aux populations les plus vulnérables en leur apportant des ressources essentielles. Nour Al Andalous fournit ainsi des vêtements pour offrir chaleur et dignité, des jouets pour apporter un peu de bonheur aux enfants et de la nourriture pour lutter contre la faim.</p>
    </div>
    <div id="serviceimg">
        <img src="images/couscous.jpg" alt="help" width="500px">

    </div>

</div>
<div id="services2">
      <div id="serviceimg">
        <img src="images/puit.jpg" alt="help" width="500px">

    </div>
    <div id="textbox2">
        <h1>Construction de Puits</h1>
        <hr>
        <p>L'ASBL Nour Al Andalous s'investit également dans des projets d’accès à l'eau potable en construisant des puits dans des régions où l'eau est rare et précieuse, notamment à Zanzibar et au Maroc. Dans ces zones, de nombreuses communautés manquent d'eau potable, ce qui rend difficile l'accès à une vie saine et complique le quotidien.

Grâce aux dons et au soutien de leurs bénévoles.</p>
    </div>
  

</div>
<div id="services">
    <div id="textbox">
        <h1>Constructions d'écoles</h1>
        <hr>
        <p>L'ASBL Nour Al Andalous est une association caritative engagée dans l'aide humanitaire internationale. Active dans de nombreux pays, elle consacre ses efforts à venir en aide aux populations les plus vulnérables en leur apportant des ressources essentielles. Nour Al Andalous fournit ainsi des vêtements pour offrir chaleur et dignité, des jouets pour apporter un peu de bonheur aux enfants et de la nourriture pour lutter contre la faim.</p>
    </div>
    <div id="serviceimg">
        <img src="images/mosquee.jpg" alt="help" width="500px">

        </div>
        </div>

       @include('components.newsletter')

@endsection
