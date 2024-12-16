@extends('layouts.admin')

@section('content')

<h1 id='adminwelcome'>Bienvenue, <?php echo Auth::user()->name . ' ' . Auth::user()->surname; ?></h1>
               
            </header>

 
            <section class="cards">
                <div class="card" id="usercard">
                    <h3>Users</h3>
                    <p>Manage users and their roles.</p>
                </div>
                <div class="card">
                    <h3>Statistics</h3>
                    <p>View application performance metrics.</p>
                </div>
                <div class="card">
                    <h3>Settings</h3>
                    <p>Update application settings.</p>
                </div>
            </section>




 @endsection

 <script>
document.getElementById("usercard").addEventListener("click", function(){
    window.location.href = "users";
});
 </script>