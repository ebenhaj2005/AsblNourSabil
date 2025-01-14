
@extends('layouts.basic')
@section('title', 'Nour Sabil')


@section('content')
<style>
    .profile-picture {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
    }
</style>
<div class="container2">



@if(isset($user->profile_picture))
    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="{{ $profileName ?? 'Guest' }}'s Profile Picture" class="profile-picture">
@else
    <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile Picture" class="profile-picture">
@endif
          
        <h1 id="profilename">{{ $profileName ?? 'Guest' }}'s Profile</h1>
        <p>Birthday: {{ \Carbon\Carbon::parse($user->birthday ?? '2000-01-01')->format('d-m-Y') }}</p>
        
        <div id="bio">
            <h2>Bio</h2>
            
           <p id="bio2" > {{ $user->bio ?? 'No bio available.' }} </p> 
        </div>

        
   
    </div>



@endsection
