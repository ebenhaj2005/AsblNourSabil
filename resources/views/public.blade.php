
@extends('layouts.basic')
@section('title', 'Nour Sabil')
@section('css')

@endsection

@section('content')

<div class="container2">
          
        <h1 id="profilename">{{ $profileName }}'s Profile</h1>
        <p>Birthday: {{ \Carbon\Carbon::parse($user->birthday)->format('d-m-Y') }}</p>
        
        <div id="bio">
            <h2>Bio</h2>
            
           <p> {{ $user->bio }}</p> 
        </div>

        
   
    </div>



@endsection
