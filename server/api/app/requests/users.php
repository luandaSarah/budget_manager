<?php


require_once '../api/db/database.php';


function findAllUsers(): array
{
    global $db;
    return  $db
        ->query("SELECT * FROM users")
        ->fetchAll();
}
