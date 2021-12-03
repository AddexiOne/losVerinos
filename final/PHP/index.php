<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/cssdark.css">
    <title>Sauvetages en mer</title>
</head>

<body>
    <header>
        <h1 class="title">Sauveteurs du dunkerquois</h1>

        <ul class="social">
            <li><a href="#"><img src="img/facebook.png"></a></li>
            <li><a href="#"><img src="img/twitter.png"></a></li>
            <li><a href="#"><img src="img/envoyer-un-mail.png"></a></li>
            <li><input type="button" id="colorScheme" value="Dark"></button></li>
        </ul>
    </header>

    <main>
        <section class="imgSea">
        </section>
        <section class="navigate">
            <navbar>
                <ul>
                    <li class="rescuer" id="searched">
                        Recherche par sauveteur
                    </li>
                    <li class="rescue">
                        Recherche par sauvetage
                    </li>
                    <li class="boat">
                        Recherche par bateau
                    </li>
                </ul>
            </navbar>

            <div class="search">
                <input type="text" id="searchedBarre" placeholder="Rechercher...">
                <button id="buttonSearch" onclick="search();"><img src="img/loupe.png"></button>
            </div>
            <div class="result"></div>
        </section>
    </main>
    <footer>
    </footer>
</body>
<script src="Public/JS/script.js"></script>
<script src="Public/JS/dark-theme.js"></script>
</html>