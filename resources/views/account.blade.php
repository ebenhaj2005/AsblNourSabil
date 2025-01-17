
@extends('layouts.basic')
@section('title', 'Account - Nour Sabil')
@section('css')
<link rel="stylesheet" href="css/account.css">
@endsection



@section('content')
    <h1 id="accountname">{{ Auth::user()->name }} {{ Auth::user()->surname }}</h1>
    <div id="profile-picture-container">
        <img id="accountusername" 
             src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/nopf.webp') }}" 
             alt="Profile Picture" 
             class="rounded-full w-32 h-32 object-cover">
    </div>

<div id="accbutt">
    <a href="/profile"><button class="accountbutton">Mon compte</button></a>
    <a href="/profile"> <button class="accountbutton">Changer mon mot de passe</button></a>
    <?php if(Auth::user()->role == 'admin') { ?>
        <a href="{{ route('admin.users.index') }}"><button class="accountbutton">Gérer les utilisateurs</button></a>
        <a href="{{ route('admin.newsitems.index') }}"><button class="accountbutton">Gérer les news</button></a>
        <a href="{{ route('admin.faq.index') }}"><button class="accountbutton">Gérer les FAQ</button></a>

   <?php } ?>

   <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{route('logout')}}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">         
   <button class="accountbutton" >Logout</button></a>
</div>
@endsection

