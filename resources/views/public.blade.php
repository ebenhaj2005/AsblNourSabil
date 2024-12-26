
@extends('layouts.basic')
@section('title', 'Nour Sabil')


@section('content')

<div class="container2">
          
        <h1 id="profilename">{{ $profileName ?? 'Guest' }}'s Profile</h1>
        <p>Birthday: {{ \Carbon\Carbon::parse($user->birthday ?? '2000-01-01')->format('d-m-Y') }}</p>
        
        <div id="bio">
            <h2>Bio</h2>
            
           <p id="bio2" > {{ $user->bio ?? 'No bio available.' }} </p> 
        </div>

        
   
    </div>



@endsection
