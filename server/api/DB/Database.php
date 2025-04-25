<?php

$db_host = 'localhost';
$db_name = 'budgetDB';
$user = 'budget_app';
$pass = 'bdgt48';

try {

    $db = new PDO(
        "mysql:host=" . $db_host . ";dbname=" . $db_name . ";charset=utf8mb4",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    throw $e;
}
