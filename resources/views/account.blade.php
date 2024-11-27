
@extends('layouts.basic')
@section('title', 'Account - Nour Sabil')
@section('css')
<link rel="stylesheet" href="css/account.css">
@endsection



@section('content')


    <h1 id="accountname">Elias Benhaj</h1>
 <img src="images/puit.jpg" alt="" id="pfp">
<div id="accbutt">
    <a href="/profile"><button class="accountbutton">Sign in & Security</button></a>
    <a href="/profile"> <button class="accountbutton">New Post</button></a>
    <a href="/profile"> <button class="accountbutton">Change profilepicture</button></a>
    <a href="/profile"><button class="accountbutton">Reset Password</button></a>
    <a href="/profile"> <button class="accountbutton" >Reset Password</button></a>
</div>
@endsection

