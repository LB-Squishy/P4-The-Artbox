<?php
    // fonction de connexion à la base de donnée
    function connexionbdd(){
        return new PDO('mysql:dbname=artbox; host=localhost', 'root', '');
    }