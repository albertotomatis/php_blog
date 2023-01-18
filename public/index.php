<?php

try {
    include __DIR__ . '/../classes/EntryPoint.php';
    include __DIR__ . '/../classes/PostRoutes.php';
    
    // se nessuna variabile route ha un valore, usa post/home
    $route = $_GET['route'] ?? 'post/home';

    $authorsTable = new DatabaseTable($pdo, 'author', 'id');
    $authentication = new Authentication($authorsTable, 'email', 'password');
    $entryPoint = new EntryPoint($route, $_SERVER['REQUEST_METHOD'], new PostRoutes(), 
    $authentication);
    session_start();
    $entryPoint->run();
} catch (PDOException $e) {
    echo 'Database error';
}







