
@extends('layouts.basic')
@section('title', 'Contact - Nour Sabil')
@section('css')
<link rel="stylesheet" href="css/contact.css">
@endsection
@section('content')
<div class="team-container">

@include('components.person')

@yield('image')
<img src="images/images (1).jpg" alt="person" width="100px">
@endyield
@yield('email','ebhnahhjksh@gmail.com')
@yield('name','luce ald')

</div>

        @include('components.newsletter')


@endsection
