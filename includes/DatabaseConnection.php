<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=blog; charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'Connessione con db stabilita';
} catch (PDOException $e) {
    echo 'Errore connessione db';
}

