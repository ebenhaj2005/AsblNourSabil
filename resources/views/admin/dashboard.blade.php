@extends('layouts.admin')

@section('content')

<header>
    <h1 id='adminwelcome'>Bienvenue, <?php if(Auth::check()) { echo Auth::user()->name . ' ' . Auth::user()->surname; } ?></h1>
</header>

 
            <section class="cards">
                <div class="card" id="usercard">
                    <h3>Users</h3>
                    <p>Manage users and their roles.</p>
                </div>
                  <button id="newsitemcard"> <div class="card" >
                 
                    <h3>News items</h3>
                    <p>Add news items</p>
                </div></button>
                <div class="card">
                    <h3>Settings</h3>
                    <p>Update application settings.</p>
                </div>
            </section>




 <script>
document.getElementById("newsitemcard").addEventListener("click", function(){
    window.location.href = "/admin/newsitems"; 
});
</script>

 @endsection