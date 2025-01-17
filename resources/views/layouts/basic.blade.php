<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="images/images (1).jpg">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
  @yield('css')
   
</head>
<body>
<div class="headerinfo">
    <p>+32 488 38 20 70</p>
    <p>
    <?php if (Auth::check()) { ?>
        <p class="welcome">Bienvenue <?php echo Auth::user()->name; ?></p>
    <?php } else { ?>
        <p class="welcome">Bienvenue Chez l'Asbl Nour Sabil</p>
    <?php } ?>
    </p>

    <p>info@asblnoursabil.com</p>

</div>

<div class="header" >

        <img id='logo' src="{{ asset('images/Logo.png') }}" alt="logo" width="100px">


       
            <a href="/home">Accueil</a>
            <p>|</p>
            <a href="/news">Nouveautés</a>
            <p>|</p>
            <a href="/contact">Contact</a>
            <p>|</p>
            <a href="/account">Compte</a>

    <button id="donation"><?php if(Auth::check()){
               echo   Auth::user()-> username;
          
                }else{
                    echo "Login";
                }    ?></button>
    
    <script>
        if (!<?php echo Auth::check() ? 'true' : 'false'; ?>) {
            document.getElementById("donation").addEventListener("click", function(){
                window.location.href = "login";
            });
        }
    else{
        document.getElementById("donation").addEventListener("click", function(){
                window.location.href = "account";
            });
    }
    </script>

           
       
   





</div>
<main>
@yield('content')

</main>


<hr>

   <footer>
    <div id="footer-logo">
        <img id="logo" src="{{ asset('images/Logo.png') }}" alt="logo" width="100px">
        <h1>ASBL NOUR SABIL</h1>
       
    </div>

    <div id="pages">
        <div class="pagedesc">
           
          
         <h1 > <a id="desctitle" href="{{ route('home') }}">Accueil</a></h1>
            <p><a href="{{ route('home') }}">Faire un don</a></p>
            <p><a href="{{ route('home') }}">Nos Services</a></p>
            <p><a href="{{ route('home') }}">Newsletter</a></p>
        </div>
        <div class="pagedesc">
            <h1> <a id="desctitle" href="{{ route('news.index') }}">Nouveautés</a></h1>
            <p><a href="{{ route('news.index') }}">Puits</a></p>
            <p><a href="{{ route('news.index') }}">Ecoles</a></p>
            <p><a href="{{ route('news.index') }}">Newsletter</a></p>
  

        </div>
        <div class="pagedesc">
           
           <h1> <a id="desctitle" href="/contact">Contact</a></h1>
            <p><a href="/contact">Membres</a></p>
            <p><a href="/contact">Faq</a></p>
            <p><a href="/contact">Newsletter</a></p>

        </div>
        <div class="pagedesc">
           
           <h1> <a id="desctitle" href="{{ route('account.showProfile') }}">Account</a></h1>
            <p><a href="{{ route('account.showProfile') }}">Personal Information</a></p>
            <p><a href="{{ route('account.showProfile') }}">Password</a></p>
            <p><a href="{{ route('account.showProfile') }}">Logout</a></p>

        </div>

    </div>
    </footer>
    <hr id="lasthr">
    <div id="copyright">
    <?php
echo "© " . date("Y") . " ASBL Nour Sabil. All rights reserved | Created by <a  href='https://www.linkedin.com/in/elias-benhaj-b4b022292/' target=\"_blank\" rel=\"noopener noreferrer\">Elias Benhaj</a>";
?>
</div>
</body>
</html>

       
    

