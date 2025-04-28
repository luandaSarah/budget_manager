<?php

require_once '../api/db/database.php';

function findAllUsers(): array
{
    $db = getDbConnection();

    return $db
        ->query("SELECT * FROM users")
        ->fetchAll();
}

function findOneUser(int $id): bool|array
{

    $db = getDbConnection();

    //query preparé vers db
    // return $db
    // ->query("SELECT * FROM users")
    // ->fetchAll();

    $db = getDbConnection();
    try {
        $query = "SELECT * FROM users WHERE id = :id";

        $sql = $db->prepare($query);
        $sql->execute(["id" => $id]);
        return $sql->fetch();
    } catch (PDOException $e) {
        die('' . $e->getMessage());
    }
}
// findAllUsers();
// var_dump(findAllUsers());
